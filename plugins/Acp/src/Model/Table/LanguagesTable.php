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
 * Languages Model
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
class LanguagesTable extends CoreTable
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

        $this->setTable('languages');
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
            ->scalar('id')
            ->maxLength('id', 5)
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('def')
            ->maxLength('def', 3)
            ->allowEmptyString('def');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

         $validator
            ->allowEmptyFile('image');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        return $validator;
    }


    // public function getAllLanguage()
    // {
    //     $datas = $this->find('all')->where(['Languages.status' => 1])->toArray();

    //     $result = [];
    //     foreach ($datas as $key => $data) {
    //         $result[$data->id] = $data;
    //     }
        
    //     return $result;
    // }

    public function getListAllLanguage()
    {
        return $this->find('list', ['valueField' => 'id'])->where(['Languages.status' => 1])->toArray();
    }
}
