<?php
namespace App\Controllers;

use App\Models\ProductChildModel\ProductChild;
use App\Services\ListProductService;
class ListProductController
{
    public function listProducts()
    {
        $products= (new ListProductService())->execute();
        $productList=[];
        foreach ($products as $product){
            $productList[$product['sku']]= new ProductChild(
                $product['sku'],
                $product['name'],
                (int)$product['price'],
                $product['description'],);
        }

        return require_once __DIR__ . '/../Views/ListProductView.php';
    }

    public function massDelete(): void
    {
        var_dump($_POST);die();
        require_once 'app/TypeModelCollection.php';


        (new MassDeleteService())->executeService();

        header('Location: /product/list');
    }
}