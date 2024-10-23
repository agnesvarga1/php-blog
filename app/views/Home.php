<?php
// Include la classe Database per la connessione
require_once '../../config/database.php';

// Ottieni l'istanza del database
$db = Database::getInstance()->getConnection();

// Esegui una query per ottenere i post
$query = "SELECT * FROM posts";
$result = $db->query($query);

// Controlla se ci sono risultati
if ($result->num_rows > 0) {
    // Cicla attraverso i risultati e visualizza i post
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Nessun post trovato.";
}
?>
<div class="container">
    <h1>Benvenuti nel Blog</h1>
   
</div>