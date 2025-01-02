# OnLibrary - Biblioteca Digitale

![onlibrary](https://github.com/user-attachments/assets/aee70c3a-704b-4a6c-ba9b-1d942ef0d84f)

OnLibrary è una piattaforma digitale per la gestione di prenotazioni di libri che permette agli utenti di registrarsi, visualizzare un catalogo e la scheda libro per ogni libro. Gli utenti registrati possono prenotare il libro desiderato e in seguito gestire le proprie prenotazioni grazie alla dashboard dedicata. L'amministratore è unico e può gestire il catalogo, aggiungendo e modificando libri.
Il sito è stato sviluppato utilizzando HTML, CSS, PHP e MySQL, con l’obiettivo di realizzare un sito dinamico che consenta l'accesso ad alcune funzionalità all'utente registrato e la memorizzazione dei contenuti su database.

## Tecnologie
- HTML
- CSS
- PHP
- MySQL

## Funzionalità
- **Registrazione e Login:** Gli utenti possono registrarsi sulla piattaforma inserendo le loro credenziali. In caso di errori durante la compilazioni il sistema mostrerà messaggi specifici. A registrazione avvenuta con successo è possibile fare l'accesso.
  
  Registrazione:
  
  ![Screenshot 2025-01-02 162445](https://github.com/user-attachments/assets/5417e432-96a9-40ab-a1f0-e1ec31267902)
  
  Login:
  
  ![Screenshot 2025-01-02 162515](https://github.com/user-attachments/assets/c7a3f34d-264c-46ba-ad7b-38db171482b8)


- **Catalogo libri:** Sia gli utenti che visitatori possono visualizzare i libri nel catalogo e le loro schede, queste disponibili cliccando sul nome del libro. Inoltre, viene mostrata anche la disponibilità per ciascuno
  
  ![Screenshot 2025-01-02 162357](https://github.com/user-attachments/assets/c72e485e-88d3-43bf-bbaf-550799d0980b)

- **Prenotazioni:** Solo gli utenti registrati possono prenotare dei libri compilando il form.

  ![Screenshot 2025-01-02 162655](https://github.com/user-attachments/assets/8032c580-01fc-415e-a53d-9bc070017bb3)

- **Ricerca:** Si possono cercare i libri tramite una barra di ricerca situata nella navbar

   ![Screenshot 2025-01-02 162421](https://github.com/user-attachments/assets/316b1b8e-eab0-43ab-8fe8-e58e7821b13f)

- **Profilo personale:** L'amministratore e gli utenti registrati possono accedere al proprio profilo e gestire le loro attività come cambio password per gli utenti oppure gestione del catalogo per l'amministratore
  
  ![Screenshot 2025-01-02 162533](https://github.com/user-attachments/assets/aebd6d51-6af5-4021-97bf-989c8c26e34c)

- **Ruolo Amministratore:** L'amministratore è unico e ha il compito di aggiungere e rimuovere libri dal catalogo.
  
   Aggiunta di un libro:
  
   ![Screenshot 2025-01-02 162543](https://github.com/user-attachments/assets/ffaf8fa9-3ebb-4d03-9599-3149f2371690)
  
  Gestione del catalogo:
  
  ![Screenshot 2025-01-02 162557](https://github.com/user-attachments/assets/688368e6-053a-4d7c-a5a3-45f81e4c80d0)
 
- **Dashboard utenti:** Gli utenti registrati possono gestire le proprie prenotazioni.

  ![Screenshot 2025-01-02 162641](https://github.com/user-attachments/assets/8cb87fd8-8542-4009-bc5a-45701bf1b071)

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
