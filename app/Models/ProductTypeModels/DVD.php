<?php declare(strict_types=1);


namespace App\Models\ProductTypeModels;

use App\Models\ProductTypeInterface;

class DVD implements ProductTypeInterface
{

    public function getProductType(): string
    {
        $getType = explode('\\', get_class());
        return end($getType);
    }

    public function descriptionFormValues(): array
    {
        return ['dvdSize'=>'Size (Mb)'];
    }

    public function formattingProductDescription(array $arrayOfDescriptionValues): string
    {
        return 'Size: ' . $arrayOfDescriptionValues['dvdSize'] . 'Mb';
    }

    public function typeDescription(): string
    {
        return 'Please provide DVD size in megabytes.';
    }


}