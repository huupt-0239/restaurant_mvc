<?php
session_start();
include_once("../Model/User.php");
class UserController
{
    public function __invoke()
    {
        if (isset($_POST['login'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $modelUser = new User();
            $user = $modelUser->login($username, $password);
            if ($user != null) {
                
            }
        }
        elseif (isset($_POST['register'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $modelUser = new User();
            $user = $modelUser->register($username, $password);
            if ($user != null) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: ./views/Home.php");
            } else {
                header("Location: ./views/Login.php");
            }
        } else {
            header("Location: ./views/Login.php");
        }
    }
};
$userController = new UserController();
$userController->__invoke();