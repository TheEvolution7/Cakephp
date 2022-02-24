<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Utility\Text;

/**
 * PageCategories Model
 *
 * @property \App\Model\Table\PageCategoriesTable|\Cake\ORM\Association\BelongsTo $ParentPageCategories
 * @property \App\Model\Table\PageCategoriesTable|\Cake\ORM\Association\HasMany $ChildPageCategories
 * @property \App\Model\Table\PagesTable|\Cake\ORM\Association\HasMany $Pages
 *
 * @method \App\Model\Entity\PageCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PageCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PageCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PageCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PageCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PageCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PageCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PageCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class PageCategoriesTable extends Table
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
    
        $this->addBehavior('Translate', [
            'fields' => ['title', 'alias', 'description', 'content'],
            'translationTable' => 'PageCategoriesTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);

        $this->setTable('page_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentPageCategories', [
            'className' => 'PageCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildPageCategories', [
            'className' => 'PageCategories',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Pages', [
            'foreignKey' => 'page_category_id'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'image' => [
                'fields' => [
                    'dir' => 'photo_dir',
                    'size' => 'photo_size',
                    'type' => 'photo_type'
                ],
                'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return strtolower(Text::slug($entity['alias'].'.'.$extension, ['preserve' => '.']));
                },
                'path' => 'webroot{DS}uploads{DS}{table}{DS}{field}{DS}{field-value:uuid}{DS}',
                'transformer' => function (\Cake\Datasource\RepositoryInterface $table, \Cake\Datasource\EntityInterface $entity, $data, $field, $settings) {
                    $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                    // Store the thumbnail in a temporary file
                    $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                    // Use the Imagine library to DO THE THING
                    $size = new \Imagine\Image\Box(150, 150);
                    $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                    $imagine = new \Imagine\Gd\Imagine();

                    // Save that modified file to our temp file
                    $imagine->open($data['tmp_name'])
                        ->thumbnail($size, $mode)
                        ->save($tmp);

                    // Now return the original *and* the thumbnail
                    return [
                        $data['tmp_name'] => $entity['alias'] . '.' . $extension,
                        $tmp => 'thumbnail-' . $entity['alias'] . '.' . $extension,
                    ];
                },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path
                    ];
                },
                'keepFilesOnDelete' => false
            ]
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
            // ->scalar('image')
            // ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->scalar('allowed_fields')
            ->allowEmptyString('allowed_fields');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentPageCategories'));

        return $rules;
    }
}
