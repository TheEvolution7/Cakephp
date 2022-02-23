<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use App\Model\Table\CoreTable;
use Cake\Utility\Text;
use Cake\Event\Event;
use ArrayObject;
use Cake\Mailer\MailerAwareTrait;
/**
 * Settings Model
 *
 * @property \Acp\Model\Table\LanguagesTable|\Cake\ORM\Association\BelongsTo $Languages
 * @property \Acp\Model\Table\FbAppsTable|\Cake\ORM\Association\BelongsTo $FbApps
 *
 * @method \Acp\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Setting newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Setting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Setting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Setting[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Setting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingsTable extends CoreTable
{
    use MailerAwareTrait;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'Acp.Languages'
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'className' => 'Acp.Currencies'
        ]);
        // $this->belongsTo('FbApps', [
        //     'foreignKey' => 'fb_app_id',
        //     'className' => 'Acp.FbApps'
        // ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // $validator
        //     ->integer('id')
        //     ->allowEmptyString('id', 'create');

        $validator
        //     ->scalar('image')
        //     ->maxLength('image', 255)
        //     ->requirePresence('image', 'create')
            ->allowEmptyFile('image', true);


        return $validator;
    }

    public function afterSave($event, $query,ArrayObject $options)
    {
        $this->getMailer('Acp.Setting')->send('settingEdit');
    }
}
