<?php declare(strict_types=1);


namespace App\Services;

use App\Repositories\DeleteListProductsRepository;
class DeleteListProductsService
{
    public function deleteSelectedProducts()
    {
        foreach ($_POST as $sku) {
            (new DeleteListProductsRepository())->delete($sku);
        }
    }
}