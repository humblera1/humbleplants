<?php

namespace app\models;

use app\core\Model;
use PDO;

class ArticlesModel extends Model
{
    public $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=humbleplants", "root", "4815162342");
    }

    public function getData(string $query)
    {
        $this->data = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC); 
        return $this->data;
    }

    public function getWithPrepare(string $query, $id)
    {
        
        $statement = $this->db->prepare($query);        
        $statement->execute([$id]);       
        
        $this->data = $statement->fetch(PDO::FETCH_ASSOC);
        

        return $this->data;
    }
}