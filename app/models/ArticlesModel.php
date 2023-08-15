<?php

namespace app\models;

use app\core\Model;
use app\core\Db;

class ArticlesModel extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getArticles()
    {
        $query = "SELECT id, title FROM articles";        
        return $this->db->getData($query);
    }

    public function getArticle($id)
    {
        $query = "SELECT title, content FROM articles WHERE id = ?";      
        return $this->db->getData($query, [$id]);
    }
}