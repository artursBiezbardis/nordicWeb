<?php declare(strict_types=1);

namespace App;

use App\Models\ProductTypeModels\{Book, DVD, Furniture};

class TypeModelCollection
{

    private $typeModels;

    public function __construct()
    {
        $this->typeModels = [
            'Book' => new Book(),
            'DVD' => new DVD(),
            'Furniture' => new Furniture()
        ];
    }

    public function getTypeModels(): array
    {
        return $this->typeModels;
    }

}
