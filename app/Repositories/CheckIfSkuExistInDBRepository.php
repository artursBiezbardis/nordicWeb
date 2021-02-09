<?php declare(strict_types=1);


namespace App\Repositories;


class CheckIfSkuExistInDBRepository
{
    public function execute()
    {
        return query()
            ->select('id')
            ->from('products')
            ->where('sku = :sku')
            ->setParameter('sku', $_POST['sku'])
            ->execute()
            ->fetchOne();
    }
}