<?php


namespace App\Services;


use App\Repositories\GetAllSkuRepository;

class GetAllSkuService
{
    public function executeService()
    {
       return (new GetAllSkuRepository())->execute();
    }
}