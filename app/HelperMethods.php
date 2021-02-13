<?php declare(strict_types=1);


namespace App;


use App\Models\ProductTypeInterface;

class HelperMethods
{

    public function formatTypeForHtmlInput(ProductTypeInterface $model, string $input): string
    {
        return strtolower(($model->getProductType())) . (self::getPropertyNameForHtmlInput($input));

    }

    public function getPropertyNameForHtmlInput(string $input): string
    {

        $name = explode(' ', $input);

        return $name[0];
    }

    public function centsToDollars(int $value)
    {
        return number_format(($value / 100), 2, '.', ' ');
    }


}

