<?php
namespace App\Controllers;

use App\Services\AddProductService;
class AddProductController
{
    public function showAddProductForm():string
    {

        return require_once __DIR__ . '/../Views/AddProductView.php';
    }

    public function addProduct(): void
    {
        (new AddProductService())->executeService();
        header('Location: /product/add');
    }
}