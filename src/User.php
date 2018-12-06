<?php
namespace src;

class User {

    const SESSION_NAME = 'user_id';
    private $mysqli;
    private $id;
    private $email;
    private $values;
    
    public function __construct($mysqli, int $id = -1, string $email = '') {
        $this->mysqli = $mysqli;
        $this->id = $id;
        $this->email = $email;
        $this->setValuesArray();
    }
    
    private function setValuesArray(): void {
        if ($stmt = $this->mysqli->prepare('SELECT id, name, email, password, account_created, membership FROM people WHERE id = ? OR email = ? LIMIT 1')) {
            $stmt->bind_param('is', $this->id, $this->email);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->values = $result->fetch_array(MYSQLI_ASSOC);
            $result->free();
            $stmt->close();
        } else {
            throw new \Exception('A mySQLi error ocurred.');
        }
    }
    
    public function exists(): bool {
        if ($stmt = $this->mysqli->prepare('SELECT email FROM people WHERE id = ? OR email = ?')) {
            $stmt->bind_param('is', $this->id, $this->email);
            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->num_rows;
            $stmt->close();
            return  $numRows === 1;
        }
        throw new \Exception('A mySQLi error ocurred.');
    }
    
    public function getValuesArray(): array {
        return $this->values;
    }
    
    public function destroySession(): void {
        unset($_SESSION[self::SESSION_NAME]);
    }
    
    public static function register($mysqli, string $name, string $email, string $password): self {
        if ($stmt = $mysqli->prepare('INSERT INTO people (name, email, password, account_created) VALUES (?, ?, ?, NOW())')) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $name, $email, $password);
            $stmt->execute();
            $obj = new User($mysqli, $stmt->insert_id);
            $stmt->close();
            return $obj;
        }
        throw new \Exception('A mySQLi error ocurred.');
    }
    
    public static function isLogged(): bool {
        return isset($_SESSION[self::SESSION_NAME]);
    }
    
    public static function createSession(int $id): void {
        $_SESSION[self::SESSION_NAME] = $id;
    }
}

