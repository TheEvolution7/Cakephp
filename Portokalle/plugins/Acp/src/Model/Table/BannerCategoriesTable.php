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
 * BannerCategories Model
 *
 * @property \Acp\Model\Table\BannerCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentBannerCategories
 * @property \Acp\Model\Table\BannerCategoriesTable|\Cake\ORM\Association\HasMany $ChildBannerCategories
 * @property \Acp\Model\Table\BannersTable|\Cake\ORM\Association\HasMany $Banners
 *
 * @method \Acp\Model\Entity\BannerCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\BannerCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\BannerCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\BannerCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\BannerCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\BannerCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\BannerCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\BannerCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class BannerCategoriesTable extends CoreTable
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

        $this->setTable('banner_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentBannerCategories', [
            'className' => 'Acp.BannerCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildBannerCategories', [
            'className' => 'Acp.BannerCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Banners', [
            'foreignKey' => 'banner_category_id',
            'className' => 'Acp.Banners'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description'],
            'translationTable' => 'BannerCategoriesTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);

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
            ->allowEmptyFile('image');

        // $validator
        //     ->boolean('status')
        //     ->requirePresence('status', 'create')
        //     ->allowEmptyString('status', false);

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
        //$rules->add($rules->existsIn(['parent_id'], 'ParentBannerCategories'));

        return $rules;
    }
}
