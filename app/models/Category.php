<?php
class Category{

    private $db;
    

    public function __construct() {
     // Ottieni l'istanza del database (singleton) e memorizzala nella proprietà $db
     $this->db = Database::getInstance()->getConnection();
   
 }

 public function getCategoryNames() {
    $stmt = $this->db->prepare("SELECT id, name FROM categories");
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = [];
    
    while ($row = $result->fetch_assoc()) {
        $categories[$row['id']] = $row['name'];
    }
    
    return $categories; // Returns an associative array: [category_id => category_name, ...]
}
}