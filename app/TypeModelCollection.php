<?php declare(strict_types=1);

namespace App;

use App\Models\ProductTypeModels\{Book, DVD, Furniture, Furniture2};

class TypeModelCollection
{

    private $typeModels;

    public function __construct()
    {
        $this->typeModels = [
            'Book' => new Book(),
            'DVD' => new DVD(),
            'Furniture' => new Furniture(),
            'Furniture2' => new Furniture2()
        ];
    }

    public function getTypeModels(): array
    {
        return $this->typeModels;
    }

}
