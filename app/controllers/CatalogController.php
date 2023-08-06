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
        // $this->data = $this->model->getData('SELECT * FROM plants_table');
        // echo "Вызвано действие по умолчанию. Здесь содержится логика отображения каталога";

        $this->view->render('Catalog', 'BasicTemplate');
    }

    public function actionShowOne(string $plantName)
    {
        $this->plantName = $plantName; //?

        // try{
        //     $this->data = $this->model->getData("SELECT id, name, full_description FROM plant_table WHERE name = $plantName");
        //     $this->view-render('Plant', $data);
        // }catch(Error){
        //     echo 'Oops';
        // }

        // echo "Вызвано действие ShowOne. Здесь содержится логика проверки существования и отображения страницы растения {$plantName}";
    }
}
