<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

/**
 * PageCategories Model
 *
 * @property \Acp\Model\Table\PageCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentPageCategories
 * @property \Acp\Model\Table\PageCategoriesTable|\Cake\ORM\Association\HasMany $ChildPageCategories
 * @property \Acp\Model\Table\PagesTable|\Cake\ORM\Association\HasMany $Pages
 *
 * @method \Acp\Model\Entity\PageCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\PageCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\PageCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\PageCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\PageCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\PageCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\PageCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\PageCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class PageCategoriesTable extends CoreTable
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
    
        $this->addBehavior('Translate', [
            'fields' => ['title', 'alias', 'description'],
            'translationTable' => 'PageCategoriesTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);

        $this->setTable('page_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentPageCategories', [
            'className' => 'PageCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildPageCategories', [
            'className' => 'PageCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Pages', [
            'foreignKey' => 'page_category_id'
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
            // ->scalar('image')
            // ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('allowed_fields')
            ->allowEmptyString('allowed_fields');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentPageCategories'));

        return $rules;
    }
}
