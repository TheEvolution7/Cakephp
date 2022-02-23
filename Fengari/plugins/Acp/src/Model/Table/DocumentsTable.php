<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

/**
 * Documents Model
 *
 * @property \Acp\Model\Table\DocumentCategoriesTable|\Cake\ORM\Association\BelongsTo $DocumentCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Document get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Document newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Document[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Document|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Document|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Document patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Document[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Document findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentsTable extends CoreTable
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

        $this->setTable('documents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DocumentCategories', [
            'foreignKey' => 'document_category_id',
            'className' => 'Acp.DocumentCategories'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);
        $this->belongsToMany('Roles');
        // $this->hasOne('DocumentsRoles');

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description'],
            'translationTable' => 'DocumentTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);
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
            // ->scalar('file')
            // ->maxLength('file', 255)
            ->allowEmptyFile('file');

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
        $rules->add($rules->existsIn(['document_category_id'], 'DocumentCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }



    // My function
    public function getCacheData()
    {
        $datas = $this->find('all')->where(['Documents.status' => 1])->toArray();
        $cacheDocuments = [];

        foreach ($datas as $key => $data) {
            $cacheDocuments[$data->document_category_id][] = $data;
        }

        return $cacheDocuments;
    }
}
