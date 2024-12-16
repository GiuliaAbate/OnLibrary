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

    <?php
        include("includes/header.php"); //Menu di navigazione
        
        $ruolo = "amministratore";
        $nome_utente = $_SESSION["nome_utente"]; //variabile username
        

        $sql = "SELECT * FROM utenti WHERE Nome_utente = '$nome_utente'";
        $risultato = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><br><a href='login.php'>Torna alla pagina di login</a>");
        $userData=mysqli_fetch_assoc($risultato); //In UserData si mettono i dati dell'utente così da mostrarli
    ?>

    <main class="credenziali">
        <h2>Il tuo profilo</h2>
        <b>Nome:</b> <?= $userData["Nome"]  ?> <br><br>
        <b>Cognome:</b> <?= $userData["Cognome"] ?> <br><br>
        <b>Nome utente:</b> <?= $userData["Nome_utente"]?> <br><br>
        <b>Ruolo:</b> <?= $ruolo ?>
    </main>

    <aside>
    <h3>Cosa vorresti fare?</h3>
        <a href="inserisci_libro.php" class="button2" > Inserisci un libro </a>
        <br><br>
        <a href="seleziona_libro.php" class="button2"> Elimina libro </a>
        <br><br> 
        <a href="catalogo.php" class="button2" > Torna al catalogo </a>
        <br><br>
        <a href="logout.php" class="button2">Logout</a>
    <aside>
</body>
</html>
