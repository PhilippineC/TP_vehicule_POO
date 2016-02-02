-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 01 Février 2016 à 13:49
-- Version du serveur :  5.7.9-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `phpv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `immat` varchar(9) NOT NULL,
  `id_proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `marque`, `modele`, `type`, `couleur`, `immat`, `id_proprietaire`) VALUES
(1, 'Citroen', 'C3', 'voiture', 'gris', 'IO-412-SD', 5),
(2, 'Harley Davidson', 'Electra', 'moto', 'violet', 'GT-478-DC', 4),
(3, 'BMW', 'X5', 'voiture', 'bleu', 'OT-265-ML', 8),
(4, 'Citroen', 'C4', 'voiture', 'bleu', 'KI-487-QS', 9),
(5, 'Peugeot', '2008', 'voiture', 'vert', 'FG-125-ED', 6),
(6, 'Harley Davidson', 'Softail', 'moto', 'noir', 'CD-415-ER', 2),
(7, 'Peugeot', '106', 'voiture', 'noir', 'UI-985-DD', 3),
(8, 'Yamaha', 'WR125X', 'moto', 'noir', 'OL-741-EZ', 5),
(9, 'Renault', 'Scenic', 'voiture', 'blanc', 'AA-111-BB', 8),
(10, 'Renault', 'Megane', 'voiture', 'noir', 'OI-458-DE', 5),
(11, 'Kawasaki', 'KDX', 'moto', 'noir', 'UI-695-ER', 9),
(12, 'Volkswagen', 'Polo', 'voiture', 'violet', 'YU-541-MP', 6),
(13, 'FIAT', 'Punto', 'voiture', 'vert', 'SE-741-DC', 3),
(14, 'Ford', 'Fiesta', 'voiture', 'rouge', 'DF-753-SZ', 2),
(15, 'Aprilia', 'Shiver', 'moto', 'noir', 'RT-458-VB', 4),
(16, 'Yamaha', 'MT07', 'moto', 'noir', 'YU-487-SE', 7),
(17, 'Citroen', 'C2', 'voiture', 'gris', 'UI-584-LP', 5),
(18, 'Peugeot', '5008', 'voiture', 'violet', 'AZ-789-ZA', 3),
(19, 'Kawasaki', 'Z1000', 'moto', 'rouge', 'PO-789-ZE', 3),
(20, 'Citroen', 'C1', 'voiture', 'blanc', 'SS-478-AA', 6),
(21, 'Opel', 'Corsa', 'voiture', 'gris', 'HY-415-ZA', 5),
(22, 'Kawasaki', 'KXF', 'moto', 'noir', 'FR-789-AZ', 8),
(23, 'Peugeot', '206', 'voiture', 'vert', 'AB-125-KU', 9),
(24, 'Audi', 'A1', 'voiture', 'noir', 'KI-478-SS', 4),
(25, 'Peugeot', '308', 'voiture', 'bleu', 'YU-147-DD', 2),
(26, 'Renault', 'Twingo', 'voiture', 'vert', 'FT-412-RT', 4),
(27, 'Benelli', 'Tornado', 'moto', 'vert', 'PL-845-ED', 5),
(28, 'Kawasaki', 'Z750S', 'moto', 'noir', 'OP-258-ZS', 8),
(29, 'Nissan', 'Qashquai', 'voiture', 'rouge', 'OP-147-SD', 9),
(30, 'Peugeot', '3008', 'voiture', 'noir', 'EE-478-ZA', 6),
(31, 'Cagiva', 'Mito', 'moto', 'rouge', 'PO-951-DE', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
