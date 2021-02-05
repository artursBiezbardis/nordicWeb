<?php

use Doctrine\DBAL\Query\QueryBuilder;
use App\ConnectToDB;

require_once 'vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(__DIR__))->load();

function query(): QueryBuilder
{
    return (new ConnectToDB())->database()->createQueryBuilder();
}

require_once 'dispatcher.php';


