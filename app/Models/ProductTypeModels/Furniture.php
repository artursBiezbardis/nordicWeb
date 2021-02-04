<?php


namespace App\Models\ProductTypeModels;

use App\Models\Product;
use App\Models\ProductTypeInterface;

class Furniture extends Product implements ProductTypeInterface
{


    public function getProductType(): string
    {
        $getType = explode('\\', get_class());
        return end($getType);
    }

    public function descriptionFormValues(): array
    {
        return ['Height (CM)', 'Width (CM)', 'Length (CM)'];
    }

    public function formattingProductDescription($arrayOfDescriptionValues): string
    {
        return 'Dimensions: '
            . $arrayOfDescriptionValues['furnitureHeight'] .'x'
            . $arrayOfDescriptionValues['furnitureWidth'] .'x'
            . $arrayOfDescriptionValues['furnitureLength'] ;
    }

    public function typeDescription(): string
    {
        return 'Please provide Dimensions in HxLxW format.';
    }
}