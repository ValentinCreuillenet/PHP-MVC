<?php

interface RepositoryInterface
{
    public function getAll(): array;
    public function getAllBy($args): array;

}

?>