<?php

    include("connessione.php");
    session_start();

    if(!isset($_SESSION['nome_utente'])){
        header("Location: login.php");
    }

    if($_SESSION['amministratore']!=1){
        session_destroy();
        header("Location: login.php");
    }

    //Se non si compila il form e non si inseriscono dati, si viene riportati al form
    if(!isset($_POST['titolo']) || !isset($_POST['autore']) || !isset($_POST['data']) || !isset($_POST['genere']) || !isset($_POST['descrizione']) || !isset($_POST['disponibilità'])
    ||empty($_POST['titolo']) || empty($_POST['autore']) || empty($_POST['data']) || empty($_POST['genere']) || empty($_POST['descrizione']) || empty($_POST['disponibilità'])
    ){
        header("Location: inserisci_libro.php"); 
        exit();
    }

    //Si salvano nelle variabili i parametri dei libri
    $titolo = mysqli_real_escape_string($connessione,$_POST["titolo"]);
    $autore = mysqli_real_escape_string($connessione,$_POST["autore"]);
    $data = mysqli_real_escape_string($connessione,$_POST["data"]);
    $genere = mysqli_real_escape_string($connessione,$_POST["genere"]);
    $descrizione = mysqli_real_escape_string($connessione,$_POST["descrizione"]);
    $disponibilità = mysqli_real_escape_string($connessione,$_POST["disponibilità"]);

    //si inseriscono nel database
    $sql="INSERT INTO servizi (titolo, autore, data, genere, descrizione, disponibilità)
    VALUES ('$titolo','$autore','$data', '$genere', '$descrizione', '$disponibilità')";  

    $risultato = mysqli_query($connessione, $sql);

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
        
        <div id="aggiunta">
        <h2>Libro aggiunto</h2>
            <a href="profilo_amministratore.php" class="button2"> Torna al profilo </a>
            <br><br>
            <a href="inserisci_libro.php" class="button2"> Inserisci libro </a>
        </div>
    </body>
</html>