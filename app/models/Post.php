<?php
require_once '../config/database.php';

class Post {
    private $db;
    
       // Costruttore del Model Post
       public function __construct() {
        // Ottieni l'istanza del database (singleton) e memorizzala nella proprietà $db
        $this->db = Database::getInstance()->getConnection();
      
    }

    // Funzione per ottenere tutti i post
    public function getAllPosts() {
      
        $query = "SELECT * FROM posts";
        $result = $this->db->query($query);  // Esegui la query

        // Verifica se ci sono risultati
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);  // Ritorna tutti i risultati come array associativo
        } else {
            return [];
        }
    }
    public function findPostByUserId($userid){  
        //statement -> prep query dal db
        $stmt =$this->db->prepare("SELECT * FROM posts WHERE user_id = ?");
        // Collega il parametro (stringa, "s" per il tipo)
        $stmt->bind_param("i", $userid);
        //esegue la query
        $stmt->execute();
        //
        $result = $stmt->get_result();
           // Se l'utente è stato trovato, restituisci i dati
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC); //restitusce user's posts all of them;
    } else {
        return [];  
    }
}
        
    }
    


