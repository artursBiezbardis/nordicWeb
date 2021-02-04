<?php


namespace App\Models\ProductChildModel;


use App\Models\Product;

class ProductChild extends Product
{

    public function __construct($sku, $name, $price, $description)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }
}