<?php
//Connessione al database
if (!isset($connessione)) {
    die("Connessione al database non inizializzata.");
}
?>

<header>
    <nav class="container"> <!-- Link di navigazione -->
        <div class="info"> <!-- Nome e motto del sito -->
            <h1 id="nome"><a href="index.php">OnLibrary</a></h1>
            <p id="motto"> La tua biblioteca online </p>
        </div>
        &nbsp;

        <div class="pagine"> <!-- Pagine del sito, barra di ricerca  -->
        <ul>
            <li><a href="catalogo.php">Catalogo</a></li> <!--Catalogo di libri con nome,autore,anno,disponibilità,pulsante per prenotare-->
            <li><a href="dashboard.php">Dashboard</a></li> <!--Informazioni sulle prenotazioni dell'utente loggato-->
            <li><a href="profilo.php">Profilo</a></li> <!-- Profilo dell'utente -->
        </ul>     
        &nbsp;
            <form action='catalogo.php' method="GET">
                <input type="text" name="search" id="ricerca" placeholder="cerca un libro">
                <button type="submit">Cerca</button>
            </form>
        </div>

        <div class="accesso"> <!-- Login e registrazione -->
            <a href="login.php" class="button">Login</a>
        &nbsp;
            <a href="registrazione.php" class="button">Registrati</a>
        </div>
    </nav>
</header>