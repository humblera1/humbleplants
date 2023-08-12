<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\ArticlesModel;

class ArticlesController extends Controller
{
    public $view;
    public $model;
    public $data;

    public function __construct()
    {
       $this->view = new View();
       $this->model = new ArticlesModel();
    }

    public function actionDefault()
    {         
        $this->data = $this->model->getData('SELECT id, title FROM articles');        
        $this->view->render('Articles', 'BasicTemplate', $this->data);
    }

    public function actionShowOne(string $id)
    {

        $this->data = $this->model->getWithPrepare("SELECT title, content FROM articles WHERE id = ?", $id);
            
        if (empty($this->data)) echo 'oops';
        else $this->view->render('Article', 'BasicTemplate', $this->data);  
    
    }
}