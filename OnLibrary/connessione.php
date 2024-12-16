<?php
/* Connessione al database */
$server="localhost";
$user="root";
$password="";
$database="onlibrary"; 

$connessione = mysqli_connect($server, $user, $password, $database) or die("errore di connessione");
?>