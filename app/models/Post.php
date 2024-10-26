<?php
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


}