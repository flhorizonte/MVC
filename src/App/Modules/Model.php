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

}