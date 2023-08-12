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
        $this->view = new View();
        $this->model = new CatalogModel();
    }

    public function actionDefault()
    {         
        $data = json_decode(file_get_contents('php://input'),true);
        if (!empty($data)){
            echo json_encode($this->model->getWithFilters($data), JSON_UNESCAPED_UNICODE);
            // echo $this->model->getWithFilters($data);

        }else{
        $this->data = $this->model->getData('SELECT id, name, latin_name, short_description, category FROM catalog ORDER BY category ASC');        
        $this->view->render('Catalog', 'BasicTemplate', $this->data);}        
    }

    public function actionShowOne(string $plantName)
    {

        $this->data = $this->model->getWithPrepare("SELECT id, name, short_description, full_description, light, watering, difficulty FROM catalog WHERE latin_name = ?", $plantName);
            
        if (empty($this->data)) echo 'oops';
        else $this->view->render('Plant', 'BasicTemplate', $this->data);  
    
    }

    
}
