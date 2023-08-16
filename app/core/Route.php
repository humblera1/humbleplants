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
    private $exceptionClass = "app\\controllers\\ExceptionController";

    public function __construct()
    {        
        $request = $_SERVER['REQUEST_URI'];
        if (str_ends_with($request, '/') && strrpos($request, '/') !== 0){         
            $request = rtrim($request, '/');
            // header("HTTPS/1.1 301 Moved Permanently");
            header("Location: $request");            
        }        
        $this->address = explode('/', ltrim($request, '/'));

        if (!empty($this->address[0])){   
                     
            $controllerClass = "app\\controllers\\".ucfirst($this->address[0])."Controller";             
            if (file_exists($controllerClass.'.php') && count($this->address) <= 2){                                
                $this->controller = new $controllerClass();
                if (empty($this->address[1])){
                    $controller = $this->controller;                 
                    $controller->actionDefault();                
                }else{        
                    $controller = $this->controller;
                    $this->param = $this->address[1];             
                    $controller->actionShowOne($this->param);
                }
            }else{                
                $this->controller = new $this->exceptionClass();
                $this->controller->actionDefault();                               
            }
        }else{
            $this->controller = new MainController();
            $this->controller->actionDefault();
        }                
    }   
}