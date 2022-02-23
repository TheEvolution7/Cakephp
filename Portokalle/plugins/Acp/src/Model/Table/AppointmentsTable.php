<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Table\CoreTable;

class AppointmentsTable extends CoreTable
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

        $this->setTable('appointments');
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Patients');

        $this->belongsTo('Practitioners', [
            'joinType' => 'INNER',
            'className' => 'Users'
        ]);

        $this->belongsTo('Personals', [
            'foreignKey' => 'practitioner_id',
        ]);
    }
}
