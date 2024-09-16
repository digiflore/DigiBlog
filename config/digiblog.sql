-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 sep. 2024 à 12:52
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `digiblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `dg_comment`
--

DROP TABLE IF EXISTS `dg_comment`;
CREATE TABLE IF NOT EXISTS `dg_comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `author` varchar(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `dg_comment`
--

INSERT INTO `dg_comment` (`id`, `post_id`, `author`, `mail`, `comment`, `comment_date`) VALUES
(1, 1, 'Mathieu', '', 'Premier commentaire ! Bienvenue et bon courage pour la suite.', '2022-03-03 13:00:42'),
(2, 1, 'Sam', '', 'Hâte de voir comment ce blog évolue !', '2024-09-08 13:01:42'),
(3, 1, 'moi', '', 'C\'est super !', '2024-09-03 16:46:28'),
(4, 2, 'Moi', '', 'Bon courage à toi !\r\n', '2024-09-11 00:19:07'),
(12, 1, 'cc', 'cc', 'ccc', '2024-09-15 10:45:07'),
(13, 1, 'cc', 'cc', 'ccc', '2024-09-15 10:45:59'),
(14, 1, 'cc', 'cc', 'ccc', '2024-09-15 10:48:57'),
(15, 1, 'cc', 'cc', 'ccc', '2024-09-15 10:49:05'),
(16, 2, 'd', 'd', 'Super\r\n', '2024-09-15 10:51:03'),
(17, 2, 'd', 'd', 'Super\r\n', '2024-09-15 10:51:54'),
(18, 2, 'd', 'd', 'Super\r\n', '2024-09-15 10:52:52'),
(19, 2, 'd', 'd', 'Super\r\n', '2024-09-15 10:53:15'),
(20, 2, 'd', 'd', 'Super\r\n', '2024-09-15 10:53:44'),
(21, 2, 'd', 'd', 'Super\r\n', '2024-09-15 10:53:52'),
(22, 2, 'd', 'd', 'cccc', '2024-09-15 10:54:05'),
(23, 2, 'd', 'd', 'xxcxcx', '2024-09-15 10:55:39'),
(24, 2, 'd', 'd', 'xxcxcx', '2024-09-15 10:56:25'),
(25, 2, 'c', 'c', 'cswwscw', '2024-09-15 10:56:33'),
(26, 2, 'ccc', 'ccc', 'ccc', '2024-09-15 11:52:36'),
(27, 2, 'c', 'c', 'cccc', '2024-09-16 09:35:26'),
(28, 2, 'c', 'c', 'cccc', '2024-09-16 14:16:55'),
(29, 2, 'c', 'c', 'cccc', '2024-09-16 14:16:59'),
(30, 2, 'dc', 'd', 'd', '2024-09-16 14:17:08'),
(31, 2, 'dc', 'd', 'd', '2024-09-16 14:18:21'),
(32, 2, 'dc', 'd', 'd', '2024-09-16 14:19:44'),
(33, 2, 'sss', 'ssss', 'ssss', '2024-09-16 14:20:45'),
(34, 2, 'dddd', 'ddd', 'ddd', '2024-09-16 14:21:38'),
(35, 2, 'c', 'c', 'cccc', '2024-09-16 14:46:45');

-- --------------------------------------------------------

--
-- Structure de la table `dg_post`
--

DROP TABLE IF EXISTS `dg_post`;
CREATE TABLE IF NOT EXISTS `dg_post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `dg_post`
--

INSERT INTO `dg_post` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur Digiblog !', 'Je vous souhaite à toutes et à tous la bienvenue sur le blog de DigiFlore, Digiblog !\r\nCe blog est conçu en MVC PHP et est en évolution permanente.\r\nIl répondra je l\'espère à vos besoins les plus fou.', '2024-09-08 16:28:41'),
(2, 'Comment à débuter Digiblog ?', 'Digiblog à débuter d\'une volonté de m\'améliorer dans les outils informatiques. Ingénieur en développement informatique, je cherche à me perfectionner dans les outils actuelles. Et créer un blog est un gros défi pour moi.', '2024-09-11 16:28:42');

-- --------------------------------------------------------

--
-- Structure de la table `dg_right`
--

DROP TABLE IF EXISTS `dg_right`;
CREATE TABLE IF NOT EXISTS `dg_right` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dg_right`
--

INSERT INTO `dg_right` (`id`, `name`) VALUES
(1, 'DG_ADMIN'),
(2, 'DG_WRITER'),
(3, 'DG_USER');

-- --------------------------------------------------------

--
-- Structure de la table `dg_user`
--

DROP TABLE IF EXISTS `dg_user`;
CREATE TABLE IF NOT EXISTS `dg_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rights_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rights_id` (`rights_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dg_user`
--

INSERT INTO `dg_user` (`id`, `firstname`, `lastname`, `password`, `mail`, `username`, `rights_id`) VALUES
(1, 'flore', '', '0', 'flore@gmail.com', '0', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
