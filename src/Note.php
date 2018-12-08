<?php
namespace src;

class Note {
    
    private $mysqli;
    private $id;
    private $authorId;
    private $title;
    private $description;
    private $category;
    private $subcategory;
    private $textContent;
    private $numFiles;
    private $numViews;
    private $creationDate;
    private $values;

    public function __construct($mysqli, int $id) {
        $this->mysqli = $mysqli;
        $this->id = $id;
        if ($this->exists()) {
            $this->setValues();
            $this->setValuesArray();
        } else {
            throw new \Exception('The selected note does not exist.');
        }
    }
    
    private function exists(): bool {
        if ($stmt = $this->mysqli->prepare('SELECT id FROM notes WHERE id = ?')) {
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->num_rows;
            $stmt->close();
            return  $numRows === 1;
        }
        throw new \Exception('A mySQLi error ocurred.');
    }
    
    private function setValues(): void {
        if ($stmt = $this->mysqli->prepare('SELECT author_id, title, description, category, subcategory, text_content, num_views, num_files, creation_date FROM notes WHERE id = ? LIMIT 1')) {
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            $stmt->bind_result($this->authorId, $this->title, $this->description, $this->category, $this->subcategory, $this->textContent, $this->numViews, $this->numFiles, $this->creationDate);
            $stmt->fetch();
            $stmt->close();
        } else {
            throw new \Exception('A mySQLi error ocurred.');
        }
    }
    
    private function setValuesArray(): void {
        if ($stmt = $this->mysqli->prepare('SELECT id, author_id, title, description, category, subcategory, text_content, num_views, num_files, creation_date FROM notes WHERE id = ? LIMIT 1')) {
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->values = $result->fetch_array(MYSQLI_ASSOC);
            $result->free();
            $stmt->close();
        } else {
            throw new \Exception('A mySQLi error ocurred.');
        }
    }
    
    public static function getNotesByUser($mysqli, int $userId) {
        if ($stmt = $mysqli->prepare('SELECT id, title, description, text_content, num_views, num_files, category, subcategory, creation_date FROM notes WHERE author_id = ?')) {
            $array = array();
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            $stmt->close();
            return $array;
        }
        throw new \Exception('A mySQLi error ocurred.');
    }
    
    public static function upload($mysqli, string $title, string $description, string $textContent, int $authorId, int $numFiles, int $category, string $subcategory): self {
        if ($stmt = $mysqli->prepare('INSERT INTO notes (title, description, text_content, author_id, num_files, category, subcategory, creation_date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())')) {
            require './vendor/erusev/parsedown/Parsedown.php';
            $parsedown = new \Parsedown();
            $parsedown->setSafeMode(true);
            $parsedown->setMarkupEscaped(true);
            $stmt->bind_param('sssssss', $title, $description, $parsedown->text($textContent), $authorId, $numFiles, $category, $subcategory);
            $stmt->execute();
            $obj = new Note($mysqli, $stmt->insert_id);
            $stmt->close();
            return $obj;
         }
         throw new \Exception('A mySQLi error ocurred.');
    }
    
    public function addView(): bool {
        if ($stmt = $this->mysqli->prepare('UPDATE notes SET num_views = ? WHERE id = ?')) {
            $this->numViews++;
            $stmt->bind_param('ii', $this->numViews, $this->id);
            $status = $stmt->execute();
            $stmt->close();
            return $status;
        } else {
            throw new \Exception('A mySQLi error ocurred.');
        }
    }
    
    public function getValueArray(): array {
        return $this->values;
    }
}

