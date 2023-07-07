<?php
require_once(__DIR__ . "/../../controllers/RememberTokenController.php");
require_once(__DIR__ . "/../../controllers/UserController.php");
$rememberTokenController = new RememberTokenController();
if (!$rememberTokenController->isUserLoggedIn()) {
    header("Location: ?mod=auth&act=viewLogin");
}
if ($restaurant) {
    $id = $restaurant['id'];
    $name = $restaurant['name'];
    $description = $restaurant['description'];
    $image_url = $restaurant['img_url'];
    $user_id = $restaurant['user_id'];
    $userController = new UserController();
    $user = $userController->findById($user_id);
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

            .card-user-top {
                display: flex;
                align-items: center;
                margin-bottom: 2px;
            }

            .card-user-name {
                font-weight: 500;
                font-size: 14px;
                line-height: 1;
            }

            .card-user-top ion-icon {
                color: #20e3b2;
                margin-left: 5px;
            }

            .card-user-game {
                color: #999;
                font-weight: 300;
                font-size: 13px;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3.3.0/notyf.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
        <title>Restaurant Detail</title>
    </head>

    <body>

        <div class="flex items-center justify-center h-screen bg-gradient-to-r from-pink-500 via-rose-500 to-orange-400">
            <div class="container mx-auto p-4 bg-white rounded-lg shadow">
                <div class="flex">
                    <div class="w-1/3">
                        <img src="<?php echo $image_url ?>" alt="Restaurant Image" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="w-2/3 flex flex-col justify-between pl-8">
                        <div class="flex flex-col justify-between">
                            <div class="flex justify-between">

                                <h1 class="text-4xl font-bold"><?php echo $name ?></h1>
                                <?php if ($isEditable) : ?>
                                    <div class="flex justify-center">
                                        <a href="?mod=restaurant&act=edit&id=<?php echo $id ?>">
                                            <image src="https://www.freeiconspng.com/thumbs/edit-icon-png/edit-new-icon-22.png" style="width: 30px; align-items: center;" />
                                        </a>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <p class="text-lg mt-4"><?php echo $description ?></p>
                        </div>
                        <div class="card-user-info">
                            <div class="card-user-top">
                                <h4 class="card-user-name"><?php echo $user['name'] ?></h4>
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </div>
                            <div class="card-user-game"><?php echo $user['email'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    echo "Restaurant not found";
}
?>