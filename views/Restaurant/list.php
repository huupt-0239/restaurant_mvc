<?php
require_once(__DIR__ . '/../../models/Restaurant.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodnGo</title>
    <link rel="stylesheet" href="../views/Restaurant/main.css">
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

<body>
    <div class="header h-24 w-auto bg-[#f5f5f5] text-xl">
        <div class="navbar float-right mt-8 mr-12 text-center flex">
            <a class="mr-12" href="">Home</a>
            <a class="mr-12" href="">About</a>
            <a class="flex items-center mr-12" href="">
                <img class="user-infor w-8 h-8 mr-2" src="../public/img/user.png" alt="img_user">
                <span class="user-name">Van Tanh Ly</span>
            </a>


        </div>
    </div>


    <div class="cards">
        <?php foreach ($restaurants as $restaurant) {
        ?>
            <div class="card">
                <a href="?act=detail&id=<?php echo $restaurant->id ?>">
                    <img src=<?php echo $restaurant->img_url ?> alt="" class="card-image" />
                    <div class="card-content">
                        <div class="card-top">
                            <h3 class="card-title"><?php echo $restaurant->name ?></h3>
                            <div class="card-user">
                                <img src="../public/img/user.png" alt="" class="card-user-avatar" />
                                <div class="card-user-info">
                                    <div class="card-user-top">
                                        <h4 class="card-user-name">User ID: <?php echo $restaurant->user_id ?></h4>
                                        <ion-icon name="checkmark-circle"></ion-icon>
                                    </div>
                                    <div class="card-user-game">Call of duty</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="card-live">
                                <ion-icon name="wifi"></ion-icon>
                                <span>Live</span>
                            </div>
                            <div class="card-watching">
                                <ion-icon name="eye"></ion-icon>
                                <span>1.2k watching</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
    <footer class="flex h-40 w-auto bg-slate-50 text-center items-center justify-center">
        <p class="mt-12">Copyright 2023 FoodnGo with love ❤️</p>
    </footer>
</body>

</html>