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
        if($this->rememberTokenController->isUserLoggedIn()) {
            header("Location: ../views/Dashboard.php");
        }
    }

    public function __invoke()
    {
        if (isset($_POST['login'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $userModel = new User();
            $user = $userModel->login($username, $password);
            if ($user != null) {
                $userTmp = [
                    'id' => $user['id'],
                    'username' => $user['username'],
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
                header("Location: ../views/Dashboard.php");
            } else {
                $_SESSION['error'] = "Username or password is incorrect";
                header("Location: ../views/Login.php");
            }
        } elseif (isset($_POST['register'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $userModel = new User();
            if ($userModel->isUsernameTaken($username)) {
                $_SESSION['error'] = "Username is taken";
                header("Location: ../views/Register.php");
            } else {
                $user = $userModel->register($username, $password);
                if ($user != null) {
                    header("Location: ../views/Login.php");
                } else {
                    $_SESSION['error'] = "Username is taken";
                    header("Location: ../views/Register.php");
                }
            }
        } elseif (isset($_POST['logout'])) {
            session_destroy();
            if (isset($_COOKIE['remember_token'])) {
                unset($_COOKIE['remember_token']);
                setcookie('remember_token', null, -1, '/', 'localhost');
            }
            header("Location: ../views/Login.php");
        } else {
            header("Location: ../views/Login.php");
        }
    }
};
$userController = new UserController();
$userController->__invoke();
