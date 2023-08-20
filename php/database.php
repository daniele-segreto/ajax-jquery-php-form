<?php
// Connetti al database (cambia i parametri con le tue credenziali)
$host = 'localhost'; // Indirizzo del server MySQL
$username = 'root'; // Nome utente del database
$password = ''; // Password del database
$dbname = 'user_management_3'; // Nome del database

try {
    // Crea una nuova connessione PDO al database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Imposta l'attributo ERRMODE su EXCEPTION per gestire le eccezioni
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Se si verifica un errore durante la connessione al database, cattura l'eccezione e mostra un messaggio di errore
    echo "Errore di connessione al database: " . $e->getMessage();

    // Esci dallo script per interrompere l'esecuzione
    exit;
}
?>
