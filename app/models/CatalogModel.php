<?php

namespace app\models;

use app\core\Model;
use app\core\Db;



class CatalogModel extends Model
{
    private $db;        

    public function __construct()
    {       
        $this->db = new Db();
    }

    public function getPlant($plantName)
    {
        $query = "SELECT id, name, short_description, full_description, light, watering, difficulty FROM catalog WHERE latin_name = ?";
        $this->data = $this->db->getData($query, [$plantName]);         
        return ($this->data);          
    }

    public function getPlants($filters = []){        
        $query = 'SELECT id, name, latin_name, short_description, category FROM catalog';
        $params = [];
        if (!empty($filters)){
            $whereStatement = '';                
            foreach ($filters as $key => $value){
                if(!empty($value)){
                    if(is_array($value)){                    
                        $categories = $value;
                        $placeholders = rtrim(str_repeat('?,', count($categories)), ',');
                        $whereStatement .= "WHERE category IN ($placeholders)";
                        $params = array_merge($params, $categories);
                    }else{
                        if (empty($whereStatement)){
                            $whereStatement .= "WHERE $key=?";                        
                        }else{
                            $whereStatement .= " AND $key=?";
                        }
                        $params[] = $value;                    
                    }                
                }
            }          
            $query .= ' ' . $whereStatement . ' ' . 'ORDER BY category ASC';
        }        
        $this->data = $this->db->getData($query, $params);
        return ($this->data);
    }
}