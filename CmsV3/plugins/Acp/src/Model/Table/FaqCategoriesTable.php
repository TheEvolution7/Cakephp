<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

/**
 * FaqCategories Model
 *
 * @property \Acp\Model\Table\FaqCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentFaqCategories
 * @property \Acp\Model\Table\FaqCategoriesTable|\Cake\ORM\Association\HasMany $ChildFaqCategories
 * @property \Acp\Model\Table\FaqsTable|\Cake\ORM\Association\HasMany $Faqs
 *
 * @method \Acp\Model\Entity\FaqCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\FaqCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\FaqCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\FaqCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\FaqCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\FaqCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\FaqCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\FaqCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class FaqCategoriesTable extends CoreTable
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

        $this->setTable('faq_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentFaqCategories', [
            'className' => 'Acp.FaqCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildFaqCategories', [
            'className' => 'Acp.FaqCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Faqs', [
            'foreignKey' => 'faq_category_id',
            'className' => 'Acp.Faqs'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description','keyword'],
            'translationTable' => 'FaqCategoriesTranslations',
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentFaqCategories'));

        return $rules;
    }
}
