<?php

namespace App\Modules;

abstract class Model {

    use PDO;

    protected $table;

    public function find(array $filter) {  
        $connect = Database::connect();
        $where = $this->getFields($filter);
        $query = $connect->prepare("SELECT * FROM `{$this->table}` WHERE {$where}");
        $filter = $this->setFilter($filter);
        $query->execute($filter);
        
        return $query;
    }

    public function all() {
        $connect = Database::connect();
        $query = $connect->prepare("SELECT * FROM {$this->table} WHERE 1");
        $query->execute();

        return $query;
    }

    public function insert(array $filter) {
        $connect = Database::connect();
        $query = $connect->prepare("INSERT INTO {$this->table} (LOGIN, SENHA, ATIVO, NOME_COMPLETO) VALUES (:login, :senha, :ativo, :nome)");
        $query->execute($filter);

        return $query;
    }

    public function delete($id) {
        $connect = Database::connect();
        $query = $connect->prepare("DELETE FROM {$this->table} WHERE USUARIO_ID = :id");
        $query->execute(['id' => $id]);

        return $query;
    }
}