<?php

class DAO implements CRUDInterface, RepositoryInterface{

    protected $pdo;

    public function __construct(){
        $this->$pdo = new PDO("dsn","username","password");
    }
}

?>