<?php

    session_start();
    include("connessione.php");


    // Gestione della barra di ricerca presente nell'header che restituisce libri del catalogo
    if (!isset($_GET['search'])) {  //se il parametro search non è settato si visualizzano tutti i servizi
        $query = "SELECT * FROM servizi"; 
        $result = mysqli_query($connessione, $query) or die("<a href='login.php'>Errore! Torna alla pagina di login</a>");  
    } else {
        // Sennò si cerca in base a quello scritto
        $search = mysqli_real_escape_string($connessione, $_GET['search']);
        // Seleziona tutto dai servizi dove la parola inserita è simile al titolo, autore o genere del libro
        $query = " SELECT * FROM servizi WHERE titolo LIKE '%$search%' OR autore LIKE '%$search%' OR genere LIKE '%$search%'";
        $result = mysqli_query($connessione, $query) or die("<a href='login.php'>Errore! Torna alla pagina di login</a>");
    }

    // Se non ci sono risultati, mostra un messaggio
    if (mysqli_num_rows($result) == 0) { 
        echo "<p>Nessun risultato trovato per la ricerca: <strong>" . htmlspecialchars($search) . "</strong></p>";
        echo "<a href='catalogo.php'>Torna al catalogo completo</a>";
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

    <h2 id="catalogo">Il nostro catalogo di libri</h2>
    <p id="scheda">Clicca sul singolo libro per leggere la sua scheda</p>


    <table id="libri">
        <thead>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Disponibilità</th>
        </thead>

        <tbody>
        <?php while($columns = mysqli_fetch_assoc($result)){ ?>
            <tr>                           
                <td>
                    <a href="desc_libro.php?codice_servizio=<?php echo $columns['id'] ?>" class="link">
                        <?php echo $columns['titolo'] ?></a>
                </td>
                <td>
                    <?php echo $columns['autore'] ?>
                </td>
                <td>
                    <?php if ($columns['disponibilità'] === 'Disponibile') { ?>

                    <a href="prenota.php?id=<?php echo $columns['id']; ?>" class="btn btn-primary">Prenota</a>

                    <?php } else { ?>
                        <button class="btn btn-secondary" disabled>Non Disponibile</button>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
   </table>
</body>
</html>