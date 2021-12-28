<?php

namespace App\Http\Controllers;

use App\Modules\Controller;

class AppController extends Controller {

    public function pesquisa() {
        return $this->view('pesquisa');
    }

    public function cadastro() {
        return $this->view('cadastro');
    }

    public function login() {
        return $this->view('login');
    }
}