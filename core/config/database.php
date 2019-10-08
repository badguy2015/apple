<?php

return [
	/*
    'host'=>'192.168.199.241',
    'dbname'=>'apple',
    'username'=>'root',
    'password'=>'123456',
*/
    // 必须配置项
    'database_type' => 'mysql',
    'database_name' => 'bk',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',
 
    // 可选参数
    'port' => 3306,
 
    // 可选，定义表的前缀
    // 'prefix' => 'PREFIX_',
 
    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]

];