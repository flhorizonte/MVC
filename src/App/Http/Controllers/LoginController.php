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
        $login = isset($_GET['login']) ? $_GET['login'] : null;
        $senha = isset($_GET['senha']) ? $_GET['senha'] : null;

        if ($login !== null && $senha !== null) {
            $user = new UserModel;
            $data = $user->login($login, $senha);

            if ($data) {
                $this->createAuthSession($data[0]['LOGIN'], $data[0]['SENHA']);
                echo json_encode($data[0]);
                //sessão criada
            } else {
                echo json_encode(['error' => 'Login inválido']);
            }
        }
    }

    public function logout() {
        $this->destroyAuthSession();
        header("Location: http://localhost:8080/?");
    }
}
