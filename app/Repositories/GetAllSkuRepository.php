<?php


namespace App\Repositories;


class GetAllSkuRepository
{
    public function execute()
    {
        return query()
            ->select('sku')
            ->from('products')
            ->execute()
            ->fetchFirstColumn();

        }

    }