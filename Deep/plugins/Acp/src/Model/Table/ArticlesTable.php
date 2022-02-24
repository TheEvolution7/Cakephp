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

/**
 * Articles Model
 *
 * @property \Acp\Model\Table\ArticleCategoriesTable|\Cake\ORM\Association\BelongsTo $ArticleCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Article get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Article|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends CoreTable
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

        $this->setTable('articles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->belongsToMany('ArticleCategories',[
            'joinTable' => 'articles_categories',
            'className' => 'Acp.ArticleCategories'
        ]);
        $this->belongsToMany('Acp.Tags');

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'slug_custom', 'description', 'content','meta_title','meta_description','meta_keyword','pdf'],
            'translationTable' => 'ArticleTranslations',
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
        //     ->integer('view_count')
        //     ->requirePresence('view_count', 'create')
        //     ->allowEmptyString('view_count', false);

        // $validator
        //     ->integer('comment_count')
        //     ->allowEmptyString('comment_count');

        // $validator
        //     ->integer('allow_comment')
        //     ->requirePresence('allow_comment', 'create')
        //     ->allowEmptyString('allow_comment', false);

        // $validator
        //     ->integer('order')
        //     ->allowEmptyString('order');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->boolean('home')
            ->allowEmptyString('home');

        $validator
            ->allowEmptyString('featured');

        // $validator
        //     ->scalar('tag')
        //     ->maxLength('tag', 500)
        //     ->allowEmptyString('tag');

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
        $rules->add($rules->existsIn(['article_category_id'], 'ArticleCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    // public function afterSave($event, $query,ArrayObject $options)
    // {
    //     if(!isset($options['default'])){
    //         $this->eventManager()->attach(new Users());
    //         $event = new Event('Users.save.successed', $this, [
    //             'user_id' => $_SESSION['Auth']['User']['id'],
    //             'role_id' => $_SESSION['Auth']['User']['role_id'],
    //             'user_ip' => $_SERVER['REMOTE_ADDR'],
    //             'email' => $_SESSION['Auth']['User']['email'],
    //             'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    //             'action' => Router::getRequest()->params['controller'].'.'.Router::getRequest()->params['action'].'.'.'successed',
    //             'model' => Router::getRequest()->params['controller'],
    //             'content' => Router::url(['controller' => Router::getRequest()->params['controller'], 'action' => 'edit',$query->id])
    //         ]);
    //         $this->eventManager()->dispatch($event);
    //     }
        
    // }
    // public function afterDelete($event, $query,ArrayObject $options)
    // {
    //     if(!isset($options['default'])){
    //         $this->eventManager()->attach(new Users());
    //         $event = new Event('Users.save.successed', $this, [
    //             'user_id' => $_SESSION['Auth']['User']['id'],
    //             'user_ip' => $_SERVER['REMOTE_ADDR'],
    //             'email' => $_SESSION['Auth']['User']['email'],
    //             'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    //             'action' => Router::getRequest()->params['controller'].'.'.Router::getRequest()->params['action'].'.'.'successed',
    //             'model' => Router::getRequest()->params['controller'],
    //             'content' => $query->id
    //         ]);
    //         $this->eventManager()->dispatch($event);
    //     }
        
    // }
}
