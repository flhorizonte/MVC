<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Modules\Controller;

class UserController extends Controller{


    public function cadastro() {
        $nome   = isset($_GET['nome']) ? $_GET['nome'] : null;
        $login  = isset($_GET['login']) ? $_GET['login'] : null;
        $ativo  = isset($_GET['ativo']) ? $_GET['ativo'] : null;
        $senha  = isset($_GET['senha']) ? $_GET['senha'] : null;

        $user = new UserModel;

        $query = $user->insert([
            'login' => $login,
            'nome' => $nome,
            'ativo' => $ativo,
            'senha' => $senha
        ]);

        if(!$query) {
            echo json_encode(['error' => 'não foi possível fazer o cadastro']);
        } else {
            echo json_encode(['message' => 'Cadastro efetuado']);
        }
    }

    public function pesquisar() {
        $nome = isset($_GET['nome']) ? $_GET['nome'] : null;

        $user = new UserModel;

        if(!empty($nome)) {
            $query = $user->find(['nome_completo' => $nome]);
        } else {
            $query = $user->all();
        }
        

        if($query->rowCount() > 0) {
            echo json_encode($query->fetchAll());
        } else {
            echo json_encode(['message' => 'nenhum registro encontrado']);
        }
    }

    public function update() {
        
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $user = new UserModel();
        $query = $user->find(['USUARIO_ID' => $id])->fetchAll();
        $user->delete($query[0]['USUARIO_ID']);

        echo json_encode(['message' => 'Usuario deletado com sucesso']);
    }
}