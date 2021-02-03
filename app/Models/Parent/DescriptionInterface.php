<?php


namespace App\Models\Parent;


interface DescriptionInterface
{
 function descriptionFormValues():array;
 function formattingProductDescription():array;
 function typeDescription():string;
}