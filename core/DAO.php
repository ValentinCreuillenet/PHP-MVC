<?php

abstract class DAO implements CRUDInterface, RepositoryInterface{

    protected $pdo;

    public function __construct(){

        //On récupère les données du fichier de config pour créer notre PDO
        $database = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/config/database.json'),true);
        $dsn = "{$database['driver']}:dbname={$database['dbname']};host={$database['host']};port={$database['port']}";
        $username = $database['username'];
        $password = $database['password'];
        $this->pdo = new PDO($dsn,$username,$password);
    }

    public function create(array $args): object
    {
        return null;
    }

    public function retrieve(int $id) : object
    {
        return null;
    }

    public function update(object $entity): bool
    {
        return null;
    }

    public function delete(int $id): bool
    {
        return null;
    }

    public function getAll(): array
    {
        return null;
    }

    public function getAllBy(array $args): array
    {
        return null;
    }
}

?>