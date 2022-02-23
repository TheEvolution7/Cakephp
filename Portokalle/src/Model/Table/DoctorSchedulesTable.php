<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class DoctorSchedulesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('doctor_schedules');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator;
    }
}
