<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecordCategories Model
 *
 * @property \App\Model\Table\RecordCategorieCategoriesTable|\Cake\ORM\Association\BelongsTo $RecordCategorieCategories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\RecordCategorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\RecordCategorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RecordCategorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecordCategorie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecordCategorie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecordCategorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RecordCategorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecordCategorie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecordCategoriesTable extends Table
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
        $this->setPrimaryKey('id');
        $this->setDisplayField('title');
        $this->addBehavior('Timestamp');

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
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        $validator
            ->date('date_of_record')
            ->requirePresence('date_of_record', 'create')
            ->allowEmptyDate('date_of_record', false);

        $validator
            ->scalar('record_attachments')
            ->maxLength('record_attachments', 255)
            ->requirePresence('record_attachments', 'create')
            ->allowEmptyString('record_attachments', false);

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['record_category_id'], 'RecordCategorieCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
