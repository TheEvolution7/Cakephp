<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Table\CoreTable;

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
class UsersTable extends CoreTable
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
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasOne('Personals', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->hasMany('Patients');
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
        $validator
            ->allowEmptyFile('image');

        $validator
            ->notEmpty('password', __("You must specify your password."))
            ->notEmpty('email')
            ->add('email', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => __("This E-mail is already used.")
                ],
                'email' => [
                    'rule' => 'email',
                    'message' => __("You must specify a valid E-mail address.")
                ]
            ]);

        return $validator;
    }
    
    public function validationCreate(Validator $validator)
    {
        $validator
            ->notEmpty('password', __("You must specify your password."))
            ->notEmpty('password_confirm', __("You must specify your password (confirmation)."))
            ->add('password_confirm', [
                'lengthBetween' => [
                    'rule' => ['lengthBetween', 8, 20],
                    'message' => __("Your password (confirmation) must be between {0} and {1} characters.", 8, 20)
                ],
                'equalToPassword' => [
                    'rule' => function ($value, $context) {
                        return $value === $context['data']['password'];
                    },
                    'message' => __("Your password confirm must match with your password.")
                ]
            ])
            ->notEmpty('email')
            ->add('email', [
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => __("This E-mail is already used.")
                ],
                'email' => [
                    'rule' => 'email',
                    'message' => __("You must specify a valid E-mail address.")
                ]
            ]);

        return $validator;
    }
    public function validationResetpassword(Validator $validator)
    {
        return $validator
            ->notEmpty('password', __("You must specify your new password."))
            ->notEmpty('password_confirm', __("You must specify your password (confirmation)."))
            ->add('password_confirm', [
                'lengthBetween' => [
                    'rule' => ['lengthBetween', 8, 20],
                    'message' => __("Your password (confirmation) must be between {0} and {1} characters.", 8, 20)
                ],
                'equalToPassword' => [
                    'rule' => function ($value, $context) {
                            return $value === $context['data']['password'];
                    },
                    'message' => __("Your password confirm must match with your new password")
                ]
            ]);
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
