<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Repositories\ListProductRepository;

class ListProductService
{
    function crateList(): array
    {
        session_unset();

        $products = (new ListProductRepository())->create();
        $productList = [];
        foreach ($products as $product) {
            $productList[$product['sku']] = new Product(
                $product['sku'],
                $product['name'],
                (int)$product['price'],
                $product['description']);
        }
        return $productList;
    }
}