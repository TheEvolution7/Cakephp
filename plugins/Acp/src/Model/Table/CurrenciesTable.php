<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


// Custom
use App\Model\Table\CoreTable;
use Cake\Utility\Text;

/**
 * Currencies Model
 *
 * @method \Acp\Model\Entity\Language get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Language newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Language[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Language|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Language|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Language patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Language[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Language findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CurrenciesTable extends CoreTable
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

        $this->setTable('currencies');
        $this->setDisplayField('title');
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
            // ->scalar('image')
            // ->maxLength('image', 255)
            // ->requirePresence('image', 'create')
            // ->allowEmptyFile('image', false);
            ->allowEmptyFile('image');
        return $validator;
    }


}
