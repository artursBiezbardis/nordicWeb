<?php


namespace App\Repositories;


class AddProductRepository
{

    public function add():void
    {
        query()
            ->insert('products')
            ->values([
                'sku' => ':sku',
                'name' => ':name',
                'price' => ':price',
                'description' => ':description',
            ])
            ->setParameters([

                'sku' => $_POST['sku'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description']
            ])
            ->execute();
    }
}