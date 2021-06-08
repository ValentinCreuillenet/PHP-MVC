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

        $this->uri = explode("/", $_SERVER['REQUEST_URI']);
    }

    /**
     * Méthode qui compare la longeur des deux tableaux $uri et $route et qui retourne
     * true si ils sont égaux et false le cas échéant
     * @return bool true dans le cas ou les deux tableaux on la même longeur, false sinon
     */
    private function isEqual()
    {

        return (count($this->uri) == count($this->route)) ?  true : false;

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
    private function compare():bool
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

        foreach($this->config as $key => $value){

            $this->route = explode("/", $key);

            if($this->isEqual()){
                $this->compare();
            }
        }
    }
}