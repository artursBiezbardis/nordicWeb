<?php
namespace App\Views\classNoneTypeFields\classNoneTypeFields;
class NoneTypeFields
{
    public $arrayOfNoneTypeFields = ['SKU', 'Name', 'Price'];

    public function viewNoneTypeFields():string
    {
        $fieldName='';
        foreach ($this->arrayOfNoneTypeFields as $field){

            $fieldName.='<div class="flex justify-between pb-5">
                <label class="mr-20" for="'.strtolower($field).'">'.$field.'</label>
                <div>
                    <?php $value= $_SESSION['.strtolower($field).'][\'value\']??\'\'; echo empty($_SESSION) || $_SESSION['.strtolower($field).'][\'validStatus\'] ? \'<input  class="border border-black" value="\' . $value. \'" type="text" id="sku" name="sku" />\' : \'<input  class="border-2 border-red-600" value="\' . $value. \'" type="text" id="sku" name="sku" />\'?>
                    <?php echo !empty($_SESSION) || !$_SESSION['.strtolower($field).'][\'validStatus\'] ? \'<span class="flow-root font-light text-sm text-red-600"> <?php echo $_SESSION['.strtolower($field).'][\'errorMessage\'].\'?> </span>\' : \'\' ?>
                </div>
            </div>';
        }
        return $fieldName;

    }
}