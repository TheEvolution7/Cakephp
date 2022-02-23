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
 * Attributes Model
 *
 * @property \Acp\Model\Table\AttributeCategoriesTable|\Cake\ORM\Association\BelongsTo $AttributeCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Attribute get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Attribute newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Attribute[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Attribute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Attribute|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Attribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Attribute[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Attribute findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttributesTable extends CoreTable
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

        $this->setTable('attributes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description', 'url'],
            'translationTable' => 'AttributeTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);
        $this->hasMany('AttributeValues', [
            'className' => 'Acp.AttributeValues',
            'foreignKey' => 'attribute_id'
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
