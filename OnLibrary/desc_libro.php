<?php
    session_start();
    include("connessione.php");

    if(isset($_GET['codice_servizio'])){ 
    $codice_servizio = $_GET['codice_servizio']; 
    } else {
        header("Location:index.php");
        exit; 
    }

    //La variabile id contiene l'id del libro selezionato
    $id= mysqli_real_escape_string($connessione,$_GET['codice_servizio']);

    //Nella variabile query si inserisce la selezione dal database dell'id del libro
    $query = "SELECT * FROM servizi WHERE id = " . $id;

    $result = mysqli_query($connessione, $query) or die("<h2>Errore!</h2><br><a href='login.php'>Torna alla pagina di login</a>");
    $libro = mysqli_fetch_assoc($result); //Si inserisce nella variabile i dati del libro specifico

    //Se non c'è nessun libro e quindi non ci ono righe, viene mostrato un messaggio
    if(mysqli_num_rows($result) ==0){
        echo "<h2>Nessun risultato!</h2>";
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

    <div id="descrizione">
        <h2>Hai selezionato il seguente libro: </h2>
        <p><strong>Titolo</strong>:<?php echo $libro['titolo']?></p>
        <p><strong>Autore</strong>:<?php echo $libro['autore']?></p>
        <p><strong>Data</strong>:<?php echo $libro['data']?></p>
        <p><strong>Genere</strong>:<?php echo $libro['genere']?></p>
        <p><strong>Descrizione</strong>:<?php echo $libro['descrizione']?></p>
    </div>
</body>

</html>
