<?php
    session_start(); //Si inizia una sessione, in questo caso per vedere se l'utente è già loggato
    include("connessione.php");
    
    if(isset($_SESSION["nome_utente"])){ //se la sessione esiste già, quindi se l'utente è già loggato
        header("Location: profilo.php");  //verrà indirizzato al proprio profilo
        exit; //termine esecuzione
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

        <div class="modulo">
            <h1>Effettua il login</h1>
            <form action = "profilo.php" method = "POST" class="campi">
                <label for="nome_utente">Nome Utente:</label>
                <br>
                <input type = "text" name = "nome_utente" placeholder="nome utente"/>
                <br><br>

                <label for="password">Password:</label>
                <br>
                <input type = "password" name = "password" placeholder="password"/>
                <br><br>
                
                <input type = "submit" value = "Login" class="button">
            </form>
        </div>
    </body>
</html>
