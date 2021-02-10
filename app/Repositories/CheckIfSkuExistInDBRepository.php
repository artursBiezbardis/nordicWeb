<?php declare(strict_types=1);


namespace App\Repositories;


class CheckIfSkuExistInDBRepository
{
    public function execute($sku)
    {
        return query()
            ->select('id')
            ->from('products')
            ->where('sku = :sku')
            ->setParameter('sku', $sku)
            ->execute()
            ->fetchOne();
    }
}