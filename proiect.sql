-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Iul 2015 la 22:42
-- Versiune server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proiect`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `idAutori` int(11) NOT NULL,
  `nume_login` varchar(45) DEFAULT NULL,
  `parola` varchar(128) DEFAULT NULL,
  `nume` varchar(45) DEFAULT NULL,
  `prenume` varchar(45) DEFAULT NULL,
  `rememberme_token` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `autori`
--

INSERT INTO `autori` (`idAutori`, `nume_login`, `parola`, `nume`, `prenume`, `rememberme_token`) VALUES
(2, 'mircea.badragan', '$2y$10$yuGQE.HPh8.JxL6ctrbDqOgLvk7gwhUO2qMfB2MUL6ROn46pfDAWm', 'Badragan', 'Mircea', '810042014349a133f99ff80580c766110cfb248c444a335a8e1ac6923e64b069'),
(3, 'david.marian', 'mariandavid', 'David', 'Marian', ''),
(4, 'butiri.dan', 'danbutiri', 'Butiri', 'Dan', ''),
(5, 'doru.nitu', 'doru.nitu', 'Nitu', 'Doru', ''),
(6, 'iulia.cornea', 'iuliacornea', 'Cornea', 'Iulia', ''),
(7, 'manuela.carpen', 'manuelacarpen', 'Carpen', 'Manuela', ''),
(8, 'george.dan', 'georgedan', 'Dan', 'George', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `cursuri`
--

CREATE TABLE IF NOT EXISTS `cursuri` (
  `idCursuri` int(11) NOT NULL,
  `Subiecte_idSubiecte` int(11) NOT NULL,
  `Autori_idAutori` int(11) NOT NULL,
  `nume_curs` varchar(45) DEFAULT NULL,
  `link` varchar(60) DEFAULT NULL,
  `descriere_curs` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `cursuri`
--

INSERT INTO `cursuri` (`idCursuri`, `Subiecte_idSubiecte`, `Autori_idAutori`, `nume_curs`, `link`, `descriere_curs`) VALUES
(5, 3, 2, 'Algoritmi si programare 2006', '/cursuri/Algoritmi_si_Programare_2006.pdf', 'introducere in algoritmi'),
(6, 3, 2, 'Algoritmica Grafurilor', '/cursuri/Algoritmica_Grafurilor.pdf', 'algoritmi implementati pe grafuri'),
(7, 3, 3, 'Algoritmi Genetici', '/cursuri/Algoritmi_genetici.pdf', 'inteligenta artificiala'),
(8, 3, 4, 'Programare Windows', '/cursuri/Programare_Windows.pdf', 'sisteme de operare'),
(9, 3, 4, 'Proiectarea compilatoarelor', '/cursuri/Proiectarea_compilatoarelor_2007.pdf', 'compilatoare'),
(10, 3, 5, 'Programare distribuita in Java', '/cursuri/DISTR2.pdf', 'Java'),
(11, 3, 6, 'Baze de date orientate obiect', '/cursuri/CursBDOO_IDD.pdf', 'PL/SQL'),
(12, 4, 6, 'Analiza Numerica', '/cursuri/analiza_numerica.pdf', 'Analiza'),
(14, 5, 7, 'Pedagogie', '/cursuri/pedagogie.pdf', 'Elemente de pedagogie'),
(15, 6, 8, 'Limba Engleza', '/cursuri/Limba_Engleza.pdf', 'Elemente de gramatica in limba engleza'),
(18, 3, 2, 'aaa', '1438374176.', '<p>Description Here</p>'),
(19, 3, 2, 'qqqqqqqqqqqq', '1438374213.', '<p>Description Here</p>');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `grupuri`
--

CREATE TABLE IF NOT EXISTS `grupuri` (
  `id` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `nume` varchar(160) NOT NULL,
  `descr` text NOT NULL,
  `completed` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `inrolare_curs`
--

CREATE TABLE IF NOT EXISTS `inrolare_curs` (
  `idInrolare_Curs` int(11) NOT NULL,
  `Studenti_idStudenti` int(11) NOT NULL,
  `Cursuri_idCursuri` int(11) NOT NULL,
  `data_inrolare` datetime DEFAULT NULL,
  `data_completare` datetime DEFAULT NULL,
  `en_ds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` int(11) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `studenti`
--

CREATE TABLE IF NOT EXISTS `studenti` (
  `idStudenti` int(11) NOT NULL,
  `nume_login` varchar(45) DEFAULT NULL,
  `parola` varchar(225) DEFAULT NULL,
  `nume` varchar(45) DEFAULT NULL,
  `prenume` varchar(45) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `activare` varchar(45) NOT NULL,
  `rememberme_token` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `studenti`
--

INSERT INTO `studenti` (`idStudenti`, `nume_login`, `parola`, `nume`, `prenume`, `email`, `activare`, `rememberme_token`) VALUES
(1, 'a.storm', '$2y$10$KYOhEOJtqN4wao0uLQkVc.cD8Z3l3jJuPK36d1RcQr2JVPDj7GpQ.', 'Storm', 'Arctic', 'arctic.storm@mail.com', 'da', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `studenti_grupuri`
--

CREATE TABLE IF NOT EXISTS `studenti_grupuri` (
  `idStudenti` int(11) NOT NULL,
  `idGrupuri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `subiecte`
