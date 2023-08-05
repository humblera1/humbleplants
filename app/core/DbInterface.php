<?php

namespace app\core;

//Интерфейс создания соединения с базой данных

interface DbInterface
{
    public function getConnection();
}