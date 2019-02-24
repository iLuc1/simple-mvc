<?php

namespace Root;

class Database {
    public function getConnection() {
        $pdo = new \PDO('pgsql:host=localhost;dbname=estudo_13;port=5432', 'postgres', 'root');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        return $pdo;
    }
}