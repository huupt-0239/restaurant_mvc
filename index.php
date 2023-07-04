<?php
session_start();
// header("Location: ./controllers/UserController.php");
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'restaurant';
$act = isset($_GET['act']) ? $_GET['act'] : 'list';

switch ($mod) {
    case 'restaurant':
        require_once(__DIR__ . './controllers/RestaurantController.php');
        $restaurant_controller = new RestaurantController();

        switch ($act) {
            case 'list':
                $restaurant_controller->list();
                break;
            case 'add':
                $restaurant_controller->store();
                break;
            case 'detail':
                $restaurant_controller->detail();
                break;
            case 'update':
                $customer_controller->update();
                break;
            case 'delete':
                $customer_controller->delete();
                break;
            default:
                $restaurant_controller->list();
                break;
        }
        break;
}
