<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Repositories\AddProductRepository;
use App\Repositories\CheckIfSkuExistInDBRepository;
use App\TypeModelCollection;

class AddProductService
{
    public function saveProduct()
    {
        $skuExist = (new CheckIfSkuExistInDBRepository())->execute();

        if (!$skuExist) {
            $_POST = array_filter($_POST);
            $descriptionValueArray = array_diff_key($_POST,
                array_flip(['sku', 'name', 'price', 'select']));
            foreach ((new TypeModelCollection())->getTypeModels() as $key => $model) {
                if ($_POST['select'] == $key) {
                    $_POST['description'] = $model->formattingProductDescription($descriptionValueArray);
                }
            }
            $_POST['price'] = (int)($_POST['price'] * 100);
            $model = (new Product(
                $_POST['sku'], $_POST['name'], $_POST['price'], $_POST['description']));

            (new AddProductRepository())->save($model);

        } else {
            header('Location:/product/add');
            foreach ($_POST as $key => $item) {
                if ($item != '') {
                    $_SESSION[$key] = $item;
                }
            }
        }
    }
}