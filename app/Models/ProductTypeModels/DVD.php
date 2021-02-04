<?php


namespace App\Models\ProductTypeModels;

use App\Models\Product;
use App\Models\ProductTypeInterface;
class DVD extends Product implements ProductTypeInterface
{

    public function getProductType(): string
    {
        $getType=explode('\\',get_class());
        return end($getType);
    }
    public function descriptionFormValues(): array
    {
        return ['Size (Mb)'];
    }
    public function formattingProductDescription($arrayOfDescriptionValues): string
    {
        return 'Weight: '.$arrayOfDescriptionValues['dvdSize'].'Mb';
    }

    public function typeDescription(): string
    {
        return 'Please provide DVD size in megabytes.';
    }

}