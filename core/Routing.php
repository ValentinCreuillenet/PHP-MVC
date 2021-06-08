<?php

class Routing{

    //Fichier JSON qui définit les différents chemin possible et autorisés
    private $config;

    //Tableau représentant le découpage de l'uri
    private $uri;

    //Réprésente la clé de config testé actuellement
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

    }

    /**
     * Méthode qui compare la longeur des deux tableaux $uri et $route et qui retourne
     * true si ils sont égaux et false le cas échéant
     * @return bool true dans le cas ou les deux tableaux on la même longeur, false sinon
     */
    private function isEqual():bool
    {

        return (count($this->uri) == count($this->route)) ? true : false;

    }

    /**
     * Cette méthode retourne une chaîne de caractère correspondant au contrôleur en cours de test
     * @return object Le contrôleur à retourner en fonction de l'URI
     */
    private function getValue(string $key){

        return $this->config[$key];

    }

    /**
     * Cette méthode ajoute les éléments variable de l'uri au tableau $args
     * @param int L'index de l'élément du tableau $uri a passer a $args
     */
    private function addArgument(int $index){

        if($route[$index] == "(:)") array_push($args, $uri[$index]);
    }

    /**
     * Cette méthode compare les tableaux $uri et $route
     * @return bool true si les tableau sont identique et false sinon
     */
    private function compare():bool
    {

        for($i = 0 ; $i < count($this->uri); $i++){

            if($this->uri[$i] != $this->route[$i]){

                if($route[$i] == "(:)") addArgument($i);
                else return false;
            }
        }

        return true;
    }

    /**
     * Cette méthode  crée un contrôleur et lui passe les arguments nécessaire pour qu'il fonctionne
     */
    private function invoke(){

        if(is_array($this->controller)) $this->controller = $this->controller[$this->method];

        $controllerName = explode(":", $this->controller)[0];

        $controllerMethod = explode(":", $this->controller)[1];

        $viewController = new $controllerName();

        $viewController->{$controllerMethod}($this->args);

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
                if($this->compare()){
                    $this->controller = $this->getValue($key);
                    $this->invoke();
                }
            }
        }
    }
}