<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
/**
 * Appointments Model
 *
 * @property \App\Model\Table\AppointmentCategoriesTable|\Cake\ORM\Association\BelongsTo $AppointmentCategories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Appointment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appointment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appointment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appointment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appointment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appointment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appointment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AppointmentsTable extends Table
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
        
        $this->belongsTo('Patients', [
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Practitioners', [
            'joinType' => 'INNER',
            'className' => 'Users'
        ]);

        $this->belongsTo('Personals', [
            'foreignKey' => 'practitioner_id',
        ]);

        $this->belongsTo('Services');

        $this->hasOne('Orders');
        $this->hasOne('Zooms');
    }

    public function listType()
    {
        $list_type = [
            [
                'title' => __('Patient'),
                'children' => [
                    'locate',
                    'patient'
                ],
            ],
            [
                'title' => __('Speciality'),
                'children' => [
                    'speciality',
                ],
            ],
            [
                'title' => __('Details'),
                'children' => [
                    'service',
                    'provider',
                    'slot',
                    'details',
                    'review'
                ],
            ],
            [
                'title' => __('Confirm Details'),
                'children' => [
                    'payment'
                ],
            ],
            [
                'title' => __('Provider pairing'),
                'children' => [
                ],
            ],
        ]; 

        return $list_type;
    }
}
