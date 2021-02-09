<?php declare(strict_types=1);


namespace App\Repositories;


use App\Models\Product;

class AddProductRepository
{

    public function save(Product $model): void
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