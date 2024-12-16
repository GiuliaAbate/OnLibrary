<?php
    include("connessione.php");
    session_start();
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

    <main> <!-- Introduzione al servizio -->
        <h1> Benvenuto su OnLibrary! </h1>
        <h3> La tua biblioteca online </h3>
        <p>
            OnLibrary è un portale online pensato per rendere più semplice la gestione delle prenotazioni dei tuoi libri preferiti.
            
            Quello che offriamo è:
                <ul>
                    <li>Un vasto catalogo di libri da consultare</li>
                    <li>Possibilità di prenotare con pochi click il libro che desideri</li>
                    <li>Gestione dei libri prenotati grazie ad una dashboard dedicata</li>
                </ul>
        </p>
        
        <img src="img/biblioteca1.jpg" alt="biblioteca" title="biblioteca" id="biblioteca">
        <img src="img/biblioteca2.jpg" alt="scaffali pieni di libri" title="scaffali" id="scaffali">

        <hr>
        <h3> Perchè sceglierci? </h3>
        <p>
            OnLibrary è progettato per offrire un'esperienza facile e intuitiva.
                <ul>
                    <li>Un catalogo sempre aggiornato con le ultime uscite</li>
                    <li>Accesso gratuito grazie ad una registrazione semplice e gratuita</li>
                    <li>Interfaccia user-friendly</li>
                </ul>
        </p>
        
    </main>

    <aside> <!--Newsletter-->
        <h2> Iscriviti alla nostra newsletter per rimanere sempre aggiornato </h2>
            <form action="mailto:giulia.abate272@edu.unito.it" method="post" enctype="text/plain">
                <fieldset>
                    <legend>Inserisci i tuoi dati</legend>
                        <label for="nome_utente"><strong>Il tuo nome utente</strong></label>: 
                            <input id="nome_utente" type="text" name="nome_utente" size="20" maxlength="20"> 
                        <br><br>
                        <label for="email"><strong>La tua email</strong></label>:
                            <input id="email" type="email"  name="email"> 
                        <br><br>
                        <label for="submit" hidden>Invia</label>
                            <input id="submit" type="submit" name="submit" class="button2" value="Invia">
                        <label for="reset" hidden>Cancella</label>
                            <input id="reset" type="reset" name="reset" class="button2" value="Cancella">
                </fieldset>
            </form>
    </aside>
</body>
</html>