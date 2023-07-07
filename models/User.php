<?php
require_once 'Base.php';

class User extends Base
{

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

    public function isEmailTaken($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['COUNT(*)'] > 0;
    }

    public function findUserByToken(string $token)
    {
        $sql = "SELECT users.id, users.email, users.name, users.password
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

    public function findById($id)
    {
        $data = array();
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
        return $data;
    }

    public function login($email, $password)
    {
        $data = array();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $data = $row;
            }
        }
        return $data;
    }

    public function store($data)
    {
        $email = $data['email'];
        $name = $data['name'];
        $password = $data['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$hashed_password');";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function edit($id, $data)
    {
        $name = $data['name'];
        $password = $data['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET name = '$name', password = '$hashed_password' WHERE id = '$id'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($user_id)
    {
        $sql = "DELETE FROM users WHERE id = '$user_id'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function list()
    {
        $data = array();
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }
}
