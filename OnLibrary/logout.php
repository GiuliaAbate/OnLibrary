<?php
    session_start(); //si leggono i dati della sessione già iniziata oppure si inizia
    session_unset();  //si rimuovono tutte le variabili salvate nella sessione
    session_destroy(); //la sessione si dsitrugge, si fa logout
    header("Location: index.php");
?>
