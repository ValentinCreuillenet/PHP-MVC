<?php

interface CRUDInterface
{
    /**
     * Crée une nouvelle entité dan la bdd 
     * @param array Tableau assosiatif des données a insérer
     * @return object L'objet correspondant
     */
    public function create(array $args): object;

    /**
     * Récupère une entité par son ID
     * @param int L'id de l'entité a récupéré
     * @return object L'entité récupérée
     */
    public function retrieve(int $id) : object;

    /**
     * Met a jour une entité dans la BDD
     * @param object Le nouvelle état de l'entité
     * @return bool true si ça c'est bien passer et faux sinon
     */
    public function update(object $entity): bool;

    /**
     * Supprime une entité de la bdd
     * @param int L'id de l'entité a supprimer
     * @return bool true si ça c'est bien passer et fauc sinon
     */
    public function delete(int $id): bool;
}

?>