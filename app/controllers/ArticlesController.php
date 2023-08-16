<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\ArticlesModel;

class ArticlesController extends Controller
{
    private $view;
    private $model;
    private $data;

    public function __construct()
    {
       $this->view = new View();
       $this->model = new ArticlesModel();
    }

    public function actionDefault()
    {         
        $this->data = $this->model->getArticles();        
        $this->view->render('Articles', 'BasicTemplate', $this->data, 'Статьи');
    }

    public function actionShowOne($id)
    {   
        if (ctype_digit($id)) $this->data = $this->model->getArticle($id);                   
        if (!empty($this->data)){
            $this->view->render('Article', 'BasicTemplate', $this->data[0], $this->data[0]['title']);
        }else{
            $this->view->render('Exception', 'BasicTemplate');
        }           
    }
}