<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


// Custom
use App\Model\Table\CoreTable;

/**
 * Items Model
 *
 * @method \Acp\Model\Entity\Item get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemsTable extends CoreTable
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

        $this->setTable('items');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'className' => 'Acp.Products'
        ]);

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'className' => 'Acp.Orders'
        ]);

        $this->belongsToMany('Acp.AttributeValues');
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
        return $rules;
    }
}
