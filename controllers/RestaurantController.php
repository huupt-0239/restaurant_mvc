<?php
    require_once(__DIR__.'/../models/Restaurant.php');

    class RestaurantController {
        var $model;

        function __construct() {
            $this->model = new Restaurant();
        }

        function list() {
            $restaurants = $this->model->list();
            require_once('./views/Restaurant/list.php');
        }

        function detail() {
            $restaurants = $this->model->list();
            require_once('./views/Restaurant/deltai.php');
        }

        function store() {
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


        

    }

?>