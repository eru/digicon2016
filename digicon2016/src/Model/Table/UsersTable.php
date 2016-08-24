<?php
/**
 * Short description for UsersTable.php
 *
 * @package UsersTable
 * @author Kazuki Hashimoto <eru.tndl@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 Kazuki Hashimoto <eru.tndl@gmail.com>
 * @license MIT
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }

}
