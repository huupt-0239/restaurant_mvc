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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3.3.0/notyf.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <title>Create New Restaurant</title>
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <form class="w-1/3 bg-white rounded shadow p-8" action="?mod=restaurant&act=store" method="post" onsubmit="return validateForm()">
            <h1 class="text-center text-4xl mb-16">Create Restaurant</h1>
            <div class="input-field">
                <h2>Restaurant Name</h2>
                <input id="name" class="ml-[81px] mt-3 justify-center rounded border border-gray-300 w-[17rem] px-3 py-2" type="text" name="name" value="">
                <div id="nameError" class="error-message ml-20 mb-6"></div>
            </div>
            <div class="input-field">
                <h2>Description</h2>
                <input id="description" class="ml-20 mt-3  justify-center rounded border border-gray-300 px-3 w-[17rem] py-2" type="text" name="description" value="">
                <div id="descriptionError" class="error-message mb-6 ml-20"></div>
            </div>
            <div class="input-field">
                <h2>Image URL</h2>
                <input id="img_url" class="ml-20 w-[17rem] mt-3 justify-center rounded border border-gray-300 px-3 py-2" type="text" name="img_url" value="">
                <div id="imgUrlError" class="error-message ml-20 mb-6"></div>
            </div>
            <div class="flex justify-center">
                <button class="rounded bg-blue-500 text-white px-6 py-2" type="submit">Save</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var description = document.getElementById("description").value;
            var img_url = document.getElementById("img_url").value;

            var nameError = document.getElementById("nameError");
            var descriptionError = document.getElementById("descriptionError");
            var imgUrlError = document.getElementById("imgUrlError");

            nameError.textContent = "";
            descriptionError.textContent = "";
            imgUrlError.textContent = "";

            var hasError = false;

            if (name === "") {
                nameError.textContent = "Please enter a restaurant name";
                hasError = true;
                document.getElementById("name").classList.add("input-error");
            } else {
                document.getElementById("name").classList.remove("input-error");
            }

            if (description === "") {
                descriptionError.textContent = "Please enter a description";
                hasError = true;
                document.getElementById("description").classList.add("input-error");
            } else {
                document.getElementById("description").classList.remove("input-error");
            }

            if (img_url === "") {
                imgUrlError.textContent = "Please enter an image URL";
                hasError = true;
                document.getElementById("img_url").classList.add("input-error");
            } else {
                document.getElementById("img_url").classList.remove("input-error");
            }

            if (hasError) {
                return false;
            }

            return true;
        }
    </script>

</html>