<?php

namespace app\core;

use app\core\DbInterface;
use PDO;

class Db implements DbInterface{

    private $db;

    protected $dsn;
    protected $username;
    protected $password;
    protected $options;  

    public function __construct(
        string $dsn = "mysql:host=localhost;dbname=humbleplants;charset=UTF8",
        ?string $username = "root",
        ?string $password = "282028",
        ?array $options = null
    )
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;

    }

    public function getData(string $query, array $params = [])
    {
        $this->db = new PDO($this->dsn, $this->username, $this->password, $this->options);
        $statement = $this->db->prepare($query);
        $statement->execute($params);
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}