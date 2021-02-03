<?php


namespace App;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;


class ConnectionToDB
{
 static function connectToDB(): Connection
 {

     $connectionParams = array(
         'dbname' => 'mydb',
         'user' => 'user',
         'password' => 'secret',
         'host' => 'localhost',
         'driver' => 'pdo_mysql',
     );
     $connection = DriverManager::getConnection($connectionParams);
     $connection->connect();

     return $connection;

 }

 static function query(): QueryBuilder
 {
     return ConnectionToDB::connectToDB()->createQueryBuilder();
 }

}