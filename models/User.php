<?php
require_once 'DBConnection.php';

class User
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }


    public function findUserByUsername($username)
    {
        $data = array();
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
        return $data;
    }

    public function isUsernameTaken($username)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['COUNT(*)'] > 0;
    }

    public function findUserByToken(string $token)
    {
        $sql = "SELECT users.id, users.username, users.password
                FROM users
                INNER JOIN user_tokens
                ON users.id = user_tokens.user_id
                WHERE user_tokens.selector = '$token' AND
                    user_tokens.expiry >= now()
                LIMIT 1";

        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
        return $data;
    }

    public function findUserById($id)
    {
        $data = array();
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
        return $data;
    }

    public function login($username, $password)
    {
        $data = array();
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $data = $row;
            }
        }
        return $data;
    }

    public function register($username, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        $result = $this->conn->query($sql);
        return $result;
    }
}
