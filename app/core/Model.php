<?php

namespace app\core;


/* 
    * Поскольку в приложении используеются только модели, работающие с БД, базовый класс модели реализует метод получения 
    * данных на основании переданного запроса.

*/

abstract class Model
{
    public $data;

    abstract public function getData(string $query);
}