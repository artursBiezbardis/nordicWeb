<?php

namespace App\Controllers;

use App\Models\Product;
use App\Services\ListProductDeleteService;
use App\Services\ListProductService;

class ListProductController
{
    public function listProducts()
    {
        $products = (new ListProductService())->execute();
        $productList = [];
        foreach ($products as $product) {
            $productList[$product['sku']] = new Product(
                $product['sku'],
                $product['name'],
                (int)$product['price'],
                $product['description'],);
        }

        return require_once __DIR__ . '/../Views/ListProductView.php';
    }

    public function massDelete(): void
    {
        foreach ($_POST as $sku) {

            (new ListProductDeleteService())->execute($sku);
        }
        header('Location: /product/list');
    }
}