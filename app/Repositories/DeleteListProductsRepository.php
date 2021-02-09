<?php declare(strict_types=1);


namespace App\Repositories;


class DeleteListProductsRepository
{

    public function delete(string $sku): void
    {
        query()
            ->delete('products')
            ->where('sku= :sku')
            ->setParameter('sku', $sku)
            ->execute();
    }
}