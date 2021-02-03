<?php declare(strict_types=1);


namespace App;



class HelperMethods
{

    static function typeCollection($dir): array
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

    static function getPropertyNameForHtmlInput($input): string
    {

        $name = explode(' ',$input);

        return $name[0];
    }
}

