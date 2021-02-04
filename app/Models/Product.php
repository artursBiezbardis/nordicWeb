<?php declare(strict_types=1);

namespace App\Models;

class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $description;


    public function getSku():string
    {
        return $this->sku;
    }


    public function setSku($sku): void
    {
        $this->sku = $sku;
    }


    public function getName():string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getPrice():int
    {
        return $this->price;
    }


    public function setPrice(int $price): void
    {
        $this->price = $price;
    }


    public function getDescription():string
    {
        return $this->description;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }






}