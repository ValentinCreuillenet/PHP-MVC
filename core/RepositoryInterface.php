<?php

interface RepositoryInterface
{
    /**
     * Récupère tout les éléments d'une table/collection
     * @return array les éléments de la table/collection
     */
    public function getAll(): array;

    /**
     * Reécupère tout les éléments d'une table/collection qui correspondent a des param
     * @param array Les arguments qui servent a vérifier les éléments a récuperer
     * @return array Les éléments remontées par la requête
     */
    public function getAllBy(array $args): array;
}

?>