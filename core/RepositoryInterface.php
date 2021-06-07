<?php

interface RepositoryInterface
{
    public function getAll($collection): array;
    public function getAllBy($collection, $id): array;

}

?>