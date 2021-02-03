<?php


namespace App\Services;

use App\Repositories\AddProductRepository;

class AddProductService
{
    public function executeService()
    {
        (new AddProductRepository())->add();
    }
}
