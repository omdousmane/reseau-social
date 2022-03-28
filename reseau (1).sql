-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 mars 2022 à 10:29
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reseau`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameCat` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nameCat`) VALUES
(1, 'Sport'),
(2, 'Jeux video'),
(3, 'Fashion'),
(4, 'Cinéma'),
(5, 'Musique'),
(6, 'Nourriture');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_cmt` int(11) NOT NULL AUTO_INCREMENT,
  `idPost` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id_cmt`),
  KEY `idUser` (`idUser`),
  KEY `idPost` (`idPost`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_smg` int(11) NOT NULL AUTO_INCREMENT,
  `idDestinataire` int(11) NOT NULL,
  `idEmetteur` int(11) NOT NULL,
  `author` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id_smg`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_smg`, `idDestinataire`, `idEmetteur`, `author`, `content`, `created_at`) VALUES
(1, 0, 0, 'tgggg', 'rertgrth', '2022-03-17 00:23:03'),
(2, 0, 0, 'Diallo', 'la vie est belle', '2022-03-17 00:35:43'),
(3, 0, 0, 'Barry', 'le boss de axa', '2022-03-17 00:36:30'),
(4, 0, 0, 'yuttyh', 'rthjh', '2022-03-17 00:39:43'),
(5, 0, 0, 'Babacar', 'le con', '2022-03-17 09:42:01'),
(6, 0, 0, 'dddd', 'dddd', '2022-03-17 09:59:47'),
(7, 0, 0, '', '', '2022-03-17 10:06:24'),
(8, 0, 0, 'xx', 'xx', '2022-03-17 10:17:23'),
(9, 0, 0, 'Bobo ', 'le petit café', '2022-03-17 10:17:53'),
(10, 0, 0, 'Zeppé', 'Salut Ousmane', '2022-03-17 10:26:55'),
(11, 0, 0, 'Ousmane', 'salut Zeppé comment vas tu?', '2022-03-17 10:27:18'),
(12, 0, 0, 'Oury', 'ddddddddd', '2022-03-17 10:34:59'),
(13, 0, 0, 'Diallo', 'ffghgfbc', '2022-03-17 10:35:20'),
(14, 0, 0, 'boulbi', 'le conssssss', '2022-03-17 11:18:40'),
(15, 0, 0, 'fff', 'fff', '2022-03-17 20:11:55'),
(16, 0, 0, 'fff', 'fff', '2022-03-17 20:12:19'),
(17, 0, 0, 'diallo', '', '2022-03-17 20:22:30'),
(18, 0, 0, 'diallo', 'le bobo\r\n', '2022-03-17 20:22:44'),
(19, 0, 0, 'Bobo', 'Mamadou\r\n', '2022-03-17 20:24:07'),
(20, 0, 0, 'Ousmane', 'fdfffff', '2022-03-17 20:24:19'),
(21, 0, 0, 'ghbtyj', 'gfhbtr', '2022-03-17 20:51:56'),
(22, 0, 0, 'dddd', 'ddd', '2022-03-17 20:52:03'),
(23, 0, 0, '', '', '2022-03-17 21:12:41'),
(24, 0, 0, '', '', '2022-03-17 21:15:32'),
(25, 0, 0, '', '', '2022-03-17 21:17:15'),
(26, 0, 0, '', '', '2022-03-17 21:17:16'),
(27, 0, 0, '', '', '2022-03-17 21:17:17'),
(28, 0, 0, '', '', '2022-03-17 21:17:17');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `idCat` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `idCat` (`idCat`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id_post`, `idCat`, `content`, `created_at`, `idUser`, `title`) VALUES
(2, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo ipsum maiores ad fugit culpa? Ipsum, sequi sapiente veritatis officiis, magnam impedit exercitationem et, voluptates odio itaque aperiam beatae voluptatum unde.&#13;&#10;', '2022-03-18 15:22:08', 17, 'Jeux video'),
(3, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, alias impedit nam corrupti accusamus eius vel. Exercitationem, aut! Saepe sequi fugiat esse iste facere odit, beatae iusto illum. Suscipit, nesciunt.&#13;&#10;Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, alias impedit nam corrupti accusamus eius vel. Exercitationem, aut! Saepe sequi fugiat esse iste facere odit, beatae iusto illum. Suscipit, nesciunt.&#13;&#10;', '2022-03-18 15:49:08', 13, 'Mary la boss'),
(4, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, alias impedit nam corrupti accusamus eius vel. Exercitationem, aut! Saepe sequi fugiat esse iste facere odit, beatae iusto illum. Suscipit, nesciunt.&#13;&#10;Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, alias impedit nam corrupti accusamus eius vel. Exercitationem, aut! Saepe sequi fugiat esse iste facere odit, beatae iusto illum. Suscipit, nesciunt.&#13;&#10;', '2022-03-18 15:50:01', 13, 'Mary la boss'),
(5, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, alias impedit nam corrupti accusamus eius vel. Exercitationem, aut! Saepe sequi fugiat esse iste facere odit, beatae iusto illum. Suscipit, nesciunt.&#13;&#10;', '2022-03-18 15:50:51', 13, 'la beauté feminine'),
(6, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo ipsum maiores ad fugit culpa? Ipsum, sequi sapiente veritatis officiis, magnam impedit exercitationem et, voluptates odio itaque aperiam beatae voluptatum unde.', '2022-03-21 15:11:25', 17, 'PMD');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` char(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`id`, `userid`, `status`) VALUES
('0339ceeaff2c287a0fc6b283d0aca459b8e679a557ed668bd91fccf8b2694a14', 13, 'on'),
('5e885a065325442e2e310872274164dab8fa5fe414951d777b3d3a1a38acc9fb', 18, 'on'),
('8c4269adf82d70f4def83ba8840891beba4ca964ad38d24d7a7f5dc0c8d5b5a7', 16, 'on'),
('992221047a420bddd376cabf173639a4a89fae9927d2634b5bf0b80edbfcbc6a', 17, 'on');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `speudo` varchar(45) DEFAULT NULL,
  `images` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `speudo_UNIQUE` (`speudo`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `speudo`, `images`, `email`, `password`) VALUES
(13, 'diallo', 'ousmane', 'omdousmane', '', 'omdousmane@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$anZSNG9zc2tOLmRIVGxvaQ$ZSYzoDr1acQ8AugzeqTKs7GE0BuqtoLu07zvPNEl4qw'),
(14, 'fbcnbgfvb', 'xcvb cx', 'sfbvfdg', '', 'omdousmaness@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$b0dsUThacXd6bFNIUm56Sg$wZoJBeivrXNVFoxRQ+v/RU3kwslgl0SCmLWK0HghsWk'),
(15, 'leroy', 'etienne', 'chicken', '', 'geti.leroy@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QmRaQjFCb0g5OTFhaHFHSw$Y6AMd/EsYAzjPRNtLXfvHywDMkDkrhu1nXkuQ2cjK2o'),
(16, 'VESPUCE', 'Jérémi', 'snikyz', '', 'jeremi.vespucci@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MWdDMFdsU0ZpcmJiSjZQaA$muCIe0l3riSS7qYWK6/PdFd66wwpl8b/G60CxADDEQ4'),
(17, 'barry', 'mamadou', 'mbmamadou', 'ddddddddddd', 'omdousmane@ggg.com', '$argon2i$v=19$m=65536,t=4,p=1$THRuajV6SU4xdHpOOGZnWA$qy405BII8VWF2KW2w2DVlPQLSH8UvVpfpf2krt23eqg'),
(18, 'KOM KAMZE', 'Billy Joe', 'Billy3Joe', 'Bilj', 'billykamze3@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$b3RsLnJ4LzVDS1FPSURVZw$qsvZyFDrTBR1xkf3fiUo7qcnB3Epb4fiBaxeqMkZEy8');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idDestinataire`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idEmetteur`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
