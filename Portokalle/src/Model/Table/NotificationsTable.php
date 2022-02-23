<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
use Cake\I18n\Time;
/**
 * Notifications Model
 *
 * @property \App\Model\Table\NotificationCategoriesTable|\Cake\ORM\Association\BelongsTo $NotificationCategories
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Notification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notification newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notification|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notification|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notification[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notification findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificationsTable extends Table
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

        $this->setTable('notifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users');

        $this->belongsTo('Appointments', [
            'foreignKey' => 'foreign_key'
        ]);
    }

    public function findMap(Query $query, array $options)
    {
        return $query
            ->formatResults(function ($notifications) use ($options) {
                return $notifications->map(function ($notification) use ($options) {
                    $notification->data = unserialize($notification->data);

                    switch ($notification->type) {
                        case 'booking':
                            $notification->text = __(
                                'You have an appointment'
                            );

                            $notification->photo = Router::url('/uploads/personals/' . $notification->appointment->personal->id . DS . $notification->appointment->personal->photo);
                            if (!empty($notification->appointment->date)) {
                                $time = new Time(__('{0} {1}', [$notification->appointment->date->format('Y-m-d'), $notification->appointment->start_time]));

                                $notification->time = __(
                                    'with {0} @ {1}', $notification->appointment->personal->title . ' ' . $notification->appointment->personal->forename . ' ' . $notification->appointment->personal->surname, $time->nice()
                                );
                            }
                            

                            $notification->link = Router::url(['controller' => 'Notifications', 'action' => 'view', $notification->id]);
                            break;
                    }

                    return $notification;
                });
            });
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
