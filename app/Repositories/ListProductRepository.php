<?php declare(strict_types=1);


namespace App\Repositories;


class ListProductRepository
{
    public function create()
    {
        return query()
            ->select('*')
            ->from('products')
            ->orderBy('id', 'desc')
            ->execute()
            ->fetchAllAssociative();
    }

}