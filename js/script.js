$(document).ready(function() {
    // Selezione del form
    var form = $('#myForm');
    
    // Gestione dell'evento di invio del form
    form.submit(function(event) {
        // Evita il comportamento di default del form (aggiornamento della pagina)
        event.preventDefault();
        
        // Ottieni i dati dal form
        var formData = form.serialize();
        
        // Invia i dati al backend tramite AJAX
        $.ajax({
            type: 'POST', // Metodo HTTP da utilizzare
            url: 'php/backend.php', // URL del tuo script PHP di backend
            data: formData, // Dati da inviare al backend
            // Funziona chiamata in caso di successo
            success: function(response) {
                // Risposta ricevuta dal backend
                console.log(response); // Puoi gestire la risposta del backend qui
                
                // Mostra un messaggio di successo al frontend
                $("#message").text(response);
            },
            // Funzione chiamata in caso di errore
            error: function(xhr, status, error) {
                console.error(error); // Puoi gestire l'errore qui
                // Mostra un messaggio di errore al frontend, se necessario
                $("#message").text("Si e' verificato un errore durante l'invio dei dati.");
            }
        });
    });
});
