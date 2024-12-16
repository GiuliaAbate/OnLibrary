# OnLibrary - Biblioteca Digitale

OnLibrary è una piattaforma digitale per la gestione delle biblioteche, che consente agli utenti di registrarsi, visualizzare un catalogo di libri, visualizzare di ciascuno la propria scheda e poterli prenotare e gestire le prenotazioni nella dashboard dedicata.
L'amministratore ha il compito di gestire il catalogo modificando e aggiungendo i libri.
Il sito è stato sviluppato utilizzando HTML, CSS, PHP e MySQL, con l’obiettivo di realizzare un sito dinamico che consenta l'accesso ad alcune funzionalità all'utente registrato e la memorizzazione dei contenuti su database.

## Tecnologie
- HTML
- CSS
- PHP
- MySQL

## Funzionalità
- **Registrazione e Login:** Gli utenti possono registrarsi sulla piattaforma. In caso di errori durante la compilazioni il sistema mostrerà messaggi specifici. A registrazione avvenuta con successo è possibile fare l'accesso.
- **Catalogo libri:** Sia gli utenti che visitatori possono visualizzare i libri nel catalogo e le loro schede.
- **Prenotazioni:** Solo gli utenti registrati possono prenotare dei libri compilando il form.
- **Profilo amministratore:** L'amministratore è unico e ha il compito di aggiungere e rimuovere libri dal catalogo.
- **Dashboard utenti:** Gli utenti registrati possono gestire le proprie prenotazioni.

## Installazione
OnLibrary è un sito realizzato in locale utilizzando Xampp. Per installarlo nello stesso modo seguire i seguenti passaggi:
1. **Download e installazione**
   - Scaricare Xampp dal [sito ufficiale](https://www.apachefriends.org/it/download.html).
   - Installarlo seguendo le istruzioni.
2. **Importare il progetto**
   - Dopo l'installazione, copiare il sito nella cartella htdocs.
3. **Importare e configurare il database**
   - Dopo aver avviato Xampp, andare su phpMyAdmin dal pannello di controllo.
   - Creare un nuovo database che deve avere come nome "OnLibrary".
   - Importare il file SQL presente nella cartella principale.
