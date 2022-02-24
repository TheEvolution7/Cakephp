<?php
namespace Acp\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Coupon\Coupon;
use Acp\Coupon\Users;
use ArrayObject;
use Cake\Routing\Router;
// Custom
use App\Model\Table\CoreTable;

/**
 * Coupons Model
 *
 * @property \Acp\Model\Table\CouponCategoriesTable|\Cake\ORM\Association\BelongsTo $CouponCategories
 * @property \Acp\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Acp\Model\Entity\Coupon get($primaryKey, $options = [])
 * @method \Acp\Model\Entity\Coupon newEntity($data = null, array $options = [])
 * @method \Acp\Model\Entity\Coupon[] newEntities(array $data, array $options = [])
 * @method \Acp\Model\Entity\Coupon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Coupon|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Acp\Model\Entity\Coupon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Acp\Model\Entity\Coupon[] patchEntities($entities, array $data, array $options = [])
 * @method \Acp\Model\Entity\Coupon findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CouponsTable extends CoreTable
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

        $this->setTable('coupons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Acp.Users'
        ]);

        $this->addBehavior('Translate', [
            'fields' => ['title', 'description'],
            'translationTable' => 'CouponTranslations',
            'allowEmptyTranslations' => false,
            'validator' => 'translated'
        ]);
    }
}
