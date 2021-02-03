<?php


namespace App\Models;

use App\Models\Parent\Product;
use App\Models\Parent\DescriptionInterface;
class DVD extends Product implements DescriptionInterface
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
    public function formattingProductDescription(): array
    {
        return ['Size: ',''];
    }

    public function typeDescription(): string
    {
        return 'Please provide DVD size in megabytes.';
    }

}