<?php
require_once 'Base.php';

class RememberToken extends Base
{

    public function findUserTokenBySelector(string $selector)
    {
        $data = null;
        $sql = "SELECT id, selector, hashed_validator, user_id, expiry
                FROM user_tokens
                WHERE selector = '$selector' AND
                    expiry >= now()
                LIMIT 1";

        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
        return $data;
    }

    public function delete($user_id)
    {
        $sql = "DELETE FROM user_tokens WHERE user_id = '$user_id'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function store($input)
    {
        $user_id = $input['user_id'];
        $selector = $input['selector'];
        $hashed_validator = $input['hashed_validator'];
        $expiry = $input['expiry'];

        $sql = "INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
                VALUES ('$user_id', '$selector', '$hashed_validator', '$expiry')";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function list()
    {
        $data = array();
        $sql = "SELECT * FROM user_tokens";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function detail($id)
    {
        $data = array();
        $sql = "SELECT * FROM user_tokens WHERE id = '$id'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
        return $data;
    }

    public function edit($id, $input)
    {
    }

    public function findById($id)
    {
    }
}
