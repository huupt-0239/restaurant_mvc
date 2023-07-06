<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mod = isset($_GET['mod'])?$_GET['mod']:'auth';
$act = isset($_GET['act'])?$_GET['act']:'viewLogin';

switch ($mod) {
    case 'auth':
        require_once('controllers/UserController.php');
        $userController = new UserController();
        switch ($act) {
            case 'login':
                $userController->login();
                break;
            case 'logout':
                $userController->logout();
                break;
            case 'register':
                $userController->register();
                break;
            case 'viewLogin':
                $userController->viewLogin();
                break;
            case 'viewRegister':
                $userController->viewRegister();
                break;
            default:
                $userController->viewLogin();
                break;
        }
    break;

    case 'restaurant':
        require_once('controllers/RestaurantController.php');
        $restaurantController = new RestaurantController();
        switch ($act) {
            case 'list':
                $restaurantController->list();
                break;
            case 'detail':
                $restaurantController->detail();
                break;
            case 'store':
                $restaurantController->store();
                break;
            case 'edit':
                $restaurantController->edit();
                break;
            case 'delete':
                $restaurantController->delete();
                break;
            case 'add':
                $restaurantController->add();
                break;
            default:
                $restaurantController->list();
                break;
        }
    break;
}

