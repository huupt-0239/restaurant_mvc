<?php
require_once 'DBConnection.php';

class RememberToken
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

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

    public function deleteTokenByUserId(string $user_id): bool
    {
        $sql = "DELETE FROM user_tokens WHERE user_id = '$user_id'";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function insert(int $user_id, string $selector, string $hashed_validator, string $expiry): bool
    {
        $sql = "INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
                VALUES ('$user_id', '$selector', '$hashed_validator', '$expiry')";
        $result = $this->conn->query($sql);

        return $result;
    }
}
