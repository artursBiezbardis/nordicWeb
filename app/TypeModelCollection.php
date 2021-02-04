<?php
namespace App;

use App\Models\ProductTypeModels\{Book,DVD,Furniture};
$typeModels=
    [
        'Book'=>new Book(),
        'DVD'=>new DVD(),
        'Furniture'=>new Furniture(),

];