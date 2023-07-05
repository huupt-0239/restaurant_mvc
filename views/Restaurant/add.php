<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/notyf@3.3.0/notyf.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <style>
        .form-checkbox:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3.3.0/notyf.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <title>Create New Restaurant</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <form class="w-1/3 bg-white rounded shadow p-8" action="" method="get">
            <input type="hidden" name="act" value="store">
            <h1 class="text-center text-4xl mb-16">Create Restaurant</h1>
            <div class="flex text-center items-center mb-12">
                <h2>Restaurant Name</h2>
                <input class="ml-10 justify-center rounded border border-gray-300 w-[17rem] px-3 py-2" type="text" name="name" value="">
            </div>
            <div class="flex text-center items-center mb-12">
                <h2>Description</h2>
                <input class="ml-20 justify-center rounded border border-gray-300 px-3 w-[17rem] py-2" type="text" name="description" value="">
            </div>
            <div class="flex text-center items-center mb-12">
                <h2>Image URL</h2>
                <input class="ml-20 w-[17rem] justify-center rounded border border-gray-300 px-3 py-2" type="text" name="img_url" value="">
            </div>
            <div class="flex justify-center">
                <button class="rounded bg-blue-500 text-white px-6 py-2" type="submit">Save</button>
            </div>

        </form>

    </div>

</body>

</html>