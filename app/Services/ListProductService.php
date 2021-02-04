<?php


namespace App\Services;

use App\Repositories\ListProductRepository;

class ListProductService
{
    function execute()
    {

        return (new ListProductRepository())->execute();
    }
}