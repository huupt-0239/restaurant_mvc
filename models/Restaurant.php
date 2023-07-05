<?php
require_once 'DBConnection.php';
require_once 'Entity/E_Restaurant.php';


class Restaurant
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

    public function list()
    {
        $restaurants = array();
        $sql = "SELECT * FROM restaurants";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
            $restaurant = new E_Restaurant($row['id'], $row['name'], $row['description'], $row['img_url'], $row['user_id']);
            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }

    public function store($name, $description, $img_url, $user_id )
    {
        $result = false;
        $sql = "INSERT INTO restaurants(name, description, img_url, user_id) VALUES ('$name', '$description', '$img_url', '$user_id')";
        if ($this->conn->query($sql) === TRUE) {
            $result = true;
        }
        return $result;
    }

    public function detail($id) {
        $data = array();
        $sql = "SELECT * FROM restaurants WHERE id = $id";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
        }
        return $data;
    }

    public function edit($id, $name, $description, $img_url, $user_id) {
        $result = false;
        $sql = "UPDATE restaurants SET name = '$name', description = '$description', img_url = '$img_url', user_id = '$user_id' WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            $result = true;
        }
        return $result;
    }

    public function delete($id) {
        $result = false;
        $sql = "DELETE FROM restaurants WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            $result = true;
        }
        return $result;
    }
}
