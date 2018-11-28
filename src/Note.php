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
    private $numViews;
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
            return  $numRows === 1 ? true : false;
        }
        throw new \Exception('A mySQLi error ocurred.');
    }
    
    private function setValues(): void {
        if ($stmt = $this->mysqli->prepare('SELECT author_id, title, description, category, subcategory, text_content, num_views FROM notes WHERE id = ? LIMIT 1')) {
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            $stmt->bind_result($this->author_id, $this->title, $this->description, $this->category, $this->subcategory, $this->textContent, $this->numViews);
            $stmt->fetch();
            $stmt->close();
        } else {
            throw new \Exception('A mySQLi error ocurred.');
        }
    }
    
    private function setValuesArray(): void {
        if ($stmt = $this->mysqli->prepare('SELECT id, author_id, title, description, category, subcategory, text_content, num_views FROM notes WHERE id = ? LIMIT 1')) {
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

