<?php declare(strict_types=1);


namespace App\Models\ProductTypeModels;


use App\Models\ProductTypeInterface;

class Furniture2 implements ProductTypeInterface
{


    public function getProductType(): string
    {
        $getType = explode('\\', get_class());
        return end($getType);
    }

    public function descriptionFormValues(): array
    {
        return ['furniture2Height1' => 'Height1 (CM)', 'furniture2Height2' => 'Height2 (CM)', 'furniture2Width' => 'Width (CM)', 'furniture2Length' => 'Length (CM)'];
    }

    public function formattingProductDescription(array $arrayOfDescriptionValues): string
    {
        return 'Dimensions: '
            . $arrayOfDescriptionValues['furniture2Height1'] . '/'
            . $arrayOfDescriptionValues['furniture2Height2'] . 'x'
            . $arrayOfDescriptionValues['furniture2Width'] . 'x'
            . $arrayOfDescriptionValues['furniture2Length'];
    }

    public function typeDescription(): string
    {
        return 'Please provide Dimensions in H1/H2xWxL format.';
    }


}