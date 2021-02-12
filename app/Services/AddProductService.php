<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Models\Validation;
use App\Repositories\AddProductRepository;
use App\Repositories\CheckIfSkuExistInDBRepository;
use App\TypeModelCollection;

class AddProductService
{
    public function saveProduct(): void
    {
        header('Location:/product/add');
        session_unset();
        $typeModels=(new TypeModelCollection())->getTypeModels();
        $validation = new Validation();
        $_SESSION['skuExistInDB'] = (new CheckIfSkuExistInDBRepository())->execute(strval($_POST['sku']));
        $_SESSION['sku'] = $validation->skuValidation(strval($_POST['sku']), $_SESSION['skuExistInDB']);
        $_SESSION['name'] = $validation->nameValidation(strval($_POST['name']));
        $_SESSION['price'] = $validation->priceValidation(strval($_POST['price']));
        $_SESSION['select'] = $_POST['select'];
        $typeValidation=$typeModels[$_POST['select']]->descriptionFormValues();
        foreach ($typeValidation as $key=>$value){
            $_SESSION[$key] = $validation->attributeFieldValidation($_POST[$key]);
        }
            if ($_SESSION['sku']['validStatus'] && $_SESSION['name']['validStatus'] && $_SESSION['price']['validStatus']) {
                header('Location:/product/list');
                $_POST = array_filter($_POST);
                $descriptionValueArray = array_diff_key($_POST,
                    array_flip(['sku', 'name', 'price', 'select']));
                foreach ((new TypeModelCollection())->getTypeModels() as $key => $model) {
                    if ($_POST['select'] == $key) {
                        $_POST['description'] = $model->formattingProductDescription($descriptionValueArray);
                    }
                }
                $model = (new Product($_POST['sku'], $_POST['name'],
                    (int)($_POST['price'] * 100), $_POST['description']));

                (new AddProductRepository())->save($model);
            }
        }


}