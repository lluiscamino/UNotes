<?php
namespace src;

class UserConnection {
    
    private $mysqli;
    private $email;
    private $password;
    private $user;

    public function __construct($mysqli, string $email, string $password) {
        $this->mysqli = $mysqli;
        $this->email = $email;
        $this->password = $password;
        $this->user = new User($mysqli, -1, $this->email);
    }
    
    private function userExistsByEmail(): bool {
        return $this->user->exists();
    }
    
    private function correctPassword(): bool {
        return password_verify($this->password, $this->user->getValuesArray()['password']);
    }
    
    public function check(): bool {
        return $this->userExistsByEmail() && $this->correctPassword();
    }
}

