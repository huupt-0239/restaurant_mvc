<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("../models/User.php");
require_once("RememberTokenController.php");
class UserController
{
    private $rememberTokenController;

    public function __construct()
    {
        $this->rememberTokenController = new RememberTokenController();
        if ($this->rememberTokenController->isUserLoggedIn()) {
            header("Location: ../views/Dashboard.php");
        }
    }

    public function login()
    {
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
            header("Location: ../views/Login.php");
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
            header("Location: ../controllers/RestaurantController.php?mod=restaurant");
        } else {
            $_SESSION['error'] = "Username or password is incorrect";
            header("Location: ../views/Login.php");
        }
    }

    public function register()
    {
        $input = $_REQUEST;

        // validation
        $validate = [];
        if (empty($input['email'])) {
            $validate['email'] = "Email is required";
        } elseif (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = "Email is invalid";
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
            header("Location: ../views/Register.php");
            return;
        }

        $userModel = new User();
        if ($userModel->isEmailTaken($input['email'])) {
            $_SESSION['error'] = "Email is taken";
            header("Location: ../views/Register.php");
        } else {
            $user = $userModel->register($input['email'], $input['name'], $input['password']);
            if ($user != null) {
                $_SESSION['success'] = "Register successfully";
                header("Location: ../views/Login.php");
            } else {
                $_SESSION['error'] = "Error while registering";
                header("Location: ../views/Register.php");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        if (isset($_COOKIE['remember_token'])) {
            unset($_COOKIE['remember_token']);
            setcookie('remember_token', null, -1, '/', 'localhost');
        }
        header("Location: ../views/Login.php");
    }

    public function __invoke()
    {
        if (isset($_POST['login'])) {
            $this->login();
        } elseif (isset($_POST['register'])) {
            $this->register();
        } elseif (isset($_POST['logout'])) {
            $this->logout();
        } else {
            header("Location: ../views/Login.php");
        }
    }
};
$userController = new UserController();
$userController->__invoke();
