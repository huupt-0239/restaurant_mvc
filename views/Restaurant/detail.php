<?php
if ($restaurant) {
    $id = $restaurant['id'];
    $name = $restaurant['name'];
    $description = $restaurant['description'];
    $image_url = $restaurant['img_url'];
    $user_id = $restaurant['user_id'];
?>

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
        <title>Restaurant Detail</title>
    </head>

    <body>
        <div class="flex mt-36 items-center justify-center h-screen">
            <form class="w-1/3 bg-white rounded shadow p-8" action="" method="get">
                <input type="hidden" name="act" value="edit">
                <h1 class="text-center text-4xl mb-6">Restaurant Detail</h1>
                <div class="flex text-center items-center mb-6">
                    <h2>ID</h2>
                    <input class="ml-36 justify-center rounded border border-gray-300 px-3 py-2 w-[5rem]" type="text" name="id" value="<?php echo $id ?>">
                </div>
                <div class="flex text-center items-center mb-6">
                    <h2>Restaurant Name</h2>
                    <input class="ml-10 justify-center rounded border border-gray-300 w-[17rem] px-3 py-2" type="text" name="name" value="<?php echo $name ?>">
                </div>
                <div class="flex text-center items-center mb-6">
                    <h2>Description</h2>
                    <input class="ml-20 justify-center rounded border border-gray-300 px-3 w-[17rem] py-2" type="text" name="description" value="<?php echo $description ?>">
                </div>
                <div class="flex text-center items-center mb-6">
                    <h2>User ID</h2>
                    <input class="ml-[110px] justify-center rounded border border-gray-300 px-3 py-2 w-[5rem]" type="text" name="user" value="<?php echo $user_id ?>">
                </div>
                <div class="flex text-center items-center mb-16">
                    <h2>Image URL</h2> 
                    <input class="ml-20 w-[17rem] justify-center rounded border border-gray-300 px-3 py-2" type="text" name="img_url" value="<?php echo $image_url ?>">
                </div>
                <div class="flex justify-center mb-12">
                    <img src="<?php echo $image_url ?>" alt="Restaurant Image" style="width: 400px; height: auto;">
                </div>
                <div class="flex justify-between">
                    <button class="rounded bg-blue-500 text-white px-6 py-2" type="submit">Edit</button>
                    <button class="rounded bg-red-500 text-white px-6 py-2" type="button" onclick="deleteRestaurant()">Delete</button>
                </div>
            </form>
            <form id="deleteForm" action="" method="GET" style="display: none;">
                <input type="hidden" name="act" value="delete">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </form>
        </div>

    </body>
    <script>
        function deleteRestaurant() {
            document.getElementById("deleteForm").submit();
        }
    </script>

    </html>
<?php
} else {
    echo "Restaurant not found";
}
?>