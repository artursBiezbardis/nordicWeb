<?php


namespace App\Repositories;


class ListProductDeleteRepository
{

    public function execute(string $sku): void
    {
        query()
            ->delete('products')
            ->where('sku= :sku')
            ->setParameter('sku', $sku)
            ->execute();

    }
}