<!DOCTYPE html>
<html lang="en">
<?php
require_once(__DIR__ . "/../controllers/RememberTokenController.php");
$rememberTokenController = new RememberTokenController();
if($rememberTokenController->isUserLoggedIn()){
    header("Location: ?mod=restaurant&act=list");
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
    <title>Document</title>
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
    <div class="flex min-h-screen min-w-full flex-col justify-center px-6 py-12 lg:px-8 justify-center items-center bg-gradient-to-r from-pink-500 via-rose-500 to-orange-400">
        <div class="bg-white max-w-md p-6 rounded-lg shadow-md w-full">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-12 w-auto" src="https://raw.githubusercontent.com/zhukyu/foodngo/master/src/image/FoodnGo_logo.png" alt="Your Company">
                <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form action="?mod=auth&act=login" class="space-y-6" method="post">
                <div>
                        <div class="relative">
                            <input type="text" name="email" id="email" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" " value="<?php echo $input['email'] ?? ''; ?>">
                            <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-[0.8] top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Email</label>
                        </div>
                        <?php if (isset($validate['email'])) : ?>
                            <p class="text-red-500 text-xs"><?php echo $validate['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="relative">
                            <input type="password" name="password" id="password" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" " value="<?php echo $input['password'] ?? ''; ?>">
                            <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-[0.8] top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Password</label>
                        </div>
                        <?php if (isset($validate['password'])) : ?>
                            <p class="text-red-500 text-xs"><?php echo $validate['password']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" name="remember" value="remember" class="w-4 h-4 text-rose-500 bg-gray-100 border-gray-300 rounded focus:ring-rose-500 focus:ring-2">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 ">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="font-semibold text-sm text-rose-500 hover:text-rose-400 leading-6 text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                    <div>
                        <button type="submit" name="login" class="flex w-full bg-rose-500 hover:bg-rose-400 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Not a member?
                    <a href="?mod=auth&act=viewRegister" class="font-semibold text-rose-500 hover:text-rose-400 leading-6 text-indigo-600 hover:text-indigo-500">Register Now!</a>
                </p>
            </div>
        </div>
    </div>
    
    <script>
        const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
        });
        // Check if there is an error message in the session
        <?php if (isset($_SESSION['error'])) : ?>
            notyf.error('<?php echo $_SESSION['error']; ?>');
            <?php unset($_SESSION['error']);
            ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            notyf.success('<?php echo $_SESSION['success']; ?>');
            <?php unset($_SESSION['success']);
            ?>
        <?php endif; ?>
    </script>
</body>

</html>