<?php

namespace App\Modules;

trait Auth {

    public function createAuthSession($login, $senha) {
        if(!isset($_SESSION['auth'])) {
            $_SESSION['auth'] = [
                'usuario'   => $login,
                'senha'     => $senha
            ];
        }  
    }

    public function verifyAuthSession() {
        if(isset($_SESSION['auth'])) {
            return true;
        }

        return false;
    }

    public function destroyAuthSession() {
        unset($_SESSION['auth']);
        session_destroy();
    }
}