<?php


namespace App\Services;

use App\Repositories\AddProductRepository;

class AddProductService
{
    public function executeService($model)
    {
        (new AddProductRepository())->add($model);
    }
}
