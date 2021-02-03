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
                'attribute' => ':attribute',
            ])
            ->setParameters([

                'sku' => $_POST['sku'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'attribute' => $_POST['attribute']
            ])
            ->execute();
    }
}