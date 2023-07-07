<!DOCTYPE html>
<html lang="en">
<?php
require_once(__DIR__ . "/../../controllers/RememberTokenController.php");
$rememberTokenController = new RememberTokenController();
if (!$rememberTokenController->isUserLoggedIn()) {
    header("Location: ?mod=auth&act=viewLogin");
}
$validate = $_SESSION['validate'] ?? [];
$input = $_SESSION['input'] ?? [];
unset($_SESSION['validate']);
unset($_SESSION['input']);
?>

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

        .error-message {
            color: red;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }

        .input-field {
            position: relative;
        }

        .input-error {
            border-color: red;
        }

        .error-message::before {
            position: absolute;
            left: 0;
        }

        #img {
            width: 260px;
            height: 200px;
            object-fit: cover;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3.3.0/notyf.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <title>Create New Restaurant</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen bg-gradient-to-r from-pink-500 via-rose-500 to-orange-400">
        <form class="w-1/3 bg-white rounded-lg shadow p-8 space-y-6" action="?mod=restaurant&act=store" method="post">
            <h1 class="text-center text-4xl font-bold leading-9 tracking-tight text-gray-900 mb-16">Create Restaurant</h1>
            <div class="input-field">
                <div class="relative">
                    <input type="text" name="name" id="name" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" " value="<?php echo $input['name'] ?? ''; ?>">
                    <label for="name" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-[0.8] top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Restaurant Name</label>
                </div>
                <?php if (isset($validate['name'])) : ?>
                    <p class="text-red-500 text-xs"><?php echo $validate['name']; ?></p>
                <?php endif; ?>
            </div>
            <div class="input-field">
                <div class="relative">
                    <input type="text" name="description" id="description" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" " value="<?php echo $input['description'] ?? ''; ?>">
                    <label for="description" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-[0.8] top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Description</label>
                </div>
                <?php if (isset($validate['description'])) : ?>
                    <p class="text-red-500 text-xs"><?php echo $validate['description']; ?></p>
                <?php endif; ?>
            </div>
            <div class="input-field">
                <div class="relative">
                    <input type="text" name="img_url" id="img_url" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" " value="<?php echo $input['img_url'] ?? ''; ?>">
                    <label for="img_url" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-[0.8] top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Image URL</label>
                </div>
                <?php if (isset($validate['img_url'])) : ?>
                    <p class="text-red-500 text-xs"><?php echo $validate['img_url']; ?></p>
                <?php endif; ?>
            </div>
            <div class="flex justify-center">
                <button class="rounded bg-blue-500 text-white px-6 py-2" type="submit">Save</button>
            </div>
        </form>
    </div>

</html>