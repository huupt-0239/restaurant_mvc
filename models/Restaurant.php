<?php
require_once 'DBConnection.php';

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
        $data = array();
        $sql = "SELECT * FROM restaurants";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function store($data)
    {
        $result = false;
        $sql = "INSERT INTO restaurants (name, description, img_url, user_id,) 
            VALUES ('" . $data['name'] . "', '" . $data['description'] . "', '" . $data['img_url'] . "', '" . $data['user_id'] ."')";
        if ($this->conn->query($sql) === TRUE) {
            $result = true;
        }
        return $result;
    }
}
