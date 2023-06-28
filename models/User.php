<?php
class User
{
    public function __construct()
    {
    }

    public function find_user_by_username($username)
    {
        require_once('db_connect.php');
        $data = array();
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function login()
    {
        echo "login";
        require_once('db_connect.php');
        $data = array();
        $sql = "SELECT * FROM users ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function register($username, $password)
    {
        require_once('db_connect.php');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        $result = $conn->query($sql);
        return $result;
    }
}
