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
 * RecordCategories Model
 *
 * @property \Acp\Model\Table\RecordCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentRecordCategories
 * @property \Acp\Model\Table\RecordCategoriesTable|\Cake\ORM\Association\HasMany $ChildRecordCategories
 * @property \Acp\Model\Table\RecordsTable|\Cake\ORM\Association\HasMany $Records
 *
 * @method \Acp\Model\Entity\RecordCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\RecordCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\RecordCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\RecordCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\RecordCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\RecordCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\RecordCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\RecordCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class RecordCategoriesTable extends CoreTable
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

        $this->setTable('record_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentRecordCategories', [
            'className' => 'Acp.RecordCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildRecordCategories', [
            'className' => 'Acp.RecordCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Records', [
            'foreignKey' => 'record_category_id',
            'className' => 'Acp.Records'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description'],
            'translationTable' => 'RecordCategoriesTranslations',
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

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentRecordCategories'));

        return $rules;
    }
}
