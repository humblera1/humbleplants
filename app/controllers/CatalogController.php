<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\CatalogModel;

class CatalogController extends Controller
{
    
    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new CatalogModel();
    }

    public function actionDefault()
    {         
        $data = json_decode(file_get_contents('php://input'),true);
        if (!empty($data)){            
            echo json_encode($this->model->getPlants($data), JSON_UNESCAPED_UNICODE);            
        }else{
        $this->data = $this->model->getPlants();        
        $this->view->render('Catalog', 'BasicTemplate', $this->data, 'Каталог');
        }        
    }

    public function actionShowOne($plantName)
    {   
        $this->data = $this->model->getPlant($plantName);
            
        if (empty($this->data)){
            $this->view->render('Exception', 'BasicTemplate');
        }else{            
            $this->view->render('Plant', 'BasicTemplate', $this->data[0], $this->data[0]['name']);
        }   
    
    }

    
}
