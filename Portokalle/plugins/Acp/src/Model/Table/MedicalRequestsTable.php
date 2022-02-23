<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;
use Cake\Utility\Text;
use Cake\I18n\I18n;
use Cake\Cache\Cache;
/**
 * MedicalRequests Model
 *
 * @property \Acp\Model\Table\MedicalRequestCategoriesTable|\Cake\ORM\Association\BelongsTo $MedicalRequestCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\MedicalRequest get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\MedicalRequest newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\MedicalRequest[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\MedicalRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\MedicalRequest|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\MedicalRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\MedicalRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\MedicalRequest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MedicalRequestsTable extends CoreTable
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

        $this->setTable('medical_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'className' => 'Acp.Users'
        ]);

        $this->belongsTo('Records');
        $this->belongsTo('Patients');
        
        
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        return $rules;
    }
}
