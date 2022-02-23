<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Table\CoreTable;

class PracticeHoursTable extends CoreTable
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

        $this->setTable('practice_hours');
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Patients', [
            'joinType' => 'INNER',
            'className' => 'Users'
        ]);

        $this->belongsTo('Practitioners', [
            'joinType' => 'INNER',
            'className' => 'Users'
        ]);

        $this->belongsTo('Personals');
        
        $this->hasMany('Acp.Hours');
    }
}
