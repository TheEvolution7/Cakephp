<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;
use Cake\Utility\Text;

/**
 * Brands Model
 *
 * @property \Acp\Model\Table\BrandsTable|\Cake\ORM\Association\BelongsTo $ParentBrands
 * @property \Acp\Model\Table\BrandsTable|\Cake\ORM\Association\HasMany $ChildBrands
 * @property \Acp\Model\Table\BrandsTable|\Cake\ORM\Association\HasMany $Brands
 *
 * @method \Acp\Model\Entity\ProductCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\ProductCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\ProductCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\ProductCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\ProductCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\ProductCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\ProductCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\ProductCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class BrandsTable extends CoreTable
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

        $this->setTable('brands');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentBrands', [
            'className' => 'Acp.Brands',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildBrands', [
            'className' => 'Acp.Brands',
            'foreignKey' => 'parent_id'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description'],
            'translationTable' => 'BrandTranslations',
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

        // $validator
        //     ->scalar('type')
        //     ->maxLength('type', 255)
        //     ->requirePresence('type', 'create')
        //     ->allowEmptyString('type', false);

        $validator
            // ->scalar('image')
            // ->maxLength('image', 255)
            // ->requirePresence('image', 'create')
            // ->allowEmptyFile('image', false);
            ->allowEmptyFile('image');

        // $validator
        //     ->integer('order')
        //     ->requirePresence('order', 'create')
        //     ->allowEmptyString('order', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        // $validator
        //     ->scalar('allowed_fields')
        //     ->allowEmptyString('allowed_fields');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentBrands'));

        return $rules;
    }

    public function getCacheData()
    {
        $datas = $this->find('all')->where(['Brands.status' => 1])->toArray();
        // $cacheBrands = [];

        // foreach ($datas as $key => $data) {
        //     $cacheBrands[$data->banner_category_id][] = $data;
        // }

        return $datas;
    }
}
