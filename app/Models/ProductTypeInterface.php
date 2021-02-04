<?php


namespace App\Models;


interface ProductTypeInterface
{
 function descriptionFormValues():array;
 function formattingProductDescription($arrayOfDescriptionValues):string;
 function typeDescription():string;
}