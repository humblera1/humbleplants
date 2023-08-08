<?php

namespace app\models;

use app\core\Model;
use PDO;



class CatalogModel extends Model
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

    public function getWithPrepare(string $query, $plantName)
    {
        
        $statement = $this->db->prepare($query);
        
        $statement->bindParam(1, $plantName, PDO::PARAM_STR);
        $statement->execute();
        
        $this->data = $statement->fetch(PDO::FETCH_ASSOC);
        

        return $this->data;
    }
}