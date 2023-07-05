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
        <form class="ml-12 mr-12 mt-1 mb-12 flex flex-col" action="" method="get">
            <input type="hidden" name="act" value="edit">
            <h1 class="text-center text-4xl mb-12">Restaurant Detail</h1>
            <div class="flex text-center items-center mb-12">
                <h2>ID</h2>
                <input class="ml-16 justify-center rounded" type="text" name="id" value="<?php echo $id ?> ">
            </div>
            <div class="flex text-center items-center mb-12">
                <h2>Restaurant Name</h2>
                <input class="ml-16 justify-center rounded" type="text" name="name" value="<?php echo $name ?> ">
            </div>
            <div class="flex text-center items-center mb-12">
                <h2>Description</h2>
                <input class=" px-12 ml-16 justify-center" type="text" name="description" value="<?php echo $description; ?>">
            </div>
            <div class="flex text-center items-center mb-12">
                <h2>User ID</h2>
                <input class="px-12 ml-16 justify-center" type="text" name="user" value="<?php echo $user_id; ?>">
            </div>
            <div class="flex text-center items-center mb-12">
                <h2>Image URL</h2>
                <input type="input" name="img_url" value="<?php echo $image_url ?>">
            </div>
            <img src="<?php echo $image_url; ?>" alt="Restaurant Image">
            <input class="px-12 ml-16 justify-center" type="submit" value="Edit">
        </form>

        <form action="" method="GET">
            <input type="hidden" name="act" value="delete">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Delete">
        </form>
    </body>

    </html>
<?php
} else {
    echo "Restaurant not found";
}
?>