<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 *
 * @property \App\Model\Table\PageCategoriesTable|\Cake\ORM\Association\BelongsTo $PageCategories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Page get($primaryKey, $options = [])
 * @method \App\Model\Entity\Page newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Page|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Page[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Page findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagesTable extends Table
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

        $this->addBehavior('Translate', ['fields' => ['title', 'description', 'content']]);

        $this->setTable('pages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PageCategories', [
            'foreignKey' => 'page_category_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->scalar('image_list')
            ->maxLength('image_list', 500)
            ->allowEmptyFile('image_list');

        $validator
            ->integer('view_count')
            ->requirePresence('view_count', 'create')
            ->allowEmptyString('view_count', false);

        $validator
            ->integer('comment_count')
            ->allowEmptyString('comment_count');

        $validator
            ->integer('allow_comment')
            ->requirePresence('allow_comment', 'create')
            ->allowEmptyString('allow_comment', false);

        $validator
            ->integer('sort')
            ->allowEmptyString('sort');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->boolean('home')
            ->allowEmptyString('home');

        $validator
            ->boolean('featured')
            ->allowEmptyString('featured');

        $validator
            ->scalar('tag')
            ->maxLength('tag', 500)
            ->allowEmptyString('tag');

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
        $rules->add($rules->existsIn(['page_category_id'], 'PageCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
