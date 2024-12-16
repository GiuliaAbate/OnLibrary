<?php
    session_start();
    include("connessione.php");

    if(!isset($_SESSION["nome_utente"])){
        header ("Location: login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Dati del form
        $utente = mysqli_real_escape_string($connessione, $_SESSION['nome_utente']);
        $libro_titolo = mysqli_real_escape_string($connessione, $_POST['libro_titolo']);
        $biblioteca = mysqli_real_escape_string($connessione, $_POST['biblioteca']);
        $data_prenotazione = mysqli_real_escape_string($connessione, $_POST['data_prenotazione']);
        $data_ritiro = mysqli_real_escape_string($connessione, $_POST['data_ritiro']);
    
        //Si inserisce la prenotazione
        $query = "INSERT INTO prenotazioni (utente, libro_titolo, biblioteca, data_prenotazione, data_ritiro) 
                VALUES ('$utente', '$libro_titolo', '$biblioteca', '$data_prenotazione', '$data_ritiro')";

        if ($connessione->query($query)) {
            //Si aggiorna disponibilità del libro
            $connessione->query("UPDATE servizi SET disponibilità = 'Non Disponibile' WHERE titolo = '$libro_titolo'");
            $successo = "Prenotazione effettuata con successo!";
        } else {
            $errore = "<h2>Errore!</h2> <p>Prenotazione non riuscita</p>";
        }
    } else {
        //Si recuperano i dettagli del libro
        $libro_id = $_GET['id'];
        $sql="SELECT titolo FROM servizi WHERE id = $libro_id";
        $result = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><br><a href='login.php'>Torna alla pagina di login</a>");
        $libro = mysqli_fetch_assoc($result);
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
    
    <div class="modulo2">
    <h2>Prenota il tuo libro</h2>

    <form method="POST">
        <input type="hidden" name="libro_titolo" value="<?php echo $libro['titolo']; ?>">
        
        <label>Nome utente:</label>
        <input type="text" name="utente" required>
        <br><br>

        <label>Data Prenotazione:</label>
        <input type="date" name="data_prenotazione" required>
        <br><br>

        <label>Biblioteca:</label>
        <select name="biblioteca" required>
            <option value="Biblioteca civica Centrale">Biblioteca civica Centrale</option>
            <option value="Biblioteca civica Cascina Marchesa">Biblioteca civica Cascina Marchesa</option>
            <option value="Biblioteca civica Italo Calvino">Biblioteca civica Italo Calvino</option>
            <option value="Biblioteca Norberto Bobbio">Biblioteca Norberto Bobbio</option>
        </select>
        <br><br>

        <label>Data Ritiro:</label>
        <input type="date" name="data_ritiro" required>
        <br><br>

        <button type="submit" class="button2">Conferma Prenotazione</button>
    </form>
</div>
</body>