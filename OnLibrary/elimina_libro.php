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

    if(!isset($_POST['id'])){ 
        header("Location:login.php"); 
    }

    //Si elimina dal database
    $query = "DELETE FROM `servizi` WHERE id = $_POST[id] "; 
    $result = mysqli_query($connessione,$query)  or die("<a href='login.php'>Errore! Torna alla pagina di login</a>");

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

        <div id="elimina">
        <h2>Libro eliminato</h2>
        <br><br>
        <a href="profilo_amministratore.php" class="button2" > Torna al profilo </a>
        </div>

    </body>
</html>
