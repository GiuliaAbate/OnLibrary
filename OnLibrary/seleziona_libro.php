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

    $query = "SELECT id,titolo,autore,data,genere,descrizione,disponibilità FROM `servizi` ";
    $result = mysqli_query($connessione,$query)  or die("<a href='login.php'>Errore! Torna alla pagina di login</a>");
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

        <h2 id="elimina"> Elimina un libro </h2>


        <table id="libri"> 
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Titolo
                    </th>
                    <th>
                        Autore
                    </th>
                    <th>
                        Data
                    </th>
                    <th>
                        Genere
                    </th>
                    <th>
                        Descrizione
                    </th>
                    <th>
                        Disponibilità
                    </th>
                </thead>
            <?php foreach($result as $riga){   ?>

                
                <form method='post' action='elimina_libro.php'>
                    <tr>
                        <td>
                            <?php echo $riga['id']; ?>
                        </td>
                        <td>
                            <?php echo $riga['titolo']; ?>
                        </td>
                        <td>
                            <?php echo $riga['autore']; ?>
                        </td>
                        <td>
                            <?php echo $riga['data']; ?>
                        </td>
                        <td>
                            <?php echo $riga['genere']; ?>
                        </td>
                        <td>
                            <?php echo $riga['descrizione']; ?>
                        </td>
                        <td>
                            <?php echo $riga['disponibilità']; ?>
                        </td>
                        <td>   
                            <input type='hidden' value='<?php echo $riga['id']; ?>' name='id'> 
                            <input type="submit" value="elimina"> 
                        </td>
                    </tr>
                </form>
            <?php } ?>
        </table>


    </body>
</html>

    