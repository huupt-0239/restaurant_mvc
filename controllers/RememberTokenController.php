<?php
require_once(__DIR__ . "/../models/RememberToken.php");
require_once(__DIR__ . "/../models/User.php");

class RememberTokenController
{
    public function generateTokens(): array
    {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));

        return [$selector, $validator, $selector . ':' . $validator];
    }

    public function parse_token(string $token): ?array
    {
        $parts = explode(':', $token);

        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }

    public function isValidToken(string $token)
    {
        $parts = $this->parse_token($token);
        if ($parts) {
            $selector = $parts[0];
            $validator = $parts[1];
            $rememberTokenModel = new RememberToken();
            $userToken = $rememberTokenModel->findUserTokenBySelector($selector);
            if ($userToken) {
                if (password_verify($validator, $userToken['hashed_validator'])) {
                    return $userToken;
                }
            }
        }
        return false;
    }

    public function rememberMe(int $user_id, int $day = 30)
    {
        list($selector, $validator, $token) = $this->generateTokens();
        $hashed_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expired_seconds = time() + 60 * 60 * 24 * $day;
        $expiry = date('Y-m-d H:i:s', $expired_seconds);
        $rememberTokenModel = new RememberToken();
        $rememberTokenModel->deleteTokenByUserId($user_id);
        if($rememberTokenModel->insert($user_id, $selector, $hashed_validator, $expiry)) {
            setcookie('remember_token', $token, $expired_seconds, '/', 'localhost');
        }
    }

    public function isUserLoggedIn(): bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        } elseif (isset($_COOKIE['remember_token'])) { // check cookie
            $token = $_COOKIE['remember_token'];
            $userToken = $this->isValidToken($token);
            if ($userToken) {
                $userModel = new User();
                $user = $userModel->findUserById($userToken['user_id']);
                if ($user) {
                    $userTmp = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'name' => $user['name'],
                    ];
                    $_SESSION['user'] = $userTmp;
                    return true;
                }
            }
        }
        return false;
    }
};