--

CREATE TABLE IF NOT EXISTS `subiecte` (
  `idSubiecte` int(11) NOT NULL,
  `nume_subiect` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `subiecte`
--

INSERT INTO `subiecte` (`idSubiecte`, `nume_subiect`) VALUES
(3, 'Informatica'),
(4, 'Matematica'),
(5, 'Psihologie'),
(6, 'Limba engleza'),
(7, 'Ecologie');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `teste`
--

CREATE TABLE IF NOT EXISTS `teste` (
  `Inrolare_Curs_idInrolare_Curs` int(11) NOT NULL,
  `rezultat` varchar(45) DEFAULT NULL,
  `data_evaluarii` varchar(50) DEFAULT NULL,
  `cod_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`idAutori`);

--
-- Indexes for table `cursuri`
--
ALTER TABLE `cursuri`
  ADD PRIMARY KEY (`idCursuri`), ADD KEY `fk_Cursuri_Subiecte1_idx` (`Subiecte_idSubiecte`), ADD KEY `fk_Cursuri_Autori1_idx` (`Autori_idAutori`);

--
-- Indexes for table `grupuri`
--
ALTER TABLE `grupuri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inrolare_curs`
--
ALTER TABLE `inrolare_curs`
  ADD PRIMARY KEY (`idInrolare_Curs`), ADD KEY `fk_Inrolare_Curs_Studenti_idx` (`Studenti_idStudenti`), ADD KEY `fk_Inrolare_Curs_Cursuri1_idx` (`Cursuri_idCursuri`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`idStudenti`);

--
-- Indexes for table `studenti_grupuri`
--
ALTER TABLE `studenti_grupuri`
  ADD PRIMARY KEY (`idStudenti`,`idGrupuri`);

--
-- Indexes for table `subiecte`
--
ALTER TABLE `subiecte`
  ADD PRIMARY KEY (`idSubiecte`);

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`Inrolare_Curs_idInrolare_Curs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autori`
--
ALTER TABLE `autori`
  MODIFY `idAutori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cursuri`
--
ALTER TABLE `cursuri`
  MODIFY `idCursuri` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `grupuri`
--
ALTER TABLE `grupuri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inrolare_curs`
--
ALTER TABLE `inrolare_curs`
  MODIFY `idInrolare_Curs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `idStudenti` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subiecte`
--
ALTER TABLE `subiecte`
  MODIFY `idSubiecte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `cursuri`
--
ALTER TABLE `cursuri`
ADD CONSTRAINT `fk_Cursuri_Autori1` FOREIGN KEY (`Autori_idAutori`) REFERENCES `autori` (`idAutori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Cursuri_Subiecte1` FOREIGN KEY (`Subiecte_idSubiecte`) REFERENCES `subiecte` (`idSubiecte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `inrolare_curs`
--
ALTER TABLE `inrolare_curs`
ADD CONSTRAINT `fk_Inrolare_Curs_Cursuri1` FOREIGN KEY (`Cursuri_idCursuri`) REFERENCES `cursuri` (`idCursuri`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Inrolare_Curs_Studenti` FOREIGN KEY (`Studenti_idStudenti`) REFERENCES `studenti` (`idStudenti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `teste`
--
ALTER TABLE `teste`
ADD CONSTRAINT `fk_Teste_Inrolare_Curs1` FOREIGN KEY (`Inrolare_Curs_idInrolare_Curs`) REFERENCES `inrolare_curs` (`idInrolare_Curs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
