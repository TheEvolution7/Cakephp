<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

/**
 * DocumentCategories Model
 *
 * @property \Acp\Model\Table\DocumentCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentDocumentCategories
 * @property \Acp\Model\Table\DocumentCategoriesTable|\Cake\ORM\Association\HasMany $ChildDocumentCategories
 * @property \Acp\Model\Table\DocumentsTable|\Cake\ORM\Association\HasMany $Documents
 *
 * @method \Acp\Model\Entity\DocumentCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\DocumentCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\DocumentCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\DocumentCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\DocumentCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\DocumentCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\DocumentCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\DocumentCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class DocumentCategoriesTable extends CoreTable
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

        $this->setTable('document_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentDocumentCategories', [
            'className' => 'Acp.DocumentCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildDocumentCategories', [
            'className' => 'Acp.DocumentCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Documents', [
            'foreignKey' => 'document_category_id',
            'className' => 'Acp.Documents'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description'],
            'translationTable' => 'DocumentCategoriesTranslations',
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentDocumentCategories'));

        return $rules;
    }
}
