<?php

namespace app\core;

use app\controllers;
use app\controllers\MainController;

class Route
{
    
    public $defaultControllerClass;
    public $controller;
    public $param;

    private $address;

    public function __construct()
    {
        // echo "Класс Route найден и инициализирован </br>";
        
        $this->address = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
        
        
        // print_r($this->address);

        
        
        if (!empty($this->address[0])){            
            $controllerClass = "app\\controllers\\".ucfirst($this->address[0])."Controller"; 
        
            
        
            
                        
            if (file_exists($controllerClass.'.php')){
                $this->controller = new $controllerClass();

                if (empty($this->address[1])){
                    $controller = $this->controller;
                    
        
                    $controller->actionDefault();
                
                }else{
        
                    $controller = $this->controller;
                    $this->param = $this->address[1];
        
                    
        
                    $controller->showOne($this->param);
                }
            }else{
                echo "<b>Упс! Кажется, запрошенной вами страницы не существует</b>";               
            }
        }else{
            $this->controller = new MainController();
            $this->controller->actionDefault();
        }
            

        

        

        
    }



    
}