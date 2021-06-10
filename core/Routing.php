<?php

class Routing{

    //Fichier JSON qui définit les différents chemin possible et autorisés et les contrôleur associées
    private $config;

    //Tableau représentant le découpage de l'uri par un /
    private $uri;

    //Tableau représentant la clé de config testé actuellement par un /
    private $route;

    //Le nom du controller a charger
    private $controller;

    //Les arguments a passer au controller
    private $args;

    //Le verbe HTTP de la requête
    private $method;

    public function __construct(){

        $this->config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/config/routing.json'),true); 

        $this->uri = explode("/", $_SERVER['REQUEST_URI']);

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->execute();

    }

    /**
     * Méthode qui compare la longeur des deux tableaux $uri et $route et qui retourne
     * true si ils sont égaux et false le cas échéant
     * @return bool true dans le cas ou les deux tableaux on la même longeur, false sinon
     */
    private function isEqual():bool
    {

        return (count($this->uri) == count($this->route));

    }

    /**
     * Cette méthode retourne une chaîne de caractère correspondant au contrôleur en cours de test
     */
    private function getValue($value){

        return !is_array($value) ? $value : $value[$this->method];

    }

    /**
     * Cette méthode vérifie l'élément de $route qui corrspond a l'index passer, l'ajoute args si c'est bien un élément variable et sinon retourne false
     * @param int L'index de l'élément du tableau $uri a passer a $args
     */
    private function addArgument(int $index){

        return ($this->route[$index] == "(:)") ? array_push($this->args, $this->uri[$index]) : false;

    }

    /**
     * Cette méthode  crée un contrôleur et lui passe les arguments nécessaire pour qu'il fonctionne
     */
    private function invoke(){

        $controllerName = explode(":", $this->controller)[0];

        $controllerMethod = explode(":", $this->controller)[1];

        call_user_func_array(array(new $controllerName, $controllerMethod), $this->args);

    }

    /**
     * Cette méthode compare les tableaux $uri et $route
     * @return false si les tableau ne sont pas identiques et exécute la fonction invoke si ils le sont
     */
    private function compare(){

        for($i = 0 ; $i < count($this->uri); $i++){

            if($this->uri[$i] != $this->route[$i]){

                if(!$this->addArgument($i)) return false;

            }
        }

        $this->invoke();
    }

    /**
     * Supprimme tout les chaînes vide dans $uri et $rout et réinitialize $args
     */
    private function sanitize(){

        $this->args = array();
        array_filter($this->uri);
        array_filter($this->route);

    }

    /**
     * Méthode invoquées a chaque chargemnt de page qui va déclancher toute
     * la mécanique interne qui va permetre a l'objet Routing de charger la la
     * page correspondante à la requête http
     */
    public function execute(){

        foreach($this->config as $key => $value){

            $this->controller = $this->getValue($value);
            $this->route = explode("/", $key);
            $this->sanitize();

            if($this->isEqual()){

                if($this->compare())break;

            }
        }
    }
}