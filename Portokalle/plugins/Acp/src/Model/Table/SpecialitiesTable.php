<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Table\CoreTable;

class SpecialitiesTable extends CoreTable
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

        $this->setTable('specialities');
        $this->belongsToMany('Services', [
            'joinTable' => 'specialities_services',
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'slug', 'description', 'content'],
            'translationTable' => 'SpecialityTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);

        $this->addBehavior('Timestamp');
    }

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
            ->allowEmptyString('status');

        return $validator;
    }
}
