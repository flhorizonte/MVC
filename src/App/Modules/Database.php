<?php

namespace App\Modules;

use PDO;
use PDOException;

class Database
{
    //use traits?
    public static function connect()
    {
        try {
            $database_config = require('./src/App/config/database.php');
            $host       = $database_config['mysql']['host'];
            $db         = $database_config['mysql']['db'];
            $user       = $database_config['mysql']['user'];
            $password   = $database_config['mysql']['password'];

            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $error) {
            echo $error->getMessage();
        } 
    }
}
