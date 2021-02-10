<?php declare(strict_types=1);

namespace App\Controllers;

use App\Services\DeleteListProductsService;
use App\Services\ListProductService;

class ListProductController
{
    public function listProducts(): int
    {
        $productList = (new ListProductService())->crateList();

        return require_once __DIR__ . '/../Views/ListProductView.php';
    }

    public function massDelete(): void
    {
        header('Location: /product/list');
        (new DeleteListProductsService())->deleteSelectedProducts();
    }
}