<?php declare(strict_types=1);

namespace App\Models;

class Product
{
    private $sku;
    private $name;
    private $price;
    private $description;

    const NONE_TYPE_DESCRIPTION = ['SKU' => 'sku', 'Name' => 'name', 'Price ($)' => 'price'];

    public function __construct(string $sku, string $name, int $price, string $description)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getSku(): string
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