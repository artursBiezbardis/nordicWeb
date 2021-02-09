<?php declare(strict_types=1);


namespace App\Models\ProductTypeModels;


use App\Models\ProductTypeInterface;

class Book implements ProductTypeInterface
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

    public function formattingProductDescription(array $arrayOfDescriptionValues): string
    {
        return 'Weight: ' . $arrayOfDescriptionValues['bookWeight'] . 'Kg';
    }

    public function typeDescription(): string
    {
        return 'Please provide weight in kilograms.';
    }

}

