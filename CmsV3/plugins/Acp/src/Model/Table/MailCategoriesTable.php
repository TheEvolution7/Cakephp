<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

/**
 * MailCategories Model
 *
 * @property \Acp\Model\Table\MailCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentMailCategories
 * @property \Acp\Model\Table\MailCategoriesTable|\Cake\ORM\Association\HasMany $ChildMailCategories
 *
 * @method \Acp\Model\Entity\MailCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\MailCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\MailCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\MailCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\MailCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\MailCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\MailCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\MailCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class MailCategoriesTable extends CoreTable
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

        $this->setTable('mail_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentMailCategories', [
            'className' => 'Acp.MailCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildMailCategories', [
            'className' => 'Acp.MailCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Mails', [
            'foreignKey' => 'mail_category_id',
            'className' => 'Acp.Mails'
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentMailCategories'));

        return $rules;
    }
}
