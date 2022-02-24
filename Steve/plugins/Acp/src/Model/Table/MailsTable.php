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
 * Mails Model
 *
 * @property \Acp\Model\Table\MailCategoriesTable|\Cake\ORM\Association\BelongsTo $MailCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Mail get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Mail newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Mail[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Mail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Mail|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Mail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Mail[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Mail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MailsTable extends CoreTable
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

        $this->setTable('mails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MailCategories', [
            'foreignKey' => 'mail_category_id',
            'className' => 'Acp.MailCategories'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
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

        // $validator
        //     ->scalar('image_list')
        //     ->maxLength('image_list', 500)
        //     ->allowEmptyFile('image_list');

        // $validator
        //     ->integer('sort')
        //     ->allowEmptyString('sort');

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
        $rules->add($rules->existsIn(['mail_category_id'], 'MailCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }


}
