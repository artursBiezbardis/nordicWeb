<?php declare(strict_types=1);


namespace App\Models\ProductTypeModels;


use App\Models\Product;
use App\Models\ProductTypeInterface;

class Book extends Product implements ProductTypeInterface
{

    public function getProductType(): string
    {
        $getType = explode('\\', get_class());
        return end($getType);
    }

    public function descriptionFormValues(): array
    {
        return ['Weight (KG)'];
    }

    public function formattingProductDescription($arrayOfDescriptionValues): string
    {
        return 'Weight: ' . $arrayOfDescriptionValues['bookWeight'] . 'Kg';
    }

    function typeDescription(): string
    {
        return 'Please enter weight in kilograms.';
    }

}

