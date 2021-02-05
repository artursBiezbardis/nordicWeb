<?php

namespace App\Controllers;

use App\Services\AddProductService;
use App\Services\GetAllSkuService;
use App\Models\Product;

class AddProductController
{
    public function showAddProductForm(): string
    {

        $skuArray = (new GetAllSkuService())->executeService();


        return require_once __DIR__ . '/../Views/AddProductView.php';
    }

    public function addProduct(): void
    {
        require_once 'app/TypeModelCollection.php';
        $_POST = array_filter($_POST);
        $descriptionValueArray = array_diff_key($_POST, array_flip(['sku', 'name', 'price', 'select']));
        foreach ($typeModels as $key => $model) {
            if ($_POST['select'] == $key) {
                $_POST['description'] = $model->formattingProductDescription($descriptionValueArray);
            }

        }
        $model = new Product(
            $_POST['sku'],
            $_POST['name'],
            intval($_POST['price']),
            $_POST['description']);

        (new AddProductService())->executeService($model);

        header('Location: /product/list');
    }
}