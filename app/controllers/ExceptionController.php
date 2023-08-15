<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;

class ExceptionController extends Controller
{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function actionDefault()
    {
        $this->view->render('Exception', 'BasicTemplate');
    }
}