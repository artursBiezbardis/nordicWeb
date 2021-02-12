<?php declare(strict_types=1);


namespace App\Models;


interface ProductTypeInterface
{
    public function descriptionFormValues(): array;

    public function formattingProductDescription(array $arrayOfDescriptionValues): string;

    public function typeDescription(): string;

}