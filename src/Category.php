<?php
namespace src;

class Category {

    public function __construct() {
        
    }
    
    public static function getCategories(): array {
        return array('UNI', 'HIGHSCHOOL');
    }
}

