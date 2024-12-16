-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 11:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id` int(11) NOT NULL,
  `utente` text NOT NULL,
  `libro_titolo` text NOT NULL,
  `biblioteca` text NOT NULL,
  `data_prenotazione` date NOT NULL,
  `data_ritiro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prenotazioni`
--

INSERT INTO `prenotazioni` (`id`, `utente`, `libro_titolo`, `biblioteca`, `data_prenotazione`, `data_ritiro`) VALUES
(1, 'RedMario', 'Il Signore degli Anelli ', 'Biblioteca civica Cascina Marchesa', '2024-12-18', '2024-12-30'),
(2, 'Ale', 'Il ritratto di Dorian Grey', 'Biblioteca civica Italo Calvino', '2025-01-06', '2025-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `servizi`
--

CREATE TABLE `servizi` (
  `id` int(11) NOT NULL,
  `titolo` text NOT NULL,
  `autore` text NOT NULL,
  `data` year(4) NOT NULL,
  `genere` text NOT NULL,
  `descrizione` text NOT NULL,
  `disponibilità` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servizi`
--

INSERT INTO `servizi` (`id`, `titolo`, `autore`, `data`, `genere`, `descrizione`, `disponibilità`) VALUES
(1, 'Harry Potter e la pietra filosofale', 'J. K. Rowling', '1998', 'Fantasy', 'Harry Potter e la pietra filosofale (titolo originale in inglese: Harry Potter and the Philosopher\'s Stone) è il primo romanzo della saga high fantasy Harry Potter, scritta da J. K. Rowling e ambientata principalmente nell\'immaginario Mondo magico durante gli anni novanta del XX secolo.', 'Disponibile'),
(2, 'Twilight', 'Stephenie Meyer', '2006', 'Paranormal romance', 'Twilight è il primo libro della Saga di Twilight di Stephenie Meyer, pubblicato il 5 ottobre 2005 negli Stati Uniti. Data la fama del libro, nel 2008 è uscito l\'omonimo film tratto dal libro.', 'Disponibile'),
(3, 'Il ritratto di Dorian Grey', 'Oscar Wilde', '1905', 'Romanzo', 'Il ritratto di Dorian Gray (The Picture of Dorian Gray) è un romanzo filosofico e horror gotico scritto dall\'autore irlandese Oscar Wilde. \r\nUnico romanzo di Wilde, al suo apparire fu soggetto a molte controversie, critiche e stroncature, ma col tempo è stato riconosciuto come un capolavoro, un classico della letteratura gotica.', 'Non Disponibile'),
(4, 'The Hunger Games', 'Suzanne Collins', '2009', 'romanzo distopico', 'Hunger Games (The Hunger Games) è un romanzo fantascientifico[1] distopico per ragazzi scritto da Suzanne Collins. Il primo libro della trilogia degli Hunger Games è stato originariamente pubblicato in edizione rilegata il 14 settembre 2008 da Scholastic[2]. In Italia è uscito il 20 agosto 2009, edito da Mondadori. ', 'Disponibile'),
(5, 'Il Signore degli Anelli ', 'J. R. R. Tolkien', '1970', 'Fantasy', 'Il Signore degli Anelli (The Lord of the Rings) è un romanzo epico high fantasy scritto da J. R. R. Tolkien e ambientato alla fine della Terza Era dell\'immaginaria Terra di Mezzo. Scritto a più riprese tra il 1937 e il 1949, fu pubblicato in tre volumi tra il 1954 e il 1955 nonché tradotto in trentotto lingue ed ha venduto oltre 150 milioni di copie che lo rendono una delle opere letterarie di maggior successo del XX secolo.', 'Non Disponibile');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `Nome` text NOT NULL,
  `Cognome` text NOT NULL,
  `Nome_utente` text NOT NULL,
  `Password` text NOT NULL,
  `Amministratore` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`Nome`, `Cognome`, `Nome_utente`, `Password`, `Amministratore`) VALUES
('Giulia', 'Abate ', 'Giulia', 'admin', 1),
('Mario', 'Rossi', 'RedMario', 'supermario', 0),
('Alessia', 'Bianchi', 'Ale', 'ale123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servizi`
--
ALTER TABLE `servizi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `servizi`
--
ALTER TABLE `servizi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
