<?php


namespace App\Repositories;


class AddProductRepository
{

    public function add($model):void
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

                'sku' => $model->getSku(),
                'name' => $model->getName(),
                'price' => $model->getprice(),
                'description' => $model->getdescription()
            ])
            ->execute();
    }
}