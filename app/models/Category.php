<?php
class Category{

    private $db;
    

    public function __construct() {
     // Ottieni l'istanza del database (singleton) e memorizzala nella proprietà $db
     $this->db = Database::getInstance()->getConnection();
   
 }

 public function findCategoryById($id) {
    $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
    // Collega il parametro (stringa, "s" per il tipo)
    $stmt->bind_param("i", $id);
    //esegue la query
    $stmt->execute();
    //
    $result = $stmt->get_result();
       // Se cat è stato trovato, restituisci i dati
if ($result->num_rows > 0) {
    return $result->fetch_assoc();  // Restituisce il categry come array associativo SOLO uno
} else {
    return null;  // Nessun trovato
}
 }
}