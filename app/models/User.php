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
      public function updateUserName($new_userName,$username){
         //conn db
         $db = Database::getInstance()->getConnection();
         $stmt = $db->prepare("UPDATE users SET username=? WHERE username=?");
         $stmt->bind_param("ss",$new_userName,$username);
         return $stmt->execute();
      }
      public function updatePwd($new_pwd,$username){
          //conn db
          $db = Database::getInstance()->getConnection();
          $stmt = $db->prepare("UPDATE users SET password=? WHERE username=?"); 
          $stmt->bind_param('ss',$new_pwd,$username); 
          return $stmt->execute();
      }
       
        }
    
