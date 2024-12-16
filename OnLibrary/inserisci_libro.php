<?php
    include("connessione.php");
    session_start();

    if(!isset($_SESSION['nome_utente'])){
        header("Location: login.php");
        exit();
    }

    //Solo l'amministratore può aggiungere un libro nel catalogo
    if($_SESSION['amministratore'] != 1){
        session_destroy();
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Biblioteca online, prenotazioni, libri" />
        <meta name="description" content="OnLibrary, la tua biblioteca online" />
        <meta name="author" content="Giulia Abate" />
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>OnLibrary</title>
    </head>
    <body>
        <?php include("includes/header.php"); ?> <!--Menu di navigazione-->

        <div class="modulo2">
        <h2>Inserisci un libro</h2>

        <form action="aggiunta_libro.php" method='POST'>

            <label for="titolo">Titolo:</label>
            <input type="text" id="titolo" name="titolo" >
            
            <br><br>
            
            <label for="autore">Autore:</label>
            <input type="text" id="autore" name="autore" >
            
            <br><br>

            <label for="data">Data:</label>
            <input type="text" id="data" name="data" >

            <br><br>

            <label for="genere">Genere:</label>
            <input type="text" id="genere" name="genere" >

            <br><br>

            <label for="descrizione">Descrizione:</label>
            <textarea name="descrizione" id="descrizione"></textarea>

            <br><br>

            <label for="disponibilità">Disponibilità:</label>
            <input type="text" id="disponibilità" name="disponibilità">

            <br><br>

            <input type="submit" class="button2" value="Aggiungi">
        </form>

        <br><br>
        <a href='profilo_amministratore.php' class="button2"> Torna al profilo </a>
        </div>
    </body>
</html>
