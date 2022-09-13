<?php

namespace App\Database;


class Connection
{
    public static function connectionDatabase()
    {
        try {
            $pdo = new \PDO('mysql:host=' . getenv('LOCALHOST') . ';dbname=' . getenv('DBNAME'), getenv('ROOT'), getenv('PASSWORD'));
            $pdo->setAttribute(\PDO::ERRMODE_EXCEPTION, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
