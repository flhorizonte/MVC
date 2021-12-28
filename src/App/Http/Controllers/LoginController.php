<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Modules\Auth;
use App\Modules\Controller;

class LoginController extends Controller
{

    use Auth;

    //fazer login
    public function auth()
    {
        $login = isset($_POST['login']) ? $_POST['login'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

        if ($login !== null && $senha !== null) {
            $user = new UserModel;
            $data = $user->login($login, $senha);

            if ($data) {
                $this->createAuthSession($data['LOGIN'], $data['SENHA']);
                //sessão criada
            }
        }
    }
}
