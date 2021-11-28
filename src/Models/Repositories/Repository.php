<?php

namespace Models\Repositories;

use PDO;

abstract class Repository
{
    protected function getConnection(): PDO
    {
        $config = require 'db.config.php';
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $con = new PDO($config['host'], $config['username'], $config['password'], $options);
        
        return $con;
    }
}
