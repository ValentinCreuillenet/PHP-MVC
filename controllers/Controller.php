<?php

abstract class Controller{

    //Tableau associatif réprensent $_GET a la creation de l'objet
    private $get;

    //Tableau associatif réprensent $_POST a la creation de l'objet
    private $post;


    public function __construct(){

        $this->get = $_GET;
        $this->post = $_POST;

    }

    //Getter de $get
    protected final function inputGet(){
        return $this->get;
    }

    //Getter de $post
    protected final function inputPost(){
        return $this->post;
    }

    /**
     * Méthode qui va choisir une vue en fonction d'un chemin et y injecter des données
     * @param $path Le chemin de la vue dans laquelle injecter les données
     * @param $data les données à injecter dans la vue
     */
    protected function render(string $pathToFile,array $data){

        foreach($data as $key => $value){
            $$key = $value;
        }

        include("./views/{$pathToFile}.php");

    }


}