<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\CatalogModel;

class CatalogController extends Controller
{
    public $plantName;
    public $model;
    public $view;

    public $data;

    public function __construct()
    {
        // echo "Экземпляр класса CatalogController успешно создан и готов к работе </br>";
        $this->view = new View();
        $this->model = new CatalogModel();
    }

    public function actionDefault()
    {
        $this->data = $this->model->getData('SELECT id, name, latin_name, short_description FROM catalog');
        
        $this->view->render('Catalog', 'BasicTemplate', $this->data);
    }

    public function actionShowOne(string $plantName)
    {
        //?

        
        $this->data = $this->model->getWithPrepare("SELECT id, name, short_description, full_description, light, watering, difficulty FROM catalog WHERE latin_name = ?", $plantName);
            
        if (empty($this->data)) echo 'oops';
        else $this->view->render('Plant', 'BasicTemplate', $this->data);
        
            
        


    }
}
