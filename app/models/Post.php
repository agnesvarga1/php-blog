<?php
require_once '../config/database.php';

class Post {
    private $db;
    private $title;
    private $category_id;
    private $content;
       // Costruttore del Model Post
       public function __construct() {
        // Ottieni l'istanza del database (singleton) e memorizzala nella proprietà $db
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function createPost($title, $category_id, $content) {
        $this->title = $title;
        $this->category_id = $category_id;
        $this->content = $content;
    }
    public function save() {
        $stmt = $this->db->prepare("INSERT INTO posts (title, category_id, content, user_id, created_at) VALUES (?, ?, ?, ?, NOW())");

      //accesso al user id dal session
        $user_id = $_SESSION['user_id']; 
        $stmt->bind_param("sisi", $this->title, $this->category_id, $this->content, $user_id);

        // Execute 
        return $stmt->execute();
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
        // Collega il parametro (int, "i" per il tipo)
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

public function findPostById($id){  
    //statement -> prep query dal db
    $stmt =$this->db->prepare("SELECT * FROM posts WHERE id = ?");
    // Collega il parametro (int, "i" per il tipo)
    $stmt->bind_param("i", $id);
    //esegue la query
    $stmt->execute();
    //
    $result = $stmt->get_result();
       // Se l'utente è stato trovato, restituisci i dati
if ($result->num_rows > 0) {
    return $result->fetch_assoc(); //restitusce un  post;
} else {
    return [];  
}
}
        
    }
    


