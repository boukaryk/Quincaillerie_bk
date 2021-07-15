-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 10:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- <div class="input-group-prepend">
--   <span class="input-group-text"><i class="fas fa-lock"></i></span>
--  </div>

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `materiel`
--

-- --------------------------------------------------------

--
-- Table structure for table `acheter`
--

CREATE TABLE IF NOT EXISTS `acheter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `acheter`
--

INSERT INTO `acheter` (`id`, `link`, `price`, `name`, `categorie`) VALUES
(27, 'bouette.jpg', '', 'brouette', 'brouette'),
(28, 'brouette1.jpg', '', 'brouette', 'brouette'),
(29, 'peinture (1).jpg', '', 'Peinture', 'peinture'),
(30, 'peinture (4).jpg', '', 'Peinture', 'peinture'),
(31, 'pienture 5kg (2).jpg', '', 'Peinture', 'peinture'),
(32, 'peinture (11).jpg', '', 'Peinture', 'peinture'),
(33, 'peintures.jpg', '', 'Peinture', 'peinture'),
(34, 'carreau (2).jpg', '', 'Carreau', 'carreaux'),
(35, 'carreau (4).jpg', '', 'Carreau', 'carreaux'),
(36, 'carreau (6).jpg', '', 'Carreau', 'carreaux'),
(37, 'carreau (6).jpg', '', 'Carreau', 'carreaux'),
(38, 'carreau.jpg', '', 'Carreau', 'carreaux'),
(39, 'Carreau4.jpg', '', 'Carreau', 'carreaux'),
(40, 'CimeFaso.png', '', 'Ciment Du Faso', 'ciment'),
(41, 'Cimentjaune.jpg', '', 'Ciment Jaune', 'ciment'),
(42, 'decor1.jpg', '', 'Decoratif', 'fer'),
(43, 'decor3.jpg', '', 'Decoratif', 'fer'),
(44, 'decore2.jpg', '', 'Decoratif', 'fer'),
(45, 'conniere.jpg', '', 'Conniere.', 'fer'),
(46, 'cornier de 40.jpg', '', 'Cornier de 40', 'fer'),
(47, 'tourne_fer.jpg', '', 'Tourne_fer', 'fer'),
(48, 'tube  rond de  60 lege.jpg', '', 'Tube  rond 60 ', 'fer'),
(49, 'tube carre de 20 lourd.jpg', '', 'Tube carre de 20 ', 'fer'),
(50, 'tube carre de 25.jpg', '', 'Tube carre de 25', 'fer'),
(51, 'tube carre de 30.jpg', '', 'Tube carre de 30', 'fer'),
(52, 'tube carre de 60 (2).jpg', '', 'Tube carre de 60 ', 'fer'),
(53, 'tube de 30 lourd.jpg', '', 'Tube de 30 lourd', 'fer'),
(54, 'tube de 30.jpg', '', 'Tube de 30', 'fer'),
(55, 'tube gava de 60.jpg', '', 'Tube gava de 60', 'fer'),
(56, 'tube rectangulaire 40 60.jpg', '', 'tube rectangulaire', 'fer'),
(57, 'tube rectangulaire lourd.jpg', '', 'Tube rectangulaire lourd', 'fer'),
(58, 'tube rond de 40 lourd.jpg', '', 'Tube rond 40 lourd', 'fer'),
(59, 'tube-gorge 16.jpg.jpg', '', 'tube-gorge16', 'tole'),
(60, 'u  de vitre.jpg', '', 'U de vitre', 'fer'),
(61, 'u_d_40.jpg', '', 'U_de_40', 'fer'),
(62, 'z d 0.jpg', '', 'Z de 40', 'fer'),
(63, 'z d 45.jpg', '', 'Z de 45', 'fer'),
(64, 'z h  lourd.jpg', '', 'Z   lourd', 'fer'),
(65, 'tenaille.jpg', '', 'Tenaille', 'fer'),
(66, 'rouelle.jpg', '', 'Rouelle', 'fer'),
(67, 'serrure_canon (2).jpg', '', 'Serrure_canon ', 'serure'),
(68, 'serrure_vachette (2).jpg', '', 'Serrure_vachette', 'serure'),
(69, 'serure.jpg', '', 'Serure', 'serure'),
(70, 'serure (2).jpg', '', 'Serure ', 'serure'),
(71, 'sofli_cle.jpg', '', 'Sofli_cle', 'serure'),
(72, 'rateau.jpg', '', 'Rateau', 'fer'),
(73, 'pointe_8.jpg', '', 'Pointe', 'fer'),
(74, 'pomelle_100.jpg', '', 'Pomelle', 'serure'),
(75, 'pomelle1.jpg', '', 'Pomelle', 'serure'),
(76, 'huile.jpg', '', 'Huile', 'peinture'),
(77, 'mettre.jpg', '', 'Mettre', 'serure'),
(78, 'peinture (1).jpg', '', 'Peinture', 'peinture'),
(81, 'tole-prelaque (7).jpg', '', 'tole prelaque-rouge', 'tole'),
(84, 'tole-prelaque (2).jpg', '', 'tole-prelaque-bleu', 'tole'),
(86, 'tole-profel (1).jpg', '', 'tole-aluzinc 1er', 'tole'),
(87, 'tole-prelaque (5).jpg', '', 'tole-prelaque-vert', 'tole'),
(89, 'rose.jpg', '', 'tole-prelaque-orange', 'tole'),
(91, 'peinture (1).jpg', '', 'Anti-rouille 5kg', 'peinture'),
(92, 'peinture (1).jpg', '', 'Peinture', 'peinture'),
(93, 'peinture (11).jpg', '', 'Peinture', 'peinture'),
(94, 'peinture (11).jpg', '', 'Peinture', 'peinture'),
(95, 'peinture (5).jpg', '', 'Pienture', 'peinture'),
(96, 'peinture (5).jpg', '', 'Pienture', 'peinture'),
(97, 'Cable.jpg', '', 'Cable Electrique', 'cable'),
(98, 'CIMFASO.jpg', '', 'CIMFASO', 'ciment'),
(99, 'fer attache (1).jpg', '', 'Fer d''attache', 'cable'),
(100, 'fil_1.5_2.5.jpg', '', 'Fil 1/5 et 2/5', 'cable'),
(101, 'pigace.jpg', '', 'Pigace', 'fer'),
(102, 'racor1_d''eau.jpg', '', 'Racord d''eau', 'cable'),
(103, 'CIMBURKINA.jpg', '', 'CIMBURKINA', 'ciment'),
(104, 'ciment blanc.jpg', '', 'Ciment blanc', 'ciment'),
(105, 'peintures.jpg', '', 'peinture', 'peinture');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `prenom`, `motif`, `commentaire`) VALUES
(55, 'nana', 'jeremie', 'commande', 'livraison a domicile'),
(56, 'brouette', '', 'll', 'lllll'),
(57, 'nana', 'jeremie', 'commande de matÃ©riel', 'Je veus des matÃ©riels'),
(58, 'Kabore Boukary', '', 'Rechercher d''emploi', ' Pouvez-vous m''employer dans votre entreprise?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
