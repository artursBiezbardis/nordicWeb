<?php


namespace App\Repositories;


class ListProductRepository
{

    public function execute()
    {
        return query()
            ->select('*')
            ->from('products')
            ->orderBy('id', 'desc')
            ->execute()
            ->fetchAllAssociative();
    }


}