<?php
    //include("includes/header.php"); //Menu di navigazione
    include("connessione.php");
    session_start();


    if(!isset($_SESSION["nome_utente"])){ //controlla se i campi vengono riempiti o meno

        if(!isset($_POST["nome_utente"]) || empty($_POST["nome_utente"]) 
        && !isset($_POST["password"]) || empty($_POST["password"])){ 
      
        header("Location:login.php"); //se vengono lasciati vuoti, riporta al login
        exit;
      
        }else{ //sennò controlla che le credenziali siano esatte
            $nome_utente = mysqli_real_escape_string($connessione,$_POST["nome_utente"]); 
            $password = mysqli_real_escape_string($connessione,$_POST["password"]);
            
            //seleziona dal database nome utente e password
            $sql = "SELECT Nome_utente, amministratore FROM utenti WHERE Nome_utente ='$nome_utente' and password='$password'"; 
            
            //in variabile "risultato" si hanno la connessione al database oppure mostra messaggio di errore
            $risultato = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><br><a href='login.php'>Torna alla pagina di login</a>");
            
            //ulteriori controlli
            if (mysqli_num_rows($risultato) > 0) {
            
                $row = mysqli_fetch_assoc($risultato);
            
                $_SESSION['nome_utente']=$row['Nome_utente'];
                $_SESSION['amministratore']=$row['amministratore'];
        
            }else{
                echo "<h2>Credenziali errate!</h2><br><a href='login.php'> Torna alla pagina di login</a>";
                exit; 
            }
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
    <?php
        include("includes/header.php"); //Menu di navigazione

        $nome_utente = $_SESSION["nome_utente"]; //variabile username

        if($_SESSION["amministratore"] == 1){ //se chi visita la pagina è amministratore verrà indirizzato al profilo dedicato
            header ("Location: profilo_amministratore.php");
        }else{
            $ruolo = "utente normale"; //sennò significa che è un utente normale
        }

        $sql = "SELECT * FROM utenti WHERE Nome_utente = '$nome_utente'";
        $risultato = mysqli_query($connessione, $sql) or die("<h2>Errore!</h2><br><a href='login.php'>Torna alla pagina di login</a>");
        $userData=mysqli_fetch_assoc($risultato);

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
        <a href="aggiorna_password.php" class="button2">Cambia password</a>
        <br><br>
        <a href="dashboard.php" class="button2">Visualizza le prenotazioni</a>
        <br><br>
        <a href="logout.php" class="button2">Logout</a>
    </aside>


</body>
</html>