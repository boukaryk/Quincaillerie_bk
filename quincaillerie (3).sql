-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2021 at 05:38 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quincaillerie`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CATEGORIE` int NOT NULL AUTO_INCREMENT,
  `TYPE_CATEGORIE` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIE`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIE`, `TYPE_CATEGORIE`) VALUES
(1, 'FER A SOUDER'),
(2, 'FER A BETON'),
(3, 'CIMENT'),
(4, 'DEVERS'),
(5, 'PEINTURE'),
(6, 'CARREAU'),
(7, 'TOLE'),
(8, 'CABLE'),
(9, 'BROUETTE'),
(10, 'DECOURATIF'),
(11, 'SERRURE');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_CLIENT` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `STATUS_CLIENT` varchar(70) DEFAULT NULL,
  `NOM_CLIENT` varchar(50) DEFAULT NULL,
  `PRENOM_CLIENT` varchar(50) DEFAULT NULL,
  `EMAIL_CLIENT` varchar(20) DEFAULT NULL,
  `VILLE_CLIENT` varchar(50) DEFAULT NULL,
  `SECTEUR_CLIENT` varchar(50) DEFAULT NULL,
  `CNIB_CLIENT` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENT`),
  KEY `FK_ETRE` (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID_COMMANDE` int NOT NULL AUTO_INCREMENT,
  `ID_QUINCAILLERIE` int NOT NULL,
  `ID_CLIENT` varchar(7) NOT NULL,
  `QUANTITE` int DEFAULT NULL,
  `DATE_ENREGISTREMENT` date DEFAULT NULL,
  `STATUS_COMMANDE` varchar(20) DEFAULT NULL,
  `SOMME_VERSE` int DEFAULT NULL,
  `CODE_COMMANDE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_COMMANDE`),
  KEY `FK_RECEVIOR` (`ID_QUINCAILLERIE`),
  KEY `FK_LANCER` (`ID_CLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `ID_COMMANDER` int NOT NULL AUTO_INCREMENT,
  `ID_MATERIEL` int NOT NULL,
  `ID_COMMANDE` int NOT NULL,
  `PRIX_UNITAIRE` int DEFAULT NULL,
  `QUANTITE` int DEFAULT NULL,
  PRIMARY KEY (`ID_COMMANDER`),
  KEY `FK_COMMANDER_COMMANDE_COMMANDER` (`ID_COMMANDE`),
  KEY `FK_COMMANDER_MATERIEL_COMMANDER` (`ID_MATERIEL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ID_CONTACT` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int DEFAULT NULL,
  `NOM_COMPLET` varchar(70) DEFAULT NULL,
  `EMAIL` varchar(20) DEFAULT NULL,
  `MOTIF` varchar(70) DEFAULT NULL,
  `MESSAGE` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`ID_CONTACT`),
  KEY `FK_PEUT_CONTACTER` (`ID_USER`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID_CONTACT`, `ID_USER`, `NOM_COMPLET`, `EMAIL`, `MOTIF`, `MESSAGE`) VALUES
(1, 1, 'nana Jeremie', 'nana@gmail.com', 'commande', 'livraison a domicile'),
(2, 2, 'Bouda Raissa', 'br@gmail.com', 'livraison', 'Je souhaite la livraison de mes materiels'),
(3, 3, 'nana Sylvain', 'sylvain@gmail.com', 'commande de matÃ©riel', 'Je veus des matÃ©riels'),
(4, 4, 'Kabore Boukary', 'bk@gmail.com', 'Rechercher d\'emploi', ' Pouvez-vous m\'employer dans votre entreprise?'),
(5, 5, 'BK KABORE', 'bkk@gmail.com', 'email error', 'Need Help');

-- --------------------------------------------------------

--
-- Table structure for table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `ID_MATERIEL` int NOT NULL AUTO_INCREMENT,
  `ID_QUINCAILLERIE` varchar(7) NOT NULL,
  `ID_CATEGORIE` int NOT NULL,
  `NOM_MATERIEL` varchar(70) DEFAULT NULL,
  `QANTITE` int NOT NULL,
  `PRIX_REDUIT` int DEFAULT NULL,
  `PRIX_HOMOLOGUE` int DEFAULT NULL,
  `LINK` varchar(256) DEFAULT NULL,
  `DATE_ENREGISTREMENT` date DEFAULT NULL,
  PRIMARY KEY (`ID_MATERIEL`),
  KEY `FK_AVOIR` (`ID_QUINCAILLERIE`),
  KEY `FK_APPARTENIR` (`ID_CATEGORIE`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materiel`
--

INSERT INTO `materiel` (`ID_MATERIEL`, `ID_QUINCAILLERIE`, `ID_CATEGORIE`, `NOM_MATERIEL`, `QANTITE`, `PRIX_REDUIT`, `PRIX_HOMOLOGUE`, `LINK`, `DATE_ENREGISTREMENT`) VALUES
(87, 'QB00001', 3, 'Cimment blanc', 20, 6000, 6250, 'ciment-blanc.jpg', '0000-00-00'),
(86, 'QB00001', 4, 'ciseau', 14, 1000, 1200, 'ciseau.jpg', '0000-00-00'),
(85, 'QB00001', 11, 'cle', 190, 700, 750, 'cle (1).jpg', '0000-00-00'),
(84, 'QB00001', 11, 'cle', 200, 600, 6500, 'cle (2).jpg', '0000-00-00'),
(83, 'QB00001', 4, 'Disque a couper', 30, 1500, 1600, 'disque.jpg', '0000-00-00'),
(82, 'QB00001', 4, 'essier', 52, 12000, 12500, 'essier.jpg', '0000-00-00'),
(81, 'QB00001', 6, 'carreau', 63, 6250, 6500, 'face3.jpg', '0000-00-00'),
(80, 'QB00001', 2, 'fer de 8', 25, 2000, 2100, 'Fer de 8 1.jpg', '0000-00-00'),
(70, 'QB00001', 2, 'fer de 12', 36, 3100, 3200, 'fer 12 2eme (2).jpg', '0000-00-00'),
(69, 'QB00001', 2, 'fer de 16', 0, 13000, 13500, 'fer 16.jpg', '0000-00-00'),
(68, 'QB00001', 4, 'Fer d\'attache', 0, 1750, 1800, 'fer attache (1).jpg', '0000-00-00'),
(67, 'QB00001', 4, 'roue et essier', 0, 29000, 30000, 'fer attache (3).jpg', '0000-00-00'),
(66, 'QB00001', 1, 'tube care de 50', 0, 7500, 7750, 'fer -soude (1).jpg', '0000-00-00'),
(65, 'QB00001', 1, 'Z H double', 0, 15000, 16000, 'fer -soude (2).jpg', '0000-00-00'),
(64, 'QB00001', 10, 'decoratif', 0, 250, 275, 'fer_de_decoration (2).jpg', '0000-00-00'),
(63, 'QB00001', 10, 'decoratif', 0, 200, 225, 'fer_de_decoration.jpg', '0000-00-00'),
(62, 'QB00001', 1, 'tube ronde de 30', 0, 3000, 3500, 'fer-soude (6).jpg', '0000-00-00'),
(61, 'QB00001', 1, 'tube de 40/60', 0, 3750, 4000, 'fer-soude (11).jpg', '0000-00-00'),
(60, 'QB00001', 1, 'Z H double', 0, 16000, 16500, 'fer-soude (13).jpg', '0000-00-00'),
(59, 'QB00001', 4, 'fil 1.5/2.5', 0, 6500, 6750, 'fils_1.5_2.5 (1).jpg', '0000-00-00'),
(118, 'QB00001', 2, 'Iron of 14', 0, 11000, 12000, 'fer 14 1.jpg', '0000-00-00'),
(57, 'QB00001', 1, 'Tube de 40', 0, 7000, 8000, 'tube carre 40', '0000-00-00'),
(56, 'QB00001', 1, 'Tube 40/80', 0, 4500, 5000, 'IMG_20190711_143904_6.jpg', '0000-00-00'),
(119, 'QB00001', 1, 'U of 40', 0, 3000, 3100, 'u de 40.jpg', '0000-00-00'),
(54, 'QB00001', 1, 'Tube ronde de 60', 0, 9000, 9500, 'IMG_20190711_145122_7.jpg', '0000-00-00'),
(53, 'QB00001', 1, 'U vitre', 0, 6250, 6500, 'IMG_20190711_145145_0.jpg', '0000-00-00'),
(52, 'QB00001', 7, 'Tole de 8', 0, 6500, 6700, 'IMG_20190711_150052_4.jpg', '0000-00-00'),
(51, 'QB00001', 4, 'Marteau', 0, 1500, 1700, 'IMG_20190711_170055_7.jpg', '0000-00-00'),
(49, 'QB00001', 4, 'Cesaille', 0, 4000, 4500, 'IMG_20190711_170114_2.jpg', '0000-00-00'),
(48, 'QB00001', 5, 'Huile', 0, 1600, 1700, 'IMG_20190711_170253_4.jpg', '0000-00-00'),
(46, 'QB00001', 1, 'Lame de 8', 0, 3000, 3100, 'lame_de_7 (2).jpg', '0000-00-00'),
(45, 'QB00001', 4, 'Mettre', 0, 550, 650, 'mettre.jpg', '0000-00-00'),
(44, 'QB00001', 5, 'Peinture', 0, 5500, 6000, 'peinture (1).jpg', '0000-00-00'),
(43, 'QB00001', 5, 'Peinture', 0, 15000, 16000, 'peinture (2).jpg', '0000-00-00'),
(42, 'QB00001', 5, 'Peinture', 0, 5250, 6250, 'peinture (3).jpg', '0000-00-00'),
(41, 'QB00001', 5, 'Peinture', 0, 8250, 8500, 'peinture (4).jpg', '0000-00-00'),
(40, 'QB00001', 5, 'Peinture', 0, 8000, 8500, 'peinture (5).jpg', '0000-00-00'),
(39, 'QB00001', 5, 'peinture 1kg', 0, 1200, 1000, 'peinture (6).jpg', '0000-00-00'),
(38, 'QB00001', 5, 'Pienture 5kg', 0, 5000, 6000, 'peinture (7).jpg', '0000-00-00'),
(37, 'QB00001', 5, 'Pienture fom', 0, 800, 8500, 'peinture (10).jpg', '0000-00-00'),
(36, 'QB00001', 5, 'Pienture', 0, 7500, 8000, 'peinture (11).jpg', '0000-00-00'),
(35, 'QB00001', 4, 'Balance', 0, 3000, 3500, 'pesoire (1).jpg', '0000-00-00'),
(34, 'QB00001', 4, 'Pigace', 0, 1000, 1100, 'pigace (1).jpg', '0000-00-00'),
(33, 'QB00001', 4, 'pointe', 0, 750, 800, 'Pointe .jpg', '0000-00-00'),
(32, 'QB00001', 4, 'Pomelle de 100', 0, 3500, 3700, 'pomelle_de_100 (1).jpg', '0000-00-00'),
(31, 'QB00001', 4, 'Pomelle de 100', 0, 3500, 3700, 'pommelle_100 (2).jpg', '0000-00-00'),
(30, 'QB00001', 4, 'Pomelle de 80', 0, 1800, 1900, 'pommelle_de_80.jpg', '0000-00-00'),
(29, 'QB00001', 4, 'Raccord d\'eau', 0, 16000, 16250, 'Racor_d\'eau.jpg', '0000-00-00'),
(28, 'QB00001', 4, 'Rateau', 0, 1200, 1300, 'rateau (2).jpg', '0000-00-00'),
(27, 'QB00001', 4, 'Reglette', 0, 1500, 1600, 'Reglette.jpg', '0000-00-00'),
(26, 'QB00001', 9, 'Broutte', 0, 16500, 17000, 'Bouette1.jpg', '2021-06-08'),
(25, 'QB00001', 9, 'Brouette', 0, 17000, 18500, 'Bouette.jpg', '2021-06-08'),
(24, 'QB00001', 6, 'CARREAU', 0, 6500, 6900, 'carreau (4).jpg', '2021-06-08'),
(23, 'QB00001', 3, 'CPJ 45', 0, 6250, 6500, 'CIMAF.jpg', '2021-06-08'),
(22, 'QB00001', 3, 'CPA 45', 0, 6000, 6500, 'CIMENT_DU_BURKINA.jpg', '2021-06-08'),
(121, 'QB00001', 11, 'concret iron', 0, 9000, 9500, 'fer-soude (11).jpg', '0000-00-00'),
(17, 'QB00001', 6, 'Carreau', 0, 6000, 6250, 'face3.jpg', '2021-06-08'),
(13, 'QB00001', 7, 'Tole Aluzinc', 0, 2000, 2200, 'blanc.jpg', '2021-06-08'),
(12, 'QB00001', 4, 'Baguette', 0, 1000, 1100, 'baguette.jpg', '2021-06-08'),
(11, 'QB00001', 1, 'Tube care de 60', 0, 9500, 10000, 'tube_carre_de_60.jpg', '0000-00-00'),
(10, 'QB00001', 4, 'Tube gorge de 16', 0, 16000, 17000, 'tube_gorge_16 (3).jpg', '0000-00-00'),
(9, 'QB00001', 4, 'Tube gorger de 25', 0, 25000, 26000, 'tube-gorge 25.jpg', '0000-00-00'),
(8, 'QB00001', 1, 'Inegal', 0, 3000, 3100, 'z_de_40_et_inegal.jpg', '0000-00-00'),
(7, 'QB00001', 4, 'Essier', 0, 22500, 22500, 'essier.jpg', '2021-05-29'),
(120, 'QB00001', 3, 'CIMBURKINA', 0, 5500, 6000, 'CIMENT.jpg', '2021-06-08'),
(91, 'QB00001', 6, 'Carreau', 0, 6500, 6750, 'carreau (6).jpg', '0000-00-00'),
(93, 'QB00001', 6, 'Carreau', 0, 6500, 6750, 'careaux (8).jpg', '0000-00-00'),
(94, 'QB00001', 8, 'cable electrique', 0, 7500, 8000, 'cable.jpg', '0000-00-00'),
(95, 'QB00001', 9, 'Bourette', 0, 1500, 1600, 'bourette.jpg', '0000-00-00'),
(96, 'QB00001', 9, 'Bourette', 0, 1500, 1600, 'Bouette1.jpg', '0000-00-00'),
(97, 'QB00001', 9, 'Bourette', 0, 16500, 17000, 'Bouette.jpg', '0000-00-00'),
(98, 'QB00001', 4, 'Boite de derivation', 0, 150, 200, 'boite_de_derivatio (3).jpg', '0000-00-00'),
(99, 'QB00001', 4, 'Boitier', 0, 500, 600, 'boite (3).jpg', '0000-00-00'),
(113, 'QB00001', 5, 'peinture', 0, 3000, 3250, 'tole (12).jpg', '0000-00-00'),
(100, 'QB00001', 4, 'TILE', 0, 5750, 6500, 'carreau (4).jpg', '0000-00-00'),
(128, 'QB0008', 2, 'Fer de 6', 0, 1600, 1700, 'fer de 6.jpg', '2021-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `quincaillerie`
--

DROP TABLE IF EXISTS `quincaillerie`;
CREATE TABLE IF NOT EXISTS `quincaillerie` (
  `ID_QUINCAILLERIE` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_QUINCAILLERIER` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NOM_QUINCAILLERIE` varchar(70) NOT NULL,
  `VILLE_QUINCAILLERIE` varchar(70) DEFAULT NULL,
  `SECTEUR_QUINCAILLERIE` varchar(70) DEFAULT NULL,
  `IMAGE_QUINC` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `STATUS_QUINC` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_QUINCAILLERIE`),
  KEY `FK_POSSERDER` (`ID_QUINCAILLERIER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quincaillerie`
--

INSERT INTO `quincaillerie` (`ID_QUINCAILLERIE`, `ID_QUINCAILLERIER`, `NOM_QUINCAILLERIE`, `VILLE_QUINCAILLERIE`, `SECTEUR_QUINCAILLERIE`, `IMAGE_QUINC`, `STATUS_QUINC`) VALUES
('QB00018', 'QB00015', 'Mini Quincaillerie 3', 'BOBO', '10', 'face2', 'Enable'),
('QB00017', 'QB00014', 'Quincaillerie 6', 'BOBO', '6', 'fer attache (1)', 'Enable'),
('QB00016', 'QB00013', 'Quincaillerie 5', 'BOBO', '9', 'CIMENT', 'Enable'),
('QB00015', 'QB00012', 'Quincaillerie 4', 'BOBO', '4', 'peinture (2)', 'Enable'),
('QB00014', 'QB00011', 'Quincaillerie 3', 'BOBO', '3', 'tube-gorge 25', 'Enable'),
('QB0009', 'QB00010', 'Quincaillerie 2', 'Koudougou', '6', 'tole (12)', 'Disable'),
('QB0008', 'QB00009', 'Quincaillerie Wend Pouloum Noog Be Ziir N 2', 'Koudougou', '8', 'QWPNB', 'Enable'),
('QB00010', 'QB00008', 'Mini Quincaillerie 2', 'Koudougou', '2\r\n', 'IMG_20190711_144925_1', 'Enable'),
('QB00007', 'QB00007', 'Mini Quincaillerie 1', 'Koudougou', '5', 'fer-soude (10)', 'Disable'),
('QB00006', 'QB00006', 'Quincaillerie Wend Kouni', 'Koudougou', '1', 'fer-soude (11)', 'Enable'),
('QB00005', 'QB00005', 'Mini Quincaillerie KABORE & FRERE', 'Koudougou', '10', 'fer -soude (1)', 'Enable'),
('QB00004', 'QB00004', 'Quincaillerie Boud Nooma', 'Koudougou', '7', 'carreau (5)', 'Disable'),
('QB00003', 'QB00003', 'Quincaillerie Wend Raab', 'Koudougou', '9', 'Fer de 8 1', 'Enable'),
('QB00002', 'QB00002', 'Quincaillerie Mouni', 'Koudougou', '4', 'fils_1.5_2.5 (1)', 'Enable'),
('QB00001', 'QB00001', 'Quincaillerie Wend Pouloum Noog Be Ziir N1', 'Koudougou', '3', 'boutique.jpg', 'Enable'),
('QB00019', 'QB00016', 'Quincaillerie 7', 'BOBO', '1', 'fer -soude (2)', 'Enable'),
('QB00020', 'QB00017', 'Mini Quincaillerie 4', 'BOBO', '5', 'peinture (11)', 'Enable'),
('QB00011', 'QB00018', 'Mini Quincaillerie 5', 'BOBO', '2', 'peinture (1)', 'Disable'),
('QB00012', 'QB00019', 'Mini Quincaillerie 6', 'BOBO', '8', 'pomelle_de_100 (1)', 'enable'),
('QB00013', 'QB00020', 'Mini Quincaillerie 7', 'BOBO', '7', 'Bouette', 'Disable'),
('QB00021', 'QB00021', 'Quincaillerie 3', 'Ouagadougou', '3', 'CIMAF', 'Disable'),
('QB00022', 'QB00022', 'Quincaillerie 4', 'Ouagadougou', '4', 'boite (3)', 'Enable'),
('QB00023', 'QB00023', 'Quincaillerie 5', 'Ouagadougou', '9', 'essier', 'Enable'),
('QB00024', 'QB00024', 'Quincaillerie 6', 'Ouagadougou', '6', 'ciseau', 'Enable'),
('QB00025', 'QB00025', 'Mini Quincaillerie 3', 'Ouagadougou', '10', 'ciment_remorques', 'Enable'),
('QB00026', 'QB00026', 'Quincaillerie 7', 'Ouagadougou', '1', 'fer_de_decoration (1)', 'Enable'),
('QB00027', 'QB00027', 'Mini Quincaillerie 4', 'Ouagadougou', '5', 'Fer de 8 1', 'enable'),
('QB00028', 'QB00028', 'Mini Quincaillerie 5', 'Ouagadougou', '2', 'z_de_40_et_inegal', 'Enable'),
('QB00029', 'QB00029', 'Mini Quincaillerie 6', 'Ouagadougou', '8', 'tenaille', 'enable'),
('QB00030', 'QB00030', 'Mini Quincaillerie 7', 'Ouagadougou', '7', 'IMG_20190703_115744_7', 'Enable'),
('QB00106', 'QB00106', 'Quincaillerie Wende Kouni', 'koudougou', '8', 'Bouette (1).jpg', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `quincaillerier`
--

DROP TABLE IF EXISTS `quincaillerier`;
CREATE TABLE IF NOT EXISTS `quincaillerier` (
  `ID_QUINCAILLERIER` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `NOM_QUINC` varchar(50) DEFAULT NULL,
  `PRENOM_QUINC` varchar(50) DEFAULT NULL,
  `EMAIL_QUINC` varchar(20) DEFAULT NULL,
  `TELEPHONE_QUINC` int DEFAULT NULL,
  `VILL_QINC` varchar(50) DEFAULT NULL,
  `SECTEUR_QUINC` varchar(50) DEFAULT NULL,
  `CNIB` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`ID_QUINCAILLERIER`),
  KEY `FK_PEUT_ETRE` (`ID_USER`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quincaillerier`
--

INSERT INTO `quincaillerier` (`ID_QUINCAILLERIER`, `ID_USER`, `NOM_QUINC`, `PRENOM_QUINC`, `EMAIL_QUINC`, `TELEPHONE_QUINC`, `VILL_QINC`, `SECTEUR_QUINC`, `CNIB`) VALUES
(1, 1, 'KABORE', 'Boukary', 'boukary757@gmail.com', 75223016, 'Koudougou', '10', 'B9517300'),
(2, 2, 'KABORE', 'Robert', 'robert@gmail.com', 73333016, 'Koudougou', '10', 'B9512100');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `RIGHTS` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PWD` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `USER_NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PROFIL` varchar(250) DEFAULT NULL,
  `USER_STATUS` varchar(8) DEFAULT NULL,
  `FIRST_NAME` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LAST_NAME` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SECTOR` int NOT NULL,
  `CITY` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PHONE` int NOT NULL,
  `CNIB` varchar(10) NOT NULL,
  `USER_CODE` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_USER`, `RIGHTS`, `PWD`, `USER_NAME`, `PROFIL`, `USER_STATUS`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `SECTOR`, `CITY`, `PHONE`, `CNIB`, `USER_CODE`) VALUES
(1, 'ADMIN', 'ADMIN', 'ADMIN', '', 'enable', '', '', '', 0, '', 0, '', ''),
(3, 'CLIENT', 'CLIENT', 'CLIENT', '', 'enable', 'BK', 'KABORE', '', 0, '', 0, '', ''),
(72, 'ADMIN', '123456', 'Jerenana', 'Mahamadi', 'Enable', 'boite_de_derivatio (3).jpg', 'KABORE', 'bk18@gmail.com', 8, 'Dedougou', 2147483647, 'B45222', ''),
(69, 'Admin', 'BKN123', 'BK2021', 'Boukary', 'Enable', 'boite_de derivation (2).jpg', 'KABORE', 'bk@gmail.com', 12, 'KOUGOUGOU', 75236582, 'B4522', ''),
(61, 'QB00002', 'QB00002', 'QB00002', '', 'enable', 'KABORE', 'BOUKARY', '', 10, 'Koudougou', 73022562, 'B1589', 'QB00002'),
(62, 'QB00003', 'QB00003', 'QB00003', '', 'enable', 'Ymaeogo', 'Denise', 'N@gmail.com', 10, 'Dedougou', 7852562, 'B7589', 'QB00003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
