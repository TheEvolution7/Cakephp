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
 * Records Model
 *
 * @property \Acp\Model\Table\RecordCategoriesTable|\Cake\ORM\Association\BelongsTo $RecordCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Record get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Record newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Record[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Record|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Record|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Record patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Record[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Record findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RecordsTable extends CoreTable
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

        $this->setTable('records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RecordCategories', [
            'foreignKey' => 'record_category_id',
            'className' => 'Acp.RecordCategories'
        ]);
        $this->belongsTo('Users');
        $this->belongsTo('Patients');
        $this->belongsToMany('RecordUsers', [
            'className' => 'Users'
        ]);
    }

    public function afterSave($event, $entity, $options = [])
    {
        $language = I18n::getLocale();
        Cache::delete('records_' . $language);
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
            // ->scalar('image')
            // ->maxLength('image', 255)
            ->allowEmptyFile('image');

        // $validator
        //     ->scalar('image_list')
        //     ->maxLength('image_list', 500)
        //     ->allowEmptyFile('image_list');

        // $validator
        //     ->integer('sort')
        //     ->allowEmptyString('sort');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['record_category_id'], 'RecordCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }



    // My function
    public function getCacheData()
    {
        $datas = $this->find('all')->where(['Records.status' => 1])->order(['Records.sort' => 'DESC'])->toArray();
        $cacheRecords = [];

        foreach ($datas as $key => $data) {
            $cacheRecords[$data->record_category_id][] = $data;
        }

        return $cacheRecords;
    }
}
