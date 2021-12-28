<?php

namespace App\Http\Controllers;

use App\Modules\Controller;

class AppController extends Controller {

    public function index() {
        return $this->view('home');
    }

    public function cadastro() {
        return $this->view('cadastro');
    }

    public function login() {
        return $this->view('login');
    }
}