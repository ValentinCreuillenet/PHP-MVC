<?php

class Routing{

    private $config;

    public function __construct(){

        $this->config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/config/routing.json'),true); 

    }

    public function test(){
        return $this->config;
    }
}