<?php
require_once(__DIR__.'/../models/Restaurant.php');
require_once(__DIR__.'/../models/User.php');

class RestaurantController
{
    var $model;
    var $user;

    function __construct()
    {
        $this->model = new Restaurant();
        $this->user = new User();
    }

    function list()
    {
        $restaurants = $this->model->list();
        require_once(__DIR__ . '/../views/Restaurant/list.php');
    }

    function detail()
    {
        $id = $_GET['id'];
        $restaurant = $this->model->detail($id);
        require_once('../views/Restaurant/detail.php');
    }

    function store()
    {
        $data = $_POST;
        $status = $this->model->store($data);
        if ($status == true) {
            setcookie('success', 'Thêm mới thành công', time() + 5);
            header('Location: index.php?mod=restaurant&act=list');
        } else {
            setcookie('fail', 'Thêm mới thất bại', time() + 5);
            header('Location: index.php?mod=restaurant&act=add');
        }
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
                default:
                    $this->list();
                    break;
            }
        }else {
            $this->list();
        }
    }
}
$restaurant_controller = new RestaurantController();
$restaurant_controller->__invoke();
