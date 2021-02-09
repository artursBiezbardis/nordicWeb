<?php declare(strict_types=1);


namespace App;


use App\Models\ProductTypeInterface;

class HelperMethods
{
    static function typeCollection(string $dir): array
    {
        $productTypes = [];
        $files = scandir($dir);
        $index = 0;
        foreach ($files as $file) {
            $file = explode('.', $file);
            if ($file[1] == 'php') {
                $productTypes[$index] = $file[0];
                $index++;
            }
        }
        return $productTypes;
    }

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

