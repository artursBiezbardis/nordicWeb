<?php declare(strict_types=1);

namespace App\Controllers;

use App\Services\AddProductService;

class AddProductController
{
    public function showAddProductForm(): int
    {
        return require_once __DIR__ . '/../Views/AddProductView.php';
    }

    public function addProduct(): void
    {
        (new AddProductService())->saveProduct();

    }

}