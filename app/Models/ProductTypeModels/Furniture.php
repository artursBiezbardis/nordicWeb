<?php declare(strict_types=1);


namespace App\Models\ProductTypeModels;


use App\Models\ProductTypeInterface;

class Furniture implements ProductTypeInterface
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

    public function formattingProductDescription(array $arrayOfDescriptionValues): string
    {
        return 'Dimensions: '
            . $arrayOfDescriptionValues['furnitureHeight'] . 'x'
            . $arrayOfDescriptionValues['furnitureWidth'] . 'x'
            . $arrayOfDescriptionValues['furnitureLength'];
    }

    public function typeDescription(): string
    {
        return 'Please provide Dimensions in HxWxL format.';
    }
}