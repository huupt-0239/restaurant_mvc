<?php
session_start();
require_once("../models/User.php");
class UserController
{
    public function __invoke()
    {
        if (isset($_POST['login'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $userModel = new User();
            $user = $userModel->login($username, $password);
            if ($user != null) {
                $userTmp = [
                    'id' => $user[0]['id'],
                    'username' => $user[0]['username'],
                ];
                $_SESSION['user'] = $userTmp;
                header("Location: ../views/Dashboard.php");
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
        } else {
            header("Location: ../views/Login.php");
        }
    }
};
$userController = new UserController();
$userController->__invoke();
