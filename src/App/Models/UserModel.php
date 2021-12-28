<?php

namespace App\Models;

use App\Modules\Database;
use App\Modules\Model;

class UserModel extends Model {

    protected $table = 'usuarios';

    public function login($login, $senha) {
        $user = $this->find(['login' => $login, 'senha' => $senha]);
        if($user->rowCount() > 0) {
            return $user->fetchAll();
        }

        return false;
    }
}