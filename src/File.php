<?php
namespace src;

class File {
    
    private $mysqli;
    private $id;

    public function __construct($mysqli, int $id) {
        $this->id = $id;
        if ($this->exists()) {
            $this->mysqli = $mysqli;
        } else {
            throw new \Exception('The selected file does not exist.');
        }
    }
    
    private function exists(): bool {
        if ($stmt = $this->mysqli->prepare('SELECT id FROM files WHERE id = ?')) {
            $stmt->bind_param('i', $this->id);
            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->num_rows;
            $stmt->close();
            return  $numRows === 1 ? true : false;
        }
        throw new \Exception('A mySQLi error ocurred.');
    }
    
    public static function noteFiles($mysqli, int $noteId): array {
        $note = new Note($mysqli, $noteId);
        if ($stmt = $mysqli->prepare('SELECT id, note_id, file_name, extension, url FROM files WHERE note_id = ?')) {
            $array = array();
            $stmt->bind_param('i', $noteId);
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
}

