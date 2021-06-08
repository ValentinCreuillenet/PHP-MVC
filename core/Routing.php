<?php

class Routing{

    //Fichier JSON qui définit les différents chemin possible et autorisés
    private $config;

    //Tableau représentant le découpage de l'uri
    private $uri;

    //Réprésente la clé de config a tester
    private $route;

    //Le nom du controller a charger
    private $controller;

    //Les arguments a passer au controller
    private $args;

    //Le verbe HTTP de la requête courante
    private $method;

    public function __construct(){

        $this->config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/config/routing.json'),true); 

    }

    /**
     * Méthode qui compare la hauteur de deux tableaux passés en arguments et qui retourne
     * true si ils sont égaux et false le cas échéant
     * @param arr1 Le  premier des tableaux à comparer
     * @param arr2 Le deuxième des deux tableaux à comparer
     * @return bool true dans le cas ou les deux tableaux on la même longeur, false sinon
     */
    private function isEqual(array $arr1, array $arr2):bool
    {
        return false;
    }

    /**
     * Cette méthode retourne le contrôleur spécifique dépandant de l'URI précisé
     * @return object Le contrôleur à retourner en fonction de l'URI
     */
    private function getValue():object
    {
        return null;
    }

    /**
     * Cette méthode ajoute les éléments variable de l'uri au tableau $args
     */
    private function addArgument(){
        
    }

    /**
     * Cette méthode compare les tableaux $uri et $route
     * @return bool true si les tableau sont identique et false sinon
     */
    private function compare():bool;
    {
        return false;
    }

    /**
     * Cette méthode  crée un contrôleur et lui passe les arguments nécessaire pour qu'il fonctionne
     */
    private function invoke(){

    }

    /**
     * Méthode invoquées a chaque chargemnt de page qui va déclancher toute
     * la mécanique interne qui va permetre a l'objet Routing de charger la la
     * page correspondante à la requête http
     */
    public function execute(){

    }
}