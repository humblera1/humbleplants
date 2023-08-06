<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;

class MainController extends Controller
{
    public $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function actionDefault()
    {
        $this->view->render('Main');
    }
}