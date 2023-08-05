<?php

namespace app\core;

use app\core\DbInterface;

//Класс, имплементирующий DbInterface; используется для создания соединения с БД 

class Db implements DbInterface{

    protected $dsn;
    protected $username;
    protected $password;
    protected $options;


    public function __construct(
        string $dsn,
        ?string $username = null,
        ?string $password = null,
        ?array $options = null
    )
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;

    }

    public function getConnection()
    {
        return new PDO($this->dsn, $this->username, $this->password, $this->options);
    }
}