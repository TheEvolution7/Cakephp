<?php
namespace App\Model\Table;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * ArticleCategories Model
 *
 * @property \App\Model\Table\ArticleCategorieCategoriesTable|\Cake\ORM\Association\BelongsTo $ArticleCategorieCategories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ArticleCategorie get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticleCategorie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArticleCategorie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategorie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleCategorie|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleCategorie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategorie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategorie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticleCategoriesTable extends Table
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

        $this->setTable('articles_categories');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Articles',[
            'joinTable' => 'articles_categories',
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'slug_custom', 'description', 'content','meta_title','meta_description','meta_keyword'],
            'translationTable' => 'ArticleCategoriesTranslations',
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
