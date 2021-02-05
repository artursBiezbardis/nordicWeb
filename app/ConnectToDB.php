<?php


namespace App;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Connection;

;

use Doctrine\DBAL\DriverManager;

class ConnectToDB
{

    function query(): QueryBuilder
    {
        return self::database()->createQueryBuilder();
    }

    function database(): Connection
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => 'pdo_mysql',
        ];

        $connection = DriverManager::getConnection($connectionParams);
        $connection->connect();

        return $connection;
    }

}