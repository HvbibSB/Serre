-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 14 juil. 2024 à 21:23
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `serre`
--
CREATE DATABASE IF NOT EXISTS `serre` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `serre`;

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `date`
--

INSERT INTO `date` (`id`, `date`, `time`) VALUES
(1, '2024-04-18', '12:14:20'),
(2, '2024-06-06', '20:17:26'),
(3, '2024-06-06', '20:17:26'),
(4, '2024-06-06', '20:17:26');

-- --------------------------------------------------------

--
-- Structure de la table `measure`
--

DROP TABLE IF EXISTS `measure`;
CREATE TABLE IF NOT EXISTS `measure` (
  `id` int NOT NULL AUTO_INCREMENT,
  `temperature` int NOT NULL,
  `hygrometry_grnd` int NOT NULL,
  `hygrometry_serre` int NOT NULL,
  `wind_speed` int NOT NULL,
  `wind_direction` varchar(20) NOT NULL,
  `id_date` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_date` (`id_date`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `measure`
--

INSERT INTO `measure` (`id`, `temperature`, `hygrometry_grnd`, `hygrometry_serre`, `wind_speed`, `wind_direction`, `id_date`) VALUES
(28, 21, 12, 30, 24, 'droite', 1),
(30, 14, 42, 16, 4, 'gauche', 2),
(31, 23, 5, 5, 12, 'gauche', 3),
(32, 43, 31, 25, 33, 'gauche', 4);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `temperature` int NOT NULL,
  `hyground` int NOT NULL,
  `hygro_serre` int NOT NULL,
  `speed` int NOT NULL,
  `direction` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `window` varchar(20) NOT NULL,
  `fan` varchar(20) NOT NULL,
  `heat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `temperature`, `hyground`, `hygro_serre`, `speed`, `direction`, `window`, `fan`, `heat`) VALUES
(19, 1, 6, 2, 5, 'gauche', 'manual', 'manual', 'manual');

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id_state` int NOT NULL AUTO_INCREMENT,
  `window` tinyint(1) NOT NULL,
  `fan` tinyint(1) NOT NULL,
  `heat` tinyint(1) NOT NULL,
  `id_date` int NOT NULL,
  PRIMARY KEY (`id_state`),
  KEY `id_date` (`id_date`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`id_state`, `window`, `fan`, `heat`, `id_date`) VALUES
(7, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `id_measure` int NOT NULL,
  `id_settings` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_measure` (`id_measure`),
  KEY `id_settings` (`id_settings`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `id_measure`, `id_settings`) VALUES
(1, 'Admin', 'btssnirjeanperrin', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
