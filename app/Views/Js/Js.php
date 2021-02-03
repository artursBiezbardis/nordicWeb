<?php declare(strict_types=1);

namespace App\Views\Js;

use App\HelperMethods;

class Js
{
    static function addProductJs($typeCollection): string
    {
        $script =
            'function productTypeSwitchJS() {' . "\n" . "\n" .

            "\t" . "\t" . 'const className = document.getElementById("selectType").value;' . "\n" .
            "\t" . "\t" . 'const typeChanged=className.toString().toLowerCase();' . "\n" .
            "\t" . "\t" . 'const SwitchType = {' . "\n" . "\t";
        foreach ($typeCollection as $type) {
            $methodName = strtolower($type);

            $script .= "\t" . "\t" . $methodName . ' : function () {' . "\n    ";
            $script .= "\t" . "\t" . self::switchPosition($type, $typeCollection) . "\n";
            $script .= "\t" . "\t" . "\t" . '},' . "\n" . "\n" . "\t";

        }
        $script .= "\n" . "\t" . "\t" . "\t" . 'empty: function () {' . "\n" . "\n";
        foreach ($typeCollection as $type) {

            $script .= "\t" . "\t" . "\t" . "\t" . 'document.getElementById("' . $type . '").style.display=\'none\';' . "\n";
        }
        $script .= "\t" . "\t" . "\t" . '}' . "\n" . "\t" . "\t" . '}' . "\n" . "\n" .
            "\t" . 'SwitchType[typeChanged]()'

            . "\n" . '}' . "\n";
        return $script;
    }

    static function switchPosition($type, $typeCollection): string
    {


        $jsVar = "\n" . "\t" . "\t" . "\t" . "\t" . 'document.getElementById("' . $type . '").style.display=\'block\';';
        foreach ($typeCollection as $wrongType) {
            if ($type != $wrongType) {
                $jsVar .= "\n" . "\t" . "\t" . "\t" . "\t" . 'document.getElementById("' . $wrongType . '").style.display=\'none\';';
            }

        }
        return $jsVar . "\n";
    }

    static function validateEachProductAttributeInputField($typeCollection): string
    {
        $script =
            'function productTypeInputValidationJS() {' . "\n" . "\n" .

            "\t" . "\t" . 'const className = document.getElementById("selectType").value;' . "\n" .
            "\t" . "\t" . 'const typeChanged=className.toString().toLowerCase();' . "\n" .
            "\t" . "\t" . 'const SwitchType = {' . "\n" . "\t";
        foreach ($typeCollection as $type => $model) {
            $methodName = strtolower($type);

            $script .= "\t" . "\t" . $methodName . ' : function () {' . "\n    ";
            $script .= "\t" . "\t" . self::switchPositionForInputFields($model) . "\n";
            $script .= "\t" . "\t" . "\t" . '},' . "\n" . "\n" . "\t";

        }
        $script .= "\t" . "\t" . 'empty : function () {' . "\n".
        'const weight = document.forms["form"]["inWeight"].value;
				let stringWeight = weight.toString();
				if( stringWeight === "" ) {
				alert("Name must be filled out");
				event.preventDefault();
				return false;
				}

			}';

        $script .= "\t" . "\t" . "\t" . '}' . /*"\n"."\t"."\t".'}'."\n"."\n".*/
            "\n" . "\t" . "\t" . 'SwitchType[typeChanged]()'

            . "\n" . '}' . "\n";
        return $script;
    }

    static function switchPositionForInputFields($model): string
    {
        $jsVar = '';
        foreach ($model->descriptionFormValues() as $input) {
            $input = HelperMethods::getPropertyNameForHtmlInput($input);
            $jsVar .= "\n" . "\t" . "\t" . "\t" . "\t" . 'const ' . strtolower($input) . ' = document.forms["form"]["in' . $input . '"].value;';
        }
        foreach ($model->descriptionFormValues() as $input) {
            $input = HelperMethods::getPropertyNameForHtmlInput($input);
            $jsVar .= "\n" . "\t" . "\t" . "\t" . "\t" . 'let string' . $input . ' = ' . strtolower($input) . '.toString();';
        }
        foreach ($model->descriptionFormValues() as $input) {
            $input = HelperMethods::getPropertyNameForHtmlInput($input);
            $jsVar .= "\n" . "\t" . "\t" . "\t" . "\t" . 'if( string' . $input . ' === "" ) {' . "\n" .
                "\t" . "\t" . "\t" . "\t" . 'alert("'.$input.' must be filled");' .
                "\n" . "\t" . "\t" . "\t" . "\t" . 'event.preventDefault();' .
                "\n" . "\t" . "\t" . "\t" . "\t" . 'return false;' .
                "\n" . "\t" . "\t" . "\t" . "\t" . '}';
        }
        return $jsVar . "\n";
    }
}









