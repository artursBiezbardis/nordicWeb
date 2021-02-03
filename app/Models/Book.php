<?php declare(strict_types=1);


namespace App\Models;


use App\Models\Parent\Product;
use App\Models\Parent\DescriptionInterface;
class Book extends Product implements DescriptionInterface
{

    public function getProductType(): string
    {
        $getType=explode('\\',get_class());
        return end($getType);
    }

    public function descriptionFormValues(): array
    {
        return ['Weight (KG)'];
    }
    public function formattingProductDescription(): array
    {
        return ['Weight: ',''];
    }

    function typeDescription(): string
    {
        return 'Please enter weight in kilograms.';
    }

}

