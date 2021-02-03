<?php

use App\HelperMethods;
use App\Views\Js\Js;

require_once 'app/TypeModelCollection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="/app/Views/css/tailwind.css" rel="stylesheet">
    <title>Add</title>

</head>
<body class="flex flex-col h-screen">
<header class="flex justify-between border-1 border-black border-b mx-16 pt-16">
    <div class="pb-2">
        <h1 class="font-sans  text-3xl ml-5">Product Add</h1>
    </div>
    <div class="mr-5 flex justify-between">
        <div class="pb-2 pl-5">
            <button form="form" id="saveButton"
                    class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow shadow-md"
                    role="button">save
            </button>
        </div>

        <div class="pl-5">
            <a class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow-md"
               role="button">cancel</a>
        </div>
    </div>
</header>
<form action="/product/add" method="post" id="form" onsubmit="productTypeInputValidationJS()">
    <div class="mx-16 pt-16 w-96">

        <div class="flex justify-between pb-5">
            <label class="mr-20" for="sku">SKU</label>
            <input class="border border-black " type="text" id="sku" name="sku" required/>
        </div>

        <div class=" block flex justify-between pb-5">
            <label for="name">Name</label>
            <input class="border border-black " type="text" id="name" name="name" required/>
        </div>
        <div class="block flex justify-between pb-5">
            <label for="price">Price ($)</label>
            <input class="border border-black " type="number" id="price" name="price" required/>
        </div>

        <input type="hidden" id="description"/>

        <div class="flex justify-between pb-5">
            <label for="selectType">Type Switcher</label>
            <select class="border border-black" name="select" id="selectType" onchange="productTypeSwitchJS();" required>
                <option class="text-gray-400 font-extralight" value="empty">Switch Type...</option>
                <?php foreach ($typeModels as $type => $model): ?>
                    <option value="<?php echo $type ?>"><?php echo $type ?></option>
                <?php endforeach; ?>
            </select>
        </div>


    </div>


<div style="width: 450px" class=" mx-16 pt-16 ">
    <?php foreach ($typeModels as $model): ?>
        <div id="<?php echo $model->getProductType() ?>" class="p-5 border border-black box-border rounded-sm hidden">

            <?php foreach ($model->descriptionFormValues() as $input):
            $inputModelName=strtolower(($model->getProductType())).(HelperMethods::getPropertyNameForHtmlInput($input));
            ?>
            <div class="block flex justify-between pb-5">
                <label for="<?php echo HelperMethods::formatTypeForHtmlInput($model,$input)?>"><?php echo $input ?></label>
                <input class=" border border-black " type="number"
                       id="<?php echo HelperMethods::formatTypeForHtmlInput($model,$input);?>"
                       name="<?php echo HelperMethods::formatTypeForHtmlInput($model,$input)?>">
            </div>
            <span>
                <?php endforeach; ?>

                <a class="font-light"><?php echo $model->typeDescription() ?></a>

        </div>
    <?php endforeach; ?>

</div>
</form>

<div class="flex-grow "></div>
<footer class="flex justify-center border-1 border-black border-t mx-16 ">
    <a class="py-10">Scandiweb test assignment</a>
</footer>
<script>
    <?php
    echo Js::addProductJs(array_keys($typeModels));
    ?>
    <?php
    echo Js::validateEachProductAttributeInputField($typeModels);
    ?>
</script>
</body>
</html>
