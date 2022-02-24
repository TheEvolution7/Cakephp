<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Event\Event;
use Acp\Event\Users;
use ArrayObject;
use Cake\Routing\Router;

// Custom
use App\Model\Table\CoreTable;
use Cake\Utility\Text;

/**
 * Products Model
 *
 * @property \Acp\Model\Table\ProductCategoriesTable|\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Product get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Product|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends CoreTable
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('ProductCategories',[
            'joinTable' => 'products_categories',
            'className' => 'Acp.ProductCategories'
        ]);
        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
            'className' => 'Acp.Brands'
        ]);

        $this->hasMany('OrderDetails', [
            'className' => 'Acp.OrderDetails'
        ]);

        $this->belongsToMany('Acp.Tags');

        $this->belongsToMany('Acp.AttributeValues');
        
        $this->hasOne('AttributeValuesAmounts');
        

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'slug_custom', 'description', 'content','meta_title','meta_description','meta_keyword','excerpt','time'],
            'translationTable' => 'ProductTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);

        $this->addBehavior('SummernoteAttachment');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            // ->scalar('image')
            // ->maxLength('image', 255)
            ->allowEmptyFile('image');

        // $validator
        //     ->scalar('image_list')
        //     ->maxLength('image_list', 500)
        //     ->allowEmptyFile('image_list');

        // $validator
        //     ->integer('sort')
        //     ->allowEmptyString('sort');

        // $validator
        //     ->boolean('status')
        //     ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_category_id'], 'ProductCategories'));
        return $rules;
    }

    public function afterSave($event, $query,ArrayObject $options)
    {
        if(!isset($options['default'])){
            $this->eventManager()->attach(new Users());
            $event = new Event('Users.save.successed', $this, [
                'user_id' => $_SESSION['Auth']['User']['id'],
                'role_id' => $_SESSION['Auth']['User']['role_id'],
                'user_ip' => $_SERVER['REMOTE_ADDR'],
                'email' => $_SESSION['Auth']['User']['email'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'action' => Router::getRequest()->params['controller'].'.'.Router::getRequest()->params['action'].'.'.'successed',
                'model' => Router::getRequest()->params['controller'],
                'content' => Router::url(['controller' => Router::getRequest()->params['controller'], 'action' => 'edit',$query->id])
            ]);
            $this->eventManager()->dispatch($event);
        }
        
    }
}
