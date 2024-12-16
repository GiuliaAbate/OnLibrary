<?php
    include("connessione.php");
    session_start();

    if(!isset($_SESSION["nome_utente"])){
        header ("Location: login.php");
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
    <?php
        include("includes/header.php");

        $nome_utente = $_SESSION["nome_utente"];

        //Mostra le prenotazioni leggendo il nome utente inserito durante la prenotazione
        $query="SELECT * FROM prenotazioni WHERE utente = '$nome_utente'";
        $result= mysqli_query($connessione, $query) or die("<h2>Errore!</h2><br><a href='login.php'>Torna alla pagina di login</a>");

    ?>

    <div id="prenotazione">
        <h2> Le tue prenotazioni </h2>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <h4>Libro: <?php echo $row['libro_titolo']; ?></h4>
            <p><strong>Utente:</strong> <?php echo $row['utente']; ?></p>
            <p><strong>Biblioteca:</strong> <?php echo $row['biblioteca']; ?></p>
            <p><strong>Data Prenotazione:</strong> <?php echo $row['data_prenotazione']; ?></p>
            <p><strong>Data Ritiro:</strong> <?php echo $row['data_ritiro']; ?></p>
        <?php endwhile; ?>


    </div>
</body>
</html>