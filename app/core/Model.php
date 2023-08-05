<?php

namespace app\core;


/* 
    * Поскольку в приложении используеются только модели, работающие с БД, базовый класс модели реализует метод получения 
    * данных на основании переданного запроса.

*/

class Model
{
    public $data;

    public function getData(string $query)
    {
        $this->data = $db->query($query)->fetchAll(PDO::FETCH_ASSOC); //логика извлечения данных в массив
        return $this->data;
    }
}