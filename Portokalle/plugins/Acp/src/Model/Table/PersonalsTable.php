<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Table\CoreTable;

class PersonalsTable extends CoreTable
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

        $this->setTable('personals');
        $this->addBehavior('Timestamp');

        $this->hasMany('Acp.PracticeHours');
        $this->belongsTo('Practitioners', [
            'joinType' => 'INNER',
            'foreignKey' => 'user_id',
            'conditions' => ['role_id' => 5],
            'className' => 'Users'
        ]);
        $this->belongsToMany('Acp.Services');
        $this->belongsToMany('Acp.Specialities');
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

        return $validator;
    }
}
