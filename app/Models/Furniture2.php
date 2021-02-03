<?php


namespace App\Models;

use App\Models\Parent\Product;
use App\Models\Parent\DescriptionInterface;
class Furniture2 extends Product implements DescriptionInterface
{


    public function getProductType(): string
    {
        $getType=explode('\\',get_class());
        return end($getType);
    }
    public function descriptionFormValues(): array
    {
        return ['Height (CM)','Width (CM)', 'Length (CM)', 'Length2 (CM)'];
    }
    public function formattingProductDescription(): array
    {
        return ['Dimensions: ',' X '];
    }

    public function typeDescription(): string
    {
        return 'Please provide dimensions HxWxLxL2.';
    }
}