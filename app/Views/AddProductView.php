<?php

use App\HelperMethods;
use App\Models\Product;
use App\TypeModelCollection;
use App\Views\Js\Js;

$typeModels = (new TypeModelCollection())->getTypeModels();
$helpers = new HelperMethods();
$generatingJs = new Js();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="/app/Views/css/tailwind.css" rel="stylesheet">
    <title>Add</title>

</head>
<body class="flex flex-col h-screen" <?php echo (key_exists('select', $_SESSION)) ? 'onload="productTypeSwitchJS();"' : '' ?>>
<header class="flex justify-between border-1 border-black border-b mx-16 pt-16">
    <div class="pb-2">
        <h1 class="font-sans text-3xl ml-5">Product Add</h1>
    </div>
    <div class="mr-5 flex justify-between">
        <div class="pb-2 pl-5">
            <button form="form" id="saveButton"
                    class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow shadow-md"
                    role="button">save
            </button>
        </div>

        <div class="pl-5">
            <form action="/product/list" method="get">
            <button
               class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow-md"
               role="button">cancel</button>
            </form>
        </div>
    </div>
</header>
<div class="flex-grow">
    <form action="/product/add" method="post" id="form" onsubmit="productTypeInputValidationJS();">
        <div class="mx-16 pt-16 w-96">
            <?php
            $noneTypeNames = Product::NONE_TYPE_DESCRIPTION;
            foreach ($noneTypeNames as $name => $item):
                !empty($_SESSION[$item]) && !$_SESSION[$item]['validStatus'] ? $padding = 'pb-0' : $padding = 'pb-5'
                ?>
                <div class="flex justify-between <?php echo $padding ?>">
                    <?php echo '<label class="mr-20f float-left" for="' . $item . '">' . $name . '</label>'; ?>
                    <div>
                        <?php $value = $_SESSION[$item]['value'] ?? ''; ?>
                        <?php echo empty($_SESSION) || $_SESSION[$item]['validStatus']
                            ? '<input  class="border border-black" value="' . $value . '" type="text" id="' . $item . '" name="' . $item . '" required/>'
                            : '<input  class="border border-red-600" value="' . $value . '" type="text" id="' . $item . '" name="' . $item . '" required/>' ?>
                        <?php echo !empty($_SESSION) || !empty($_SESSION[$item]) && !$_SESSION[$item]['validStatus']
                            ? '<span class="flow-root font-light text-sm text-red-600">' . $_SESSION[$item]['errorMessage'] . '</span>' : '' ?>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="flex justify-between pb-5">
                <label for="selectType">Type Switcher</label>
                <select class="border border-black" name="select" id="selectType" onchange="productTypeSwitchJS();"
                        required>
                    <option class="text-gray-400 font-extralight" value="empty">Switch Type...</option>
                    <?php foreach ($typeModels as $type => $model): ?>
                        <option value="<?php echo $type ?>"<?php echo (key_exists('select', $_SESSION) && $_SESSION['select'] == $type) ? 'selected' : '' ?>>
                            <?php echo $type ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div style="width: 450px" class="mx-16 pt-16">
            <?php foreach ($typeModels as $model):
                $modelName = $model->getProductType() ?>
                <div id="<?php echo $modelName ?>"
                     class="p-5 border border-black box-border rounded-sm hidden">
                    <?php foreach ($model->descriptionFormValues() as $item => $input):
                    !empty($_SESSION[$item]) && !$_SESSION[$item]['validStatus'] ? $padding = 'pb-0' : $padding = 'pb-5' ?>
                    <div class="flex justify-between <?php echo $padding ?>">
                        <label for="<?php echo $item ?>"><?php echo $input ?></label>
                        <div>
                            <?php $value = $_SESSION[$item]['value'] ?? ''; ?>
                            <?php echo !empty($_SESSION) && isset($_SESSION[$item]['validStatus']) && !$_SESSION[$item]['validStatus']
                                ? '<input  class="border border-red-600" value="' . $value . '" type="text" id="' . $item . '" name="' . $item . '" />'
                                : '<input  class="border border-black" value="' . $value . '" type="text" id="' . $item . '" name="' . $item . '" />' ?>
                            <?php echo !empty($_SESSION) && isset($_SESSION[$item]['validStatus']) && !$_SESSION[$item]['validStatus']
                                ? '<span class="flow-root font-light text-sm text-red-600">' . $_SESSION[$item]['errorMessage'] . '</span>' : '' ?>
                        </div>
                    </div>
                    <span>
                <?php endforeach; ?>
                <a class="font-light"><?php echo $model->typeDescription() ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</div>

<footer class="flex justify-center border-1 border-black border-t mx-16">
    <a class="py-10">Scandiweb test assignment</a>
</footer>
<script>
    <?php
    echo $generatingJs->addProductJs();
    ?>
    <?php
    echo $generatingJs->validateEachProductAttributeInputField();
    ?>
</script>
</body>
</html>
