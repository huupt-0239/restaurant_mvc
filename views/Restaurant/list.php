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
    <link rel="stylesheet" href="views/Restaurant/main.css">
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
        <div class="navbar float-right mt-8 mr-12 text-center flex items-center">
            <a class="mr-48" href="?mod=restaurant&act=add">
                <button class="rounded bg-blue-500 text-white px-4 py-2">+ Create</button>
            </a>
            <a class="mr-12" href="">Home</a>
            <a class="mr-12" href="">About</a>
            <div class="dropdown relative">
                <div class="flex items-center" onclick="toggleDropdown()" style="cursor:pointer">
                    <img class="user-infor w-8 h-8 mr-2" src="public/img/user.png" alt="img_user">
                    <span class="user-name"><?php echo $user_name ?></span>
                </div>
                <div id="dropdownMenu" class="dropdown-menu hidden absolute right-0 mt-2 bg-white rounded-md shadow-lg py-2 z-10">
                    <a href="?mod=auth&act=logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="cards">
        <?php foreach ($restaurants as $restaurant) {
        ?>
            <div class="card">
                <a href="?mod=restaurant&act=detail&id=<?php echo $restaurant->id ?>">
                    <img src=<?php echo $restaurant->img_url ?> alt="" class="card-image" />
                    <div class="card-content">
                        <div class="card-top">
                            <h3 class="card-title"><?php echo $restaurant->name ?></h3>
                        </div>
                        <div class="card-bottom">
                            <div class="card-user">
                                <img src="public/img/user.png" alt="" class="card-user-avatar" />
                                <div class="card-user-info">
                                    <div class="card-user-top">
                                        <h4 class="card-user-name">User ID: <?php echo $restaurant->user_id ?></h4>
                                        <ion-icon name="checkmark-circle"></ion-icon>
                                    </div>
                                </div>
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
    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("hidden");
        }

        <?php if (isset($_SESSION['success'])) : ?>
            const notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
            });
            notyf.success("<?php echo $_SESSION['success']; ?>");
            unset($_SESSION['success']);
        <?php endif; ?>

        <?php if (isset($_SESSION['fail'])) : ?>
            const failNotyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top',
                },
            });
            failNotyf.error("<?php echo $_SESSION['fail']; ?>");
            unset($_SESSION['fail']);
        <?php endif; ?>
    </script>
</body>

</html>