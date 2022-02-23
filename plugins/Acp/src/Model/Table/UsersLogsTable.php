<?php
namespace Acp\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Event\Event;
use App\Model\Table\CoreTable;
use ArrayObject;

class UsersLogsTable extends CoreTable
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

        $this->table('users_logs');
        $this->setDisplayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Acp.Users', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {

        if (isset($_SESSION['Auth']) && $_SESSION['Auth']['User']['role_id'] == 1) {
            if ($_SESSION['Auth']['User']['id'] == 5) {
                $query->where(['UsersLogs.user_id !=' => 6]);
            }
            if ($_SESSION['Auth']['User']['id'] == 6){
                $query->where(['UsersLogs.user_id !=' => 5]);
            }
            if (!in_array($_SESSION['Auth']['User']['id'],[5,6])) {
                $query->where(['UsersLogs.user_id NOT IN' => [5,6]]);
            }
        }else{
            $query->where(['UsersLogs.role_id !=' => 1]);
        }
        return $query;
    }
}
