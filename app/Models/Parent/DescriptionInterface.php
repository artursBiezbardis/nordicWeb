<?php


namespace App\Models\Parent;


interface DescriptionInterface
{
 function descriptionFormValues():array;
 function formattingProductDescription($arrayOfDescriptionValues):string;
 function typeDescription():string;
}