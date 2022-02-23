<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property bool $gender
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $phone_number
 * @property string|null $image
 * @property bool $status
 * @property bool $active
 * @property bool $system
 * @property string|null $company
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip_code
 * @property int|null $country_id
 * @property string|null $note
 * @property string|null $fbid
 * @property string|null $ggid
 * @property \Cake\I18n\FrozenTime|null $last_visit
 * @property int $has_read
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Country $country
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        // 'email' => true,
        // 'password' => true,
        // 'role_id' => true,
        // 'gender' => true,
        // 'first_name' => true,
        // 'last_name' => true,
        // 'birthday' => true,
        // 'phone_number' => true,
        // 'image' => true,
        // 'status' => true,
        // 'active' => true,
        // 'system' => true,
        // 'company' => true,
        // 'address' => true,
        // 'city' => true,
        // 'state' => true,
        // 'zip_code' => true,
        // 'country_id' => true,
        // 'note' => true,
        // 'fbid' => true,
        // 'ggid' => true,
        // 'last_visit' => true,
        // 'has_read' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'role' => true,
        // 'country' => true
        '*' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected $_virtual = ['full_name'];
    /**
     * DefaultPasswordHasher
     *
     * You are responsible for hashing the passwords before they are persisted to the database
     * The easiest way is to use a setter function in your User entity
     *
     * @author Cake
     */
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }

    protected function _getFullName()
    {
        return $this->first_name . '  ' . $this->last_name;
    }

}
