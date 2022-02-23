<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;

/**
 * Albums Model
 *
 * @property \Acp\Model\Table\AlbumCategoriesTable|\Cake\ORM\Association\BelongsTo $AlbumCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Album get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Album newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Album[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Album|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Album|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Album patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Album[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Album findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumsTable extends CoreTable
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

        $this->setTable('albums');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        
        $this->belongsToMany('AlbumCategories',[
            'joinTable' => 'albums_categories',
            'className' => 'Acp.AlbumCategories'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->hasMany('AlbumImages', [
            'className' => 'Acp.AlbumImages',
            'foreignKey' => 'album_id',
            'sort' => ['AlbumImages.sort' => 'ASC', 'AlbumImages.id' => 'DESC']
        ]);
        
        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'slug_custom', 'description', 'content','meta_title','meta_description','meta_keyword', 'attribute', 'map'],
            'translationTable' => 'AlbumTranslations',
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

        $validator
            // ->scalar('image')
            // ->maxLength('image', 255)
            ->allowEmptyFile('image');

        // $validator
        //     ->scalar('image_list')
        //     ->maxLength('image_list', 500)
        //     ->allowEmptyFile('image_list');

        // $validator
        //     ->integer('view_count')
        //     ->requirePresence('view_count', 'create')
        //     ->allowEmptyString('view_count', false);

        // $validator
        //     ->integer('comment_count')
        //     ->allowEmptyString('comment_count');

        // $validator
        //     ->integer('allow_comment')
        //     ->requirePresence('allow_comment', 'create')
        //     ->allowEmptyString('allow_comment', false);

        // $validator
        //     ->integer('order')
        //     ->allowEmptyString('order');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->boolean('home')
            ->allowEmptyString('home');

        $validator
            ->allowEmptyString('featured');

        // $validator
        //     ->scalar('tag')
        //     ->maxLength('tag', 500)
        //     ->allowEmptyString('tag');

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
        //$rules->add($rules->existsIn(['album_category_id'], 'AlbumCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function getCacheData()
    {
        $datas = $this->find('all')->where(['Albums.status' => 1])->toArray();
        // $cacheProductCategories = [];

        // foreach ($datas as $key => $data) {
        //     $cacheProductCategories[$data->banner_category_id][] = $data;
        // }

        return $datas;
    }
}
