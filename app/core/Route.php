<?php

namespace app\core;

use app\controllers;

class Route
{
    public $actionName = "actionDefault";
    public $controllerClass;
    public $controller;
    public $param;

    private $address;

    public function __construct()
    {
        echo "Класс Route найден и инициализирован </br>";
        
        $this->address = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
        print_r($this->address);

        

        if (!empty($this->address[0])){
            $this->controllerClass = "app\\controllers\\".ucfirst($this->address[0])."Controller";     
                        
            if (file_exists($this->controllerClass.'.php')){
                $this->controller = new $this->controllerClass();
            }else{
                echo "<b>Упс! Кажется, запрошенной вами страницы не существует</b>";
            }          
        }

        if (empty($this->address[1])){
            $controller = $this->controller;
            $actionName = $this->actionName;

            $controller->$actionName();
        
        }else{

            $controller = $this->controller;
            $this->param = $this->address[1];

            $actionName = "actionShowOne";

            $controller->$actionName($this->param);
        }

        
    }



    
}