<?php declare(strict_types=1);

namespace App\Models;

class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $description;


    public function getSku()
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getPrice(): int
    {
        return $this->price;
    }



    public function getDescription(): string
    {
        return $this->description;
    }


}