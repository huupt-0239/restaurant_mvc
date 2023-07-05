<?php
require_once(__DIR__ . '/../models/Restaurant.php');
require_once(__DIR__ . '/../models/User.php');
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = $user['id'];
    $userName = $user['name'];
}

class RestaurantController
{
    var $model;
    var $user;
    var $user_id;
    var $user_name;

    function __construct()
    {
        $this->model = new Restaurant();
        $this->user = new User();
        if (isset($_SESSION['user'])) {
            $this->user_id = $_SESSION['user']['id'];
            $this->user_name = $_SESSION['user']['name'];
        } else {
            header('Location: ../views/Login.php');
        }
    }

    function list()
    {
        $restaurants = $this->model->list();
        $user_name = $this->user_name;
        require_once(__DIR__ . '/../views/Restaurant/list.php');
    }

    function detail()
    {
        $id = $_GET['id'];
        $restaurant = $this->model->detail($id);
        $user = $this->user->findUserById($restaurant['user_id']);
        require_once('../views/Restaurant/detail.php');
    }

    function store()
    {
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';
        $image_url = isset($_GET['img_url']) ? $_GET['img_url'] : '';
        $status = $this->model->store($name, $description, $image_url, $this->user_id);
        if ($status == true) {
            setcookie('success', 'Thêm mới thành công', time() + 5);
            header('Location: RestaurantController.php?act=list');
        } else {
            setcookie('fail', 'Thêm mới thất bại', time() + 5);
            header('Location: RestaurantController.php?act=add');
        }
    }

    function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';
        $user_id = isset($_GET['user']) ? $_GET['user'] : '';
        $image_url = isset($_GET['img_url']) ? $_GET['img_url'] : '';
        if ($user_id != $this->user_id) {
            setcookie('fail', 'Bạn không có quyền sửa', time() + 5);
            header('Location: RestaurantController.php?act=list');
        } else {

            $restaurant = $this->model->edit($id, $name, $description, $image_url, $user_id);
            if ($restaurant == true) {
                setcookie('success', 'Sửa thành công', time() + 5);
                header('Location: RestaurantController.php?act=list');
            } else {
                setcookie('fail', 'Sửa thất bại', time() + 5);
                header('Location: RestaurantController.php?act=edit&id=' . $id);
            }
        }
    }

    function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $status = $this->model->delete($id, $this->user_id);
        if ($status == true) {
            setcookie('success', 'Xóa thành công', time() + 5);
            header('Location: RestaurantController.php?act=list');
        } else {
            setcookie('fail', 'Xóa thất bại', time() + 5);
            header('Location: RestaurantController.php?act=detail&id=' . $id);
        }
    }

    function add()
    {
        require_once('../views/Restaurant/add.php');
    }

    public function __invoke()
    {
        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                case 'list':
                    $this->list();
                    break;
                case 'detail':
                    $this->detail();
                    break;
                case 'store':
                    $this->store();
                    break;
                case 'edit':
                    $this->edit();
                    break;
                case 'delete':
                    $this->delete();
                    break;
                case 'add':
                    $this->add();
                    break;
                default:
                    $this->list();
                    break;
            }
        } else {
            $this->list();
        }
    }
}
$restaurant_controller = new RestaurantController();
$restaurant_controller->__invoke();
