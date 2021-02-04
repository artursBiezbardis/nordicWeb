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
                    role="button">add
            </button>
        </div>

        <div class="pl-5">
            <a class="flex items-center block text-black p-0.5 px-2 bg-white hover:bg-gray-100 border border-black border-1 shadow-md"
               role="button">mass delete</a>
        </div>
    </div>
</header>
<form action="/product/list" method="post" id="formList" onsubmit="">

</form>

<div class="flex-grow "></div>
<footer class="flex justify-center border-1 border-black border-t mx-16 ">
    <a class="py-10">Scandiweb test assignment</a>
</footer>
<script>

</script>
</body>
</html>
