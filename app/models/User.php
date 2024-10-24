<?php
require_once '../config/database.php';
class User {
    private $id;
    private $username;
    private $password;
    private $db;

        // Costruttore per inizializzare l'oggetto User
        public function __construct($id = null, $username = '',  $password = '') {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
         
        }

        public function findUserByUserName($username){
            //conn db
            $db = Database::getInstance()->getConnection();
            //statement -> prep query dal db
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
            // Collega il parametro (stringa, "s" per il tipo)
            $stmt->bind_param("s", $username);
            //esegue la query
            $stmt->execute();
            //
            $result = $stmt->get_result();
               // Se l'utente è stato trovato, restituisci i dati
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();  // Restituisce l'utente come array associativo
        } else {
            return null;  // Nessun utente trovato
        }
    }
            
        }
