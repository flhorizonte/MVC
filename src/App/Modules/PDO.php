<?php

namespace App\Modules;

trait PDO {

    public function getFields(array $filter) : string {
        $fields = [];
        foreach($filter as $field => $value) {
            $fields[] = "{$field} = :{$field}";
        }
        return implode(" AND ", $fields);
    }

    public function setFilter(array $filter) : array {
        foreach($filter as $field => $value) {
            unset($filter[$field]);
            $filter[":{$field}"] = $value;
        }
        return $filter;
    }
}