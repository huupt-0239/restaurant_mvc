<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/RememberTokenController.php");
class UserController
{
    private $rememberTokenController;

    public function __construct()
    {
        $this->rememberTokenController = new RememberTokenController();
        if ($this->rememberTokenController->isUserLoggedIn()) {
            header("Location: ?mod=restaurant&act=list");
        }
    }

    public function login()
    {
        echo "Login";   
        $input = $_REQUEST;

        // validation
        $validate = [];
        if (empty($input['email'])) {
            $validate['email'] = "Email is required";
        } elseif (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = "Email is invalid";
        }
        if (empty($input['password'])) {
            $validate['password'] = "Password is required";
        }
        if (!empty($validate)) {
            $_SESSION['validate'] = $validate;
            $_SESSION['input'] = $input;
            header("Location: index.php?mod=auth&act=login");
            return;
        }


        $userModel = new User();
        $user = $userModel->login($input['email'], $input['password']);
        if ($user != null) {
            $userTmp = [
                'id' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name'],
            ];
            $_SESSION['user'] = $userTmp;
            if (isset($_REQUEST['remember'])) {
                $this->rememberTokenController->rememberMe($user['id']);
            } else {
                if (isset($_COOKIE['remember_token'])) {
                    unset($_COOKIE['remember_token']);
                    setcookie('remember_token', null, -1, '/', 'localhost');
                }
            }
            header("Location: ?mod=restaurant&act=list");
        } else {
            $_SESSION['error'] = "Username or password is incorrect";
            $_SESSION['input'] = $input;
            header("Location: ?mod=auth&act=login");
        }
    }

    public function register()
    {
        $input = $_REQUEST;

        $userModel = new User();

        // validation
        $validate = [];
        if (empty($input['email'])) {
            $validate['email'] = "Email is required";
        } elseif (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = "Email is invalid";
        } elseif ($userModel->isEmailTaken($input['email'])) {
            $validate['email'] = "Email already exists";
        }
        if (empty($input['name'])) {
            $validate['name'] = "Name is required";
        }
        if (empty($input['password'])) {
            $validate['password'] = "Password is required";
        } elseif (strlen($input['password']) < 6) {
            $validate['password'] = "Password must be at least 6 characters";
        }
        if (empty($input['confirm_password'])) {
            $validate['confirm_password'] = "Confirm password is required";
        } elseif ($input['password'] != $input['confirm_password']) {
            $validate['confirm_password'] = "Confirm password is not match";
        }
        if (!empty($validate)) {
            $_SESSION['validate'] = $validate;
            $_SESSION['input'] = $input;
            header("Location: ?mod=auth&act=viewRegister");
            return;
        }

        $user = $userModel->store($input);
        if ($user != null) {
            $_SESSION['success'] = "Register successfully";
            header("Location: ?mod=auth&act=viewLogin");
        } else {
            $_SESSION['error'] = "Error while registering";
            header("Location: ?mod=auth&act=viewRegister");
        }
    }

    public function logout()
    {
        session_destroy();
        if (isset($_COOKIE['remember_token'])) {
            unset($_COOKIE['remember_token']);
            setcookie('remember_token', null, -1, '/', 'localhost');
        }
        header("Location: ?mod=auth&act=viewLogin");
    }

    public function viewLogin() {
        require_once(__DIR__ . "/../views/Login.php");
    }

    public function viewRegister() {
        require_once(__DIR__ . "/../views/Register.php");
    }
};
