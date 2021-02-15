<?php use App\HelperMethods; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="/app/Views/css/tailwind.css" rel="stylesheet">
    <title>Add</title>

</head>
<body class="flex flex-col h-screen">
<header class="flex justify-between border-1 border-black border-b mx-16 pt-16 mb-5">
    <div class="pb-2">
        <h1 class="font-sans  text-3xl ml-5">Product List</h1>
    </div>
    <div class="mr-5 flex justify-between">
        <div class="pl-5">
            <form action="/product/add" method="get">
                <button
                        class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow-md">
                    add
                </button>
            </form>
        </div>

        <div class="flex justify-between">
            <div class="pb-2 pl-5">
                <button form="formList" id="massDeleteButton"
                        class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow shadow-md"
                        role="button">mass delete
                </button>
            </div>
        </div>
</header>
<form action="/product/list" method="post" id="formList" onsubmit="">

    <div class="px-16 flex justify-center flex-wrap content-around">
        <?php foreach ($productList as $product): ?>
            <div class="text-sm box-border border border-black w-52 h-40 rounded-sm  mx-3  my-5">
                <input class="mt-2 ml-2" type="checkbox" id="<?php echo $product->getSku(); ?>"
                       name="<?php echo $product->getSku(); ?>" value="<?php echo $product->getSku(); ?>">
                <div class="flex justify-center ">
                    <?php echo $product->getSku(); ?>
                </div>
                <div class="flex justify-center col-start">
                    <?php echo $product->getName(); ?>
                </div>
                <div class="flex justify-center col-start">
                    <?php echo (new HelperMethods)->centsToDollars((float)$product->getPrice()) . " $"; ?>
                </div>
                <div class="flex justify-center col-start">
                    <?php echo $product->getDescription(); ?>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</form>

<div class="flex-grow"></div>
<footer class="flex justify-center border-1 border-black border-t mx-16">
    <a class="py-10">Scandiweb test assignment</a>
</footer>
<script>

</script>
</body>
</html>
