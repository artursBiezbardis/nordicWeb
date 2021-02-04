<?php
namespace App\Controllers;

use App\Services\AddProductService;
use App\Services\GetAllSkuService;
class ListProductController
{
    public function index():string
    {



        return require_once __DIR__ . '/../Views/ListProductView.php';
    }

    public function addProduct(): void
    {
        require_once 'app/TypeModelCollection.php';
        $_POST=array_filter($_POST);
        $descriptionValuesArray=array_diff_key($_POST,array_flip(['sku','name','price','select']));
        foreach ($typeModels as $key=>$model){
            if($_POST['select']==$key){
                $_POST['description']=$model->formattingProductDescription($descriptionValuesArray);
            }

        }

        (new AddProductService())->executeService();

        header('Location: /product/list');
    }
}