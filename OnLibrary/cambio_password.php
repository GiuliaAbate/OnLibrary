<?php
    session_start();
    include("connessione.php");

    if (!isset($_SESSION["nome_utente"])) {
        header("Location: login.php");
        exit;
    }

    $nome_utente = $_SESSION["nome_utente"]; //Si recupera il nome utente dall'utente loggato
    $password = $_POST["password"]; //Si prende la password inserita nel form di cambiamento della password
    $password = mysqli_escape_string($connessione, $_POST["password"]); //si crea variabile

    $query = "UPDATE utenti SET password='$password' WHERE nome_utente='$nome_utente'";

    $sql = "SELECT * FROM utenti WHERE Nome_utente = '$nome_utente'"; 
    $risultato = mysqli_query($connessione, $sql);

    if (mysqli_query($connessione, $query)) {
            $conferma= "La password è stata modificata con successo!";
            session_destroy(); //si fa automaticamente logout
            $avviso="<a href='login.php'> Rifai il login</a>";
        } else {
            echo "Errore";
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

    <?php if (!empty($conferma)) : ?> <!-- Si verifica che la variabile conferma non sia vuota per mostrarla e quindi il cambio è avvenuto -->
    <div class="conferma">
        <p><?php echo $conferma; ?></p>
    </div>
    <?php endif; ?>

</body>