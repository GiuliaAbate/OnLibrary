<?php
session_start();
include("connessione.php");

if(isset($_SESSION["nome_utente"])){
    header("Location: profilo.php");
    exit;
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
            <h1>Registrati</h1>
            <form action = "conferma_reg.php" method = "POST" class="campi">
                <label for="nome">Nome:</label>
                <br>
                <input type = "text" name = "nome" placeholder="nome"/>
                <br><br>

                <label for="cognome">Cognome:</label>
                <br>
                <input type = "text" name = "cognome" placeholder="cognome"/>
                <br><br>

                <label for="nome_utente">Nome Utente:</label>
                <br>
                <input type = "text" name = "nome_utente" placeholder="nome utente"/>
                <br><br>

                <label for="password">Password:</label>
                <br>
                <input type = "password" name = "password" placeholder="password"/>
                <br><br>

                <label for="ruolo">Ruolo:</label>
                <input type="radio" id="admin" name="amministratore" value="1"/>
                <label for="amm">Amministratore</label>
                <input type="radio" id="user" name="amministratore" value="0"/>
                <label for="norm">Utente normale</label>
                <br><br>
                <input type = "submit" value = "Registrati" class="button">
            </form>
        </div>
    </body>
</html>
