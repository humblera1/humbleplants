<?php

namespace app\core;

interface DbInterface
{
    public function getData(string $query, array $params = []);
}