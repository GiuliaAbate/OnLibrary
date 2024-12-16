<?php
    session_start();
    include("connessione.php"); //connessione al database

    $errore = ''; // Variabile per memorizzare i messaggi di errore

    /*Controllo dei campi, se vuoti reindirizza a pagina con un messaggio */
    if( 
        !isset($_POST["nome"])   || empty($_POST["nome"])
        || !isset($_POST["cognome"])   || empty($_POST["cognome"] )
        || !isset($_POST["nome_utente"]) || empty($_POST["nome_utente"])
        || !isset($_POST["password"])   || empty($_POST["password"])
        || !isset($_POST["amministratore"]) 
    ){
        $errore = "<h2>Per effettuare la registrazione occorre compilare tutti i campi.</h2><br><a href='registrazione.php' class='button2'>Torna alla pagina di registrazione</a>";
    } else {
        $nome = mysqli_real_escape_string($connessione, $_POST["nome"]);
        $cognome = mysqli_real_escape_string($connessione, $_POST["cognome"]);
        $nome_utente = mysqli_real_escape_string($connessione, $_POST["nome_utente"]);
        $password = mysqli_real_escape_string($connessione, $_POST["password"]);
        $amministratore = mysqli_real_escape_string($connessione, $_POST["amministratore"]);

        $sql = "SELECT * FROM utenti WHERE Nome_utente = '$nome_utente'";
        $risultato = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><br><a href='login.php' class='button2'>Torna alla pagina di login</a>");

        if (mysqli_num_rows($risultato) > 0) {
            $errore = "<h2>Esiste già un utente con questo nome utente!</h2><br><a href='registrazione.php' class='button2'>Torna alla pagina di registrazione</a>";
        }

        if ($amministratore == 1) {
            $sql = "SELECT * FROM utenti WHERE amministratore = 1";
            $risultato = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><br><a href='login.php' class='button2'>Torna alla pagina di login</a>");
            if (mysqli_num_rows($risultato) > 0) {
                $errore = "<h2>Esiste già l'amministratore!</h2><br><a href='registrazione.php' class='button2'> Torna alla pagina di registrazione</a>";
            }
        }

        if (empty($errore)) {
            $sql = "INSERT INTO utenti (nome,cognome,Nome_utente,password,amministratore)
                    VALUES ('$nome','$cognome','$nome_utente','$password',$amministratore)";
            $risultato = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><a href='login.php' class='button2'>Torna alla pagina di login</a>");
            $errore = "<h2>Utente registrato con successo!</h2><br><a href='login.php' lass='button2'>Fai l'accesso</a>";
        }
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
    
    <!-- Mostra il messaggio di errore o successo qui -->
    <div class="messaggio">
        <?php echo $errore; ?>
    </div>

</body>
</html>
