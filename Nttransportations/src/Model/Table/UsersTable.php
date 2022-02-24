<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['id', 'email', 'password']);

        return $query;
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // $validator
        //     ->integer('id')
        //     ->allowEmptyString('id', 'create');

        // $validator
        //     ->email('email')
        //     ->requirePresence('email', 'create')
        //     ->allowEmptyString('email', false);

        // $validator
        //     ->scalar('password')
        //     ->maxLength('password', 100)
        //     ->requirePresence('password', 'create')
        //     ->allowEmptyString('password', false);

        // $validator
        //     ->boolean('gender')
        //     ->requirePresence('gender', 'create')
        //     ->allowEmptyString('gender', false);

        // $validator
        //     ->scalar('first_name')
        //     ->maxLength('first_name', 255)
        //     ->requirePresence('first_name', 'create')
        //     ->allowEmptyString('first_name', false);

        // $validator
        //     ->scalar('last_name')
        //     ->maxLength('last_name', 255)
        //     ->requirePresence('last_name', 'create')
        //     ->allowEmptyString('last_name', false);

        // $validator
        //     ->date('birthday')
        //     ->requirePresence('birthday', 'create')
        //     ->allowEmptyDate('birthday', false);

        // $validator
        //     ->scalar('phone_number')
        //     ->maxLength('phone_number', 16)
        //     ->requirePresence('phone_number', 'create')
        //     ->allowEmptyString('phone_number', false);

        // $validator
        //     ->scalar('image')
        //     ->maxLength('image', 255)
        //     ->allowEmptyFile('image');

        // $validator
        //     ->boolean('status')
        //     ->requirePresence('status', 'create')
        //     ->allowEmptyString('status', false);

        // $validator
        //     ->boolean('active')
        //     ->requirePresence('active', 'create')
        //     ->allowEmptyString('active', false);

        // $validator
        //     ->boolean('system')
        //     ->requirePresence('system', 'create')
        //     ->allowEmptyString('system', false);

        // $validator
        //     ->scalar('company')
        //     ->maxLength('company', 255)
        //     ->allowEmptyString('company');

        // $validator
        //     ->scalar('address')
        //     ->maxLength('address', 255)
        //     ->allowEmptyString('address');

        // $validator
        //     ->scalar('city')
        //     ->maxLength('city', 255)
        //     ->allowEmptyString('city');

        // $validator
        //     ->scalar('state')
        //     ->maxLength('state', 255)
        //     ->allowEmptyString('state');

        // $validator
        //     ->scalar('zip_code')
        //     ->maxLength('zip_code', 10)
        //     ->allowEmptyString('zip_code');

        // $validator
        //     ->scalar('note')
        //     ->allowEmptyString('note');

        // $validator
        //     ->scalar('fbid')
        //     ->maxLength('fbid', 100)
        //     ->allowEmptyString('fbid');

        // $validator
        //     ->scalar('ggid')
        //     ->maxLength('ggid', 100)
        //     ->allowEmptyString('ggid');

        // $validator
        //     ->dateTime('last_visit')
        //     ->allowEmptyDateTime('last_visit');

        // $validator
        //     ->integer('has_read')
        //     ->requirePresence('has_read', 'create')
        //     ->allowEmptyString('has_read', false);

        $validator->add('confirm_password', 'no-misspelling', [
            'rule' => ['compareWith', 'password'],
            'message' => 'Passwords are not equal',
        ]);
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
        $rules->add($rules->isUnique(['email'],'This email is already in use'));
        $rules->add($rules->isUnique(['phone_number'],'This phone is already in use'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        // $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }

    // public function validationPasswords($validator)
    // {
    //     $validator->add('confirm_password', 'no-misspelling', [
    //         'rule' => ['compareWith', 'password'],
    //         'message' => 'Passwords are not equal',
    //     ]);

    //     return $validator;
    // }
}
