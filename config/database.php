<?php
class Database {
    private $host = 'localhost:8889';
    private $db_name = 'db_blogy'; 
    private $username = 'root';     
    private $password = 'root';       
    private $conn;

    // Singleton
    private static $instance = null;

    // Costruttore privato per impedire la creazione diretta
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Controlla se la connessione è andata a buon fine
        if ($this->conn->connect_error) {
            die("Connessione fallita: " . $this->conn->connect_error);
        }
    }

    // Metodo statico per ottenere l'istanza del database (singleton)
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Restituisce la connessione MySQLi
    public function getConnection() {
        return $this->conn;
    }
}
