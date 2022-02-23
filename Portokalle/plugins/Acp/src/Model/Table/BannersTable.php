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
 * Banners Model
 *
 * @property \Acp\Model\Table\BannerCategoriesTable|\Cake\ORM\Association\BelongsTo $BannerCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Banner get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Banner newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Banner[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Banner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Banner|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Banner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Banner[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Banner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BannersTable extends CoreTable
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

        $this->setTable('banners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BannerCategories', [
            'foreignKey' => 'banner_category_id',
            'className' => 'Acp.BannerCategories'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description','content', 'url'],
            'translationTable' => 'BannerTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);
        
        
    }

    public function afterSave($event, $entity, $options = [])
    {
        $language = I18n::getLocale();
        Cache::delete('banners_' . $language);
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
        $rules->add($rules->existsIn(['banner_category_id'], 'BannerCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }



    // My function
    public function getCacheData()
    {
        $datas = $this->find('all')->where(['Banners.status' => 1])->order(['Banners.sort' => 'DESC'])->toArray();
        $cacheBanners = [];

        foreach ($datas as $key => $data) {
            $cacheBanners[$data->banner_category_id][] = $data;
        }

        return $cacheBanners;
    }
}
