<?php declare(strict_types=1);


namespace App\Services;

use App\Repositories\CheckIfSkuExistInDBRepository;
use App\Repositories\DeleteListProductsRepository;
class DeleteListProductsService
{
    public function deleteSelectedProducts()
    {
        $checkIfExistById=new CheckIfSkuExistInDBRepository();
        foreach ($_POST as $sku) {
            if(!is_null($checkIfExistById->execute($sku))){
                (new DeleteListProductsRepository())->delete($sku);
            }
        }
    }
}