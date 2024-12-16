<?php
    session_start();
    include("connessione.php");

    if(!isset($_SESSION["nome_utente"])){
        header ("Location: login.php");
        exit;
    }

    $nome_utente = $_SESSION["nome_utente"]; 
    $query = "UPDATE utenti SET password=? WHERE nome_utente=?"; //si aggiorna la password in base al nome utente dell'utente loggato 

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

    <div class="modulo">
    <h2>Cambia la password</h2>
        <form action="cambio_password.php" method="POST">
            Password: <input type="password" name="password" placeholder="Nuova password" />
            <br><br>
            <input type="submit" value="Aggiorna" class="button2">
        </form>
    </div>
</body>