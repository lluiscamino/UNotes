<?php
namespace src;

class UserRegistration {

    private $mysqli;
    private $name;
    private $email;
    private $password;
    private $repassword;
    private $captchaCode;
    private $captchaSessionVar;
    
    public function __construct($mysqli, string $name, string $email, string $password, string $repassword, string $captchaCode, string $captchaSessionVar) {
        $this->mysqli = $mysqli;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->captchaCode = $captchaCode;
        $this->captchaSessionVar = $captchaSessionVar;
    }
    
    private function checkName(): bool {
        return strlen($this->name) <= 100 && $this->name !== '';
    }
    
    private function checkEmail(): bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
    
    private function checkUniqueEmail(): bool {
        $user = new User($this->mysqli, -1, $this->email);
        return !$user->exists();
    }
    
    private function checkPassword(): bool {
        return $this->password === $this->repassword && $this->password !== '';
    }
    
    private function checkCaptcha(): bool {
        return $this->captchaCode === $this->captchaSessionVar;
    }
    
    public function check(): bool {
        return $this->checkName() && $this->checkEmail() && $this->checkUniqueEmail() && $this->checkPassword() && $this->checkCaptcha();
    }
    
    public function errors(): array {
        $errors = array();
        if (!$this->checkName()) {
            $errors[] = 'NAME';
        }
        if (!$this->checkEmail()) {
            $errors[] = 'EMAIL';
        }
        if (!$this->checkUniqueEmail()) {
            $errors[] = 'UNIQUE_EMAIL';
        }
        if (!$this->checkPassword()) {
            $errors[] = 'PASSWORD';
        }
        if (!$this->checkCaptcha()) {
            $errors[] = 'CAPTCHA';
        }
        return $errors;
    }
}

