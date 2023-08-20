<?php
// Includi il file database.php per la connessione al database
require_once 'database.php';

// Ricevi i dati dal form tramite AJAX
$nome = $_POST['nome']; // Ricevi il valore del campo "nome" inviato tramite POST
$cognome = $_POST['cognome']; // Ricevi il valore del campo "cognome" inviato tramite POST
$email = $_POST['email']; // Ricevi il valore del campo "email" inviato tramite POST

// Inserisci i dati nel database
try {
    // Prepara una query SQL con marcatori di posizione
    $stmt = $conn->prepare("INSERT INTO utenti (nome, cognome, email) VALUES (:nome, :cognome, :email)");

    // Associa i valori ai marcatori di posizione nella query preparata
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cognome', $cognome);
    $stmt->bindParam(':email', $email);

    // Esegui la query preparata per inserire i dati nel database
    $stmt->execute();

    // Se la query ha avuto successo, invia una risposta di successo al frontend
    echo "Dati inseriti nel database con successo!";
} catch(PDOException $e) {
    // Se si verifica un'eccezione (errore) durante l'esecuzione della query, mostra un messaggio di errore
    echo "Errore nell'inserimento dei dati nel database: " . $e->getMessage();
}
?>
