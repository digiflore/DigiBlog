-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 sep. 2024 à 04:46
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
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `author` varchar(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `mail`, `comment`, `comment_date`) VALUES
(1, 1, 'Mathieu', '', 'Premier commentaire ! Bienvenue et bon courage pour la suite.', '2022-03-03 13:00:42'),
(2, 1, 'Sam', '', 'Hâte de voir comment ce blog évolue !', '2024-09-08 13:01:42'),
(3, 1, 'moi', '', 'C\'est super !', '2024-09-03 16:46:28'),
(4, 2, 'Moi', '', 'Bon courage !\r\n', '2024-09-11 00:19:07');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur Digiblog !', 'Je vous souhaite à toutes et à tous la bienvenue sur le blog de DigiFlore, Digiblog !\r\nCe blog est conçu en MVC PHP et est en évolution permanente.\r\nIl répondra je l\'espère à vos besoins les plus fou.', '2024-09-08 16:28:41'),
(2, 'Comment à débuter Digiblog ?', 'Digiblog à débuter d\'une volonté de m\'améliorer dans les outils informatiques. Ingénieur en développement informatique, je cherche à me perfectionner dans les outils actuelles. Et créer un blog est un gros défi pour moi.', '2024-09-11 16:28:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
