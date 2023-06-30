<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
<body>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-12 w-auto" src="https://raw.githubusercontent.com/zhukyu/foodngo/master/src/image/FoodnGo_logo.png" alt="Your Company">
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="../controllers/UserController.php" class="space-y-6" method="post">
                <div class="relative">
                    <input required="" type="text" name="username" id="username" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" ">
                    <label for="username" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Username</label>
                </div>

                <div class="relative">
                    <input required="" type="password" name="password" id="password" class="block focus:border-rose-500 border-2 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-rose-500 peer" placeholder=" ">
                    <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-90 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-rose-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-[0.8] peer-focus:-translate-y-4 left-1">Password</label>
                </div>

                <div>
                    <button type="submit" name="login" class="flex w-full bg-rose-500 hover:bg-rose-400 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="./Register.php" class="font-semibold text-rose-500 hover:text-rose-400 leading-6 text-indigo-600 hover:text-indigo-500">Register Now!</a>
            </p>
        </div>
    </div>




</body>
</html>