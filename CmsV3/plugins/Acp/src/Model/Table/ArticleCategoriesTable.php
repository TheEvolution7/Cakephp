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
 * ArticleCategories Model
 *
 * @property \Acp\Model\Table\ArticleCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentArticleCategories
 * @property \Acp\Model\Table\ArticleCategoriesTable|\Cake\ORM\Association\HasMany $ChildArticleCategories
 * @property \Acp\Model\Table\ArticlesTable|\Cake\ORM\Association\HasMany $Articles
 *
 * @method \Acp\Model\Entity\ArticleCategory get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\ArticleCategory newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\ArticleCategory[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\ArticleCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\ArticleCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\ArticleCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\ArticleCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\ArticleCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class ArticleCategoriesTable extends CoreTable
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

        $this->setTable('article_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentArticleCategories', [
            'className' => 'Acp.ArticleCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildArticleCategories', [
            'className' => 'Acp.ArticleCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'article_category_id',
            'className' => 'Acp.Articles'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description','keyword'],
            'translationTable' => 'ArticleCategoriesTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);

        $this->addBehavior('SummernoteAttachment');

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

        // $validator
        //     ->scalar('type')
        //     ->maxLength('type', 255)
        //     ->requirePresence('type', 'create')
        //     ->allowEmptyString('type', false);

        $validator
            // ->scalar('image')
            // ->maxLength('image', 255)
            // ->requirePresence('image', 'create')
            // ->allowEmptyFile('image', false);
            ->allowEmptyFile('image');

        // $validator
        //     ->integer('order')
        //     ->requirePresence('order', 'create')
        //     ->allowEmptyString('order', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        // $validator
        //     ->scalar('allowed_fields')
        //     ->allowEmptyString('allowed_fields');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentArticleCategories'));

        return $rules;
    }
}
