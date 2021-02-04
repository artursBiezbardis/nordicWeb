<?php


namespace App\Services;


use App\Repositories\ListProductDeleteRepository;

class ListProductDeleteService
{
    public function execute($sku)
    {
        (new ListProductDeleteRepository())->execute($sku);
    }
}