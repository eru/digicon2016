<?php
/**
 * Short description for User.php
 *
 * @package User
 * @author Kazuki Hashimoto <eru.tndl@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 Kazuki Hashimoto <eru.tndl@gmail.com>
 * @license MIT
 */

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
