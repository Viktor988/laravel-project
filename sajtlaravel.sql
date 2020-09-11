-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 01:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sajtlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `idkomentar` int(100) NOT NULL,
  `komentar` text NOT NULL,
  `idkorisnik` int(100) NOT NULL,
  `idproizvod` int(100) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`idkomentar`, `komentar`, `idkorisnik`, `idproizvod`, `vreme`) VALUES
(3, 'Dobar sat.', 21, 15, '2020-03-22 22:53:54'),
(4, 'Dobar sat.', 26, 13, '2020-03-25 12:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkorisnik` int(255) NOT NULL,
  `ime` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinkaponovo` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iduloga` int(11) NOT NULL,
  `datumKreiranja` timestamp NULL DEFAULT NULL,
  `datumAzuriranja` timestamp NULL DEFAULT NULL,
  `poslednjaAktivnost` timestamp NULL DEFAULT NULL,
  `poslednjeOdjavljivanje` timestamp NULL DEFAULT NULL,
  `aktivan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idkorisnik`, `ime`, `prezime`, `email`, `lozinka`, `lozinkaponovo`, `iduloga`, `datumKreiranja`, `datumAzuriranja`, `poslednjaAktivnost`, `poslednjeOdjavljivanje`, `aktivan`) VALUES
(21, 'Viktor', 'Ciric', 'viktorciric31@gmail.com', 'viktor98', 'viktor98', 4, '2020-03-22 21:48:17', '2020-03-23 10:11:29', '2020-03-25 11:17:50', '2020-03-25 11:18:30', 0),
(23, 'Luka', 'Lukic', 'lukalukic@gmail.com', 'luka123', 'luka123', 5, '2020-03-22 22:01:48', NULL, '2020-03-25 10:52:19', '2020-03-25 10:52:38', 0),
(24, 'Luka', 'Lukic', 'lukalukic1@gmail.com', 'luka123', 'luka123', 4, '2020-03-22 22:03:12', NULL, '2020-03-25 10:51:50', '2020-03-25 10:51:53', 0),
(26, 'Viktor', 'Ciric', 'viktor98@gmail.com', 'viktor98', 'viktor98', 5, '2020-03-25 11:05:51', NULL, '2020-03-25 11:12:10', '2020-03-25 11:17:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idkorpa` int(50) NOT NULL,
  `idkorisnik` int(255) NOT NULL,
  `idproizvod` int(255) NOT NULL,
  `kolicina` int(10) NOT NULL,
  `adresaIsporuke` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datumKupovine` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`idkorpa`, `idkorisnik`, `idproizvod`, `kolicina`, `adresaIsporuke`, `datumKupovine`) VALUES
(6, 21, 1, 5, 'Beograd,Vojvode stepe 411E', '2020-03-22 22:55:32'),
(7, 21, 15, 3, 'Beograd,Vojvode stepe 411E', '2020-03-22 22:55:38'),
(8, 21, 6, 5, 'Beograd,Vojvode stepe 411E', '2020-03-22 22:55:44'),
(9, 21, 11, 9, 'Beograd,Vojvode stepe 411E', '2020-03-22 22:55:48'),
(12, 26, 13, 1, 'Beograd,Vojvode Stepe', '2020-03-25 12:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `marke`
--

CREATE TABLE `marke` (
  `idmarka` int(11) NOT NULL,
  `nazivMarka` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marke`
--

INSERT INTO `marke` (`idmarka`, `nazivMarka`) VALUES
(1, 'Casio'),
(2, 'Festina'),
(3, 'Seiko'),
(4, 'Tissot');

-- --------------------------------------------------------

--
-- Table structure for table `ocenjivanje`
--

CREATE TABLE `ocenjivanje` (
  `idocene` int(11) NOT NULL,
  `idkorisnik` int(50) NOT NULL,
  `idproizvod` int(50) NOT NULL,
  `ocena` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocenjivanje`
--

INSERT INTO `ocenjivanje` (`idocene`, `idkorisnik`, `idproizvod`, `ocena`) VALUES
(3, 21, 15, 5),
(4, 21, 11, 5),
(5, 21, 1, 5),
(6, 21, 14, 5),
(7, 26, 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

CREATE TABLE `pol` (
  `idpol` int(11) NOT NULL,
  `naziv` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`idpol`, `naziv`) VALUES
(1, 'Muški'),
(2, 'Ženski');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `idproizvod` int(11) NOT NULL,
  `cena` int(50) NOT NULL,
  `slikamala` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slikavelika` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `karakteristike` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idmarka` int(50) NOT NULL,
  `idpol` int(5) NOT NULL,
  `datumpostavljanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`idproizvod`, `cena`, `slikamala`, `slikavelika`, `karakteristike`, `model`, `idmarka`, `idpol`, `datumpostavljanja`) VALUES
(1, 18000, 'cetvrta1.png', 'cetvrta1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'SSH045J1', 3, 1, '2020-03-14 21:53:31'),
(2, 21000, 'treca1.png', 'treca1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'SNP159P1', 3, 1, '2020-03-14 21:59:18'),
(3, 32000, 'peta1.png', 'peta1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'W-S210H', 1, 1, '2020-03-14 21:59:18'),
(4, 13000, 'zaseiko1.png', 'zaseiko1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'TH1782126', 3, 2, '2020-03-14 22:08:36'),
(5, 22000, 'zcasio1.png', 'zcasio1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'CS172353', 1, 2, '2020-03-14 22:08:36'),
(6, 34000, 'jedanaesta1.png', 'jedanaesta1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'FE-454JDH', 2, 1, '2020-03-14 22:12:36'),
(7, 45000, 'dvanaesta1.png', 'dvanaesta1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'FE-896PT', 2, 1, '2020-03-14 22:12:36'),
(8, 16500, 'zfestina1.png', 'zfestina1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'FE-Z44H', 2, 2, '2020-03-14 22:16:39'),
(9, 28000, 'zcasio2.png', 'zcasio2.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'CA-H5T7', 1, 2, '2020-03-14 22:16:39'),
(10, 12000, 'zseiko2.png', 'zseiko2.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'SE-5G7J', 3, 2, '2020-03-14 22:19:47'),
(11, 44000, 'sesta1.png', 'sesta1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'CA-K7OP', 1, 1, '2020-03-14 22:19:47'),
(12, 48000, 'zcasio3.png', 'zcasio3.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'CA-8I90P', 1, 2, '2020-03-14 22:22:46'),
(13, 44000, 'mtisot1.png', 'mtisot1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'TI-238', 4, 1, '2020-03-22 21:51:07'),
(14, 37000, 'mtisot2.png', 'mtisot2.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'TI-234', 4, 1, '2020-03-22 21:51:07'),
(15, 34000, 'ztisot1.png', 'ztisot1.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'TI-Z432', 4, 2, '2020-03-22 21:59:46'),
(16, 23000, '1584914948malaztisot2.png', 'velika1584914948malaztisot2.png', 'Bela,Siva,16 mm,Resin,2 godine,49 mm,200 metara,Kvarcni,Resin', 'TI-230O', 4, 2, '2020-03-22 22:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `iduloga` int(11) NOT NULL,
  `naziv` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`iduloga`, `naziv`) VALUES
(4, 'Admin'),
(5, 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`idkomentar`),
  ADD KEY `idkorisnik` (`idkorisnik`),
  ADD KEY `idproizvod` (`idproizvod`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `iduloga` (`iduloga`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idkorpa`),
  ADD KEY `idkorisnik` (`idkorisnik`),
  ADD KEY `idproizvod` (`idproizvod`);

--
-- Indexes for table `marke`
--
ALTER TABLE `marke`
  ADD PRIMARY KEY (`idmarka`);

--
-- Indexes for table `ocenjivanje`
--
ALTER TABLE `ocenjivanje`
  ADD PRIMARY KEY (`idocene`),
  ADD KEY `idkorisnik` (`idkorisnik`),
  ADD KEY `idproizvod` (`idproizvod`);

--
-- Indexes for table `pol`
--
ALTER TABLE `pol`
  ADD PRIMARY KEY (`idpol`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`idproizvod`),
  ADD KEY `idmarka` (`idmarka`),
  ADD KEY `idpol` (`idpol`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`iduloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `idkomentar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkorisnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idkorpa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `marke`
--
ALTER TABLE `marke`
  MODIFY `idmarka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ocenjivanje`
--
ALTER TABLE `ocenjivanje`
  MODIFY `idocene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pol`
--
ALTER TABLE `pol`
  MODIFY `idpol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `idproizvod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `iduloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnici` (`idkorisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`idproizvod`) REFERENCES `proizvodi` (`idproizvod`) ON DELETE CASCADE;

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`iduloga`) REFERENCES `uloge` (`iduloga`);

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`idproizvod`) REFERENCES `proizvodi` (`idproizvod`) ON DELETE CASCADE,
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnici` (`idkorisnik`) ON DELETE CASCADE;

--
-- Constraints for table `ocenjivanje`
--
ALTER TABLE `ocenjivanje`
  ADD CONSTRAINT `ocenjivanje_ibfk_1` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnici` (`idkorisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `ocenjivanje_ibfk_2` FOREIGN KEY (`idproizvod`) REFERENCES `proizvodi` (`idproizvod`) ON DELETE CASCADE;

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idpol`) REFERENCES `pol` (`idpol`) ON DELETE CASCADE,
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`idmarka`) REFERENCES `marke` (`idmarka`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
