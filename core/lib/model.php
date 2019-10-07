<?php
namespace core\lib;

Class model extends \PDO
{
    public function __constructX()
    {
        $databaseConfig = \core\lib\config::getAll('database');
        $dsn = 'mysql:host='.$databaseConfig['host'].';dbname='.$databaseConfig['dbname'];
        try{
            parent::__construct($dsn, $databaseConfig['username'], $databaseConfig['password']);
            $this->query('SET NAMES utf8');
        } catch (\PDOException $e){
            p($e->getMessage());
        }
    }
}