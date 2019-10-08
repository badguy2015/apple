<?php
namespace core\lib;

use Medoo\Medoo;

Class model extends Medoo
{
    public $table;
    public function __constructPDO()
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

    public function __construct()
    {
        $option = \core\lib\config::getAll('database');
        parent::__construct($option);
    }

    public function getList($where=null)
    {
        return $this->select($this->table, '*', $where);
    }

    public function getOne($where)
    {
        return $this->get($this->table, '*', $where);
    }

    public function getOneById($id)
    {
        return $this->get($this->table, '*', ['id'=>$id]);
    }
}