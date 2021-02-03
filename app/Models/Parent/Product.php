<?php declare(strict_types=1);

namespace App\Models\Parent;

class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $productDescription;


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


    public function getProductDescription():string
    {
        return $this->productDescription;
    }


    public function setProductDescription(string $productDescription): void
    {
        $this->productDescription = $productDescription;
    }

    /*public function __construct($name,$sku,$price,$productDescription)
    {
        $this->name = $name;
        $this->sku = $sku;
        $this->price = $price;
        $this->productDescription = $productDescription;
    }*/





}