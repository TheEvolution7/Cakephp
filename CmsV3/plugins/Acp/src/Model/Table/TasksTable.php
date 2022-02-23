<?php
namespace Acp\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Table\CoreTable;
use Cake\ORM\Query;
use Cake\Event\Event;
use ArrayObject;

class TasksTable extends CoreTable
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

        $this->setTable('tasks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Acp.Roles', [
            'foreignKey' => 'role_id',
        ]);
        $this->belongsTo('Acp.Users', [
            'foreignKey' => 'user_id'
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
        return $validator;
    }
    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
        $query->where(['Tasks.user_id' => $_SESSION['Auth']['User']['id']]);
        return $query;
    }
}
