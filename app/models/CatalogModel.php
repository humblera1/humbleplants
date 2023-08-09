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

    public function getWithFilters($filters){
        
        $query = 'SELECT id, name, latin_name, short_description, category FROM catalog';
        $where = '';
        $params = [];

        $categories = $filters['category'];

        $placeholders = '?';     
        for ($i=0; $i<count($categories)-1; $i++){
            $placeholders .= ',?';
        }
        

        
        $whereCategory = '';
        if (!empty($categories)){
            $whereCategory = 'WHERE category IN ()';
            $pos = strpos($whereCategory, '(') + 1;
            $placeholders = '?';
            for ($i=0; $i<count($categories)-1; $i++){
                $placeholders .= ',?';
            }
            $whereCategory = substr_replace($whereCategory, $placeholders, $pos, 0);
            $where .= $whereCategory;
            $params = array_merge($params, $categories);
            
        }
        

        if (isset($filters['light'])) $light = $filters['light'];
        $whereLight = '';
        if (!empty($light)){
            if (empty($where)){
                $whereLight = 'WHERE light = ?';
            }else{
                $whereLight = ' AND light = ?';
            }
            $where .= $whereLight;
            $params[] = $light;
        }

        if (isset($filters['watering'])) $watering = $filters['watering'];
        $whereWatering = '';
        if (!empty($watering)){
            if (empty($where)){
                $whereWatering = 'WHERE watering = ?';
            }else{
                $whereWatering = ' AND watering = ?';
            }
            $where .= $whereWatering;
            $params[] = $watering;
        }

        if (isset($filters['difficulty'])) $difficulty = $filters['difficulty'];
        $whereDifficulty = '';
        if (!empty($difficulty)){
            if (empty($where)){
                $whereDifficulty = 'WHERE difficulty = ?';
            }else{
                $whereDifficulty = ' AND difficulty = ?';
            }
            $where .= $whereDifficulty;
            $params[] = $difficulty;
        }

        
 
        $query .= ' ' . $where . ' ' . 'ORDER BY category ASC';
        $statement = $this->db->prepare($query);
        $statement->execute($params);
        $this->data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return ($this->data);




        

        
        // return $this->data;

    }
}