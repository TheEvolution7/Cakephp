<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ZoomOauths Model
 *
 * @method \App\Model\Entity\ZoomOauth get($primaryKey, $options = [])
 * @method \App\Model\Entity\ZoomOauth newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ZoomOauth[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ZoomOauth|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ZoomOauth saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ZoomOauth patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ZoomOauth[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ZoomOauth findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ZoomsTable extends Table
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

        $this->setTable('zooms');
        $this->setPrimaryKey('id');

        $this->belongsTo('Appointments');

        $this->addBehavior('Timestamp');
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
        return $validator;
    }
}
