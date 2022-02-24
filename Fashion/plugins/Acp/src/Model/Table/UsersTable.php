<?php
namespace Acp\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;
use Cake\Event\Event;
use Acp\Event\Users;
use ArrayObject;
use Cake\Routing\Router;
// Custom
use App\Model\Table\CoreTable;
use Cake\Utility\Text;


/**
 * Users Model
 *
 * @property \Acp\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \Acp\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \Acp\Model\Entity\User get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->belongsTo('Acp.Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator->add('password', [
            'compare' => [
                'rule' => ['compareWith', 'confirm_password'],
                'message' => 'Password confirm failed',
            ]
        ]);

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

        $validator
            // ->scalar('image')
            // ->maxLength('image', 255)
            ->allowEmptyFile('image');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }

    public function afterSave($event, $query,ArrayObject $options)
    {
        if(!isset($options['default']) && !empty($_SESSION['Auth'])){
            $this->eventManager()->attach(new Users());
            $event = new Event('Users.save.successed', $this, [
                'user_id' => $_SESSION['Auth']['User']['id'],
                'role_id' => $_SESSION['Auth']['User']['role_id'],
                'user_ip' => $_SERVER['REMOTE_ADDR'],
                'email' => $_SESSION['Auth']['User']['email'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'action' => Router::getRequest()->params['controller'].'.'.Router::getRequest()->params['action'].'.'.'successed',
                'model' => Router::getRequest()->params['controller'],
                'content' => Router::url(['controller' => Router::getRequest()->params['controller'], 'action' => 'edit',$query->id])
            ]);
            $this->eventManager()->dispatch($event);
        }
        
    }

    public function setGenders()
    {
        return ['Undefined', 'Male', 'Female'];
    }
    

    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
        if(isset($options['default']) && $options['default'] == true){
            return $query;
        }
        if (isset($_SESSION['Auth']) && $_SESSION['Auth']['User']['role_id'] == 1 && $_SESSION['Auth']['User']['system'] == 0) {
            $query->where(['Users.system !=' => 1]);
        }elseif (isset($_SESSION['Auth']) && $_SESSION['Auth']['User']['role_id'] == 1 && $_SESSION['Auth']['User']['system'] == 1) {
            $query->where(['OR' => ['Users.system !=' => 1,'Users.id' => $_SESSION['Auth']['User']['id']]]);
        }else{
            $query->where(['Users.active' => 1,'Users.role_id !=' => 1,'Users.system !=' => 1]);
        }
        return $query;
    }
}
