<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

use Cake\Utility\Text;
use Cake\ORM\Rule\IsUnique;
/**
 * Pharmacys Model
 *
 * @property \Acp\Model\Table\PharmacyCategoriesTable|\Cake\ORM\Association\BelongsTo $PharmacyCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Pharmacy get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Pharmacy newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Pharmacy[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Pharmacy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Pharmacy|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Pharmacy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Pharmacy[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Pharmacy findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PharmacysTable extends CoreTable
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

        $this->setTable('pharmacys');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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

        $validator
            ->allowEmptyFile('image');

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

        $rules->add($rules->isUnique(
            ['latitude', 'longitude'],
            'This latitude & longitude combination has already been used.'
        ));

        return $rules;
    }
}
