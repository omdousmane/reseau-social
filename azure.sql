-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 mars 2022 à 21:49
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
-- Base de données : `azure`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(150) NOT NULL,
  `content` varchar(255) NOT NULL,
  `etat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name_cat`, `content`, `etat`) VALUES
(1, 'Legume', 'cvbfd', 'actif'),
(2, 'Fruit', 'cvvvvvv', 'non-actif'),
(3, 'Viande', 'ffcccc', 'actif'),
(4, 'Poisson', 'gggg', 'non-actif');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `number_invoice` varchar(15) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date_cmd` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status_cmd` varchar(150) NOT NULL,
  `montant_cmd` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `id_cmd` (`id_cmd`,`client_id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `number_invoice`, `client_id`, `date_cmd`, `status_cmd`, `montant_cmd`) VALUES
(2, '1651632629', 5, '2021-12-30 08:50:45', 'en cours de validation', '438000'),
(4, '3240076740', 6, '2021-12-30 09:41:55', 'en cours de validation', '374000'),
(8, '6427464833', 1, '2022-01-01 12:43:13', 'en cours de validation', '82000'),
(9, '6640098136', 6, '2022-01-02 06:57:07', 'en cours de validation', '344000'),
(10, '8241239578', 1, '2022-01-02 07:55:19', 'en cours de validation', '534000'),
(11, '8279017755', 6, '2022-01-02 09:26:24', 'en cours de validation', '82000'),
(12, '3587123337', 6, '2022-01-02 09:28:14', 'en cours de validation', '304000'),
(13, '5145687409', 6, '2022-01-02 09:35:50', 'en cours de validation', '216000'),
(14, '5107782070', 1, '2022-01-03 08:30:02', 'en cours de validation', '182000'),
(15, '6244382053', 1, '2022-01-03 11:28:07', 'en cours de validation', '222000'),
(16, '5311813874', 1, '2022-01-03 12:16:05', 'en cours de validation', '133000'),
(17, '9821503469', 1, '2022-01-03 12:20:26', 'en cours de validation', '132000'),
(18, '8614626136', 1, '2022-01-03 12:38:56', 'en cours de validation', '114000'),
(19, '9946834391', 6, '2022-01-04 09:25:08', 'en cours de validation', '184000'),
(20, '7371024168', 1, '2022-01-04 15:26:09', 'en cours de validation', '262000'),
(21, '8712561408', 1, '2022-01-16 19:17:44', 'en cours de validation', ''),
(22, '2335269498', 1, '2022-01-16 19:19:54', 'en cours de validation', ''),
(23, '4253277909', 1, '2022-01-16 19:20:29', 'en cours de validation', ''),
(24, '8080412246', 1, '2022-01-24 18:08:30', 'en cours de validation', ''),
(25, '4953454004', 1, '2022-01-26 11:42:52', 'en cours de validation', ''),
(26, '3930711282', 1, '2022-01-26 11:46:56', 'en cours de validation', '');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE IF NOT EXISTS `detail_commande` (
  `id_det` int(11) NOT NULL AUTO_INCREMENT,
  `name_prod` varchar(30) NOT NULL,
  `id_cmd` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `detail_qte` int(11) NOT NULL,
  `price_total_prod` varchar(250) NOT NULL,
  PRIMARY KEY (`id_det`),
  KEY `id_prod` (`id_prod`),
  KEY `id_cmd` (`id_cmd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `code_prod` varchar(150) NOT NULL,
  `name_prod` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `image_link` varchar(255) NOT NULL,
  `content` varchar(150) NOT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `cat_id` (`cat_id`),
  KEY `id` (`id_prod`),
  KEY `code-prod` (`code_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_prod`, `code_prod`, `name_prod`, `cat_id`, `quantity`, `price`, `image_link`, `content`) VALUES
(2, 'b011', 'Manioc', 2, 4, 250000, '/assets/Fruit/manioc.jpg', 'fgjtnr dnfdg'),
(5, '5458', 'Diallo', 2, 2, 5555, '/assets/Fruit/courgette.jpg', 'iytgÃ¨i'),
(6, '5458', 'Diallo', 3, 2, 250000, '/assets/Viande/courge.jpg', 'fdhted'),
(8, '5458', 'oranges', 2, 5, 45000, '/assets/Fruit/oranges.jpg', 'oranges');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` char(64) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`id`, `userid`) VALUES
('459a5fb1e9d6b3fa761bd48a9043be4ac55adf27161919ddca75507ea2a0d676', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_prodct`
--

DROP TABLE IF EXISTS `type_prodct`;
CREATE TABLE IF NOT EXISTS `type_prodct` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(50) NOT NULL,
  `price_type` double NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_type`),
  KEY `id_prod` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL,
  `town` varchar(150) NOT NULL,
  `portable` varchar(20) DEFAULT NULL,
  `office` varchar(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `adress`, `town`, `portable`, `office`, `company`, `password`) VALUES
(1, 'diallo', 'ousmane', 'omdousmane@yahoo.com', '4 place toulouse-lautrec', '0', '0664758555', '5548667488', 'warisko', '$argon2i$v=19$m=65536,t=4,p=1$YWJveTdlbWRQVFpZU3pkZg$8VPDmQHyMijxqNCFDmCuHuBQtnk2TXxuFRtnnf/dkxA'),
(2, 'savy', 'ssp', 'savy.sp@gmail.com', 'frzfa', '0', '0664758555', '5548667488', 'warisko', '$argon2i$v=19$m=65536,t=4,p=1$Lk40b1J0ZW1HWDFHUmxnMA$8hJblxVcVHZLW7QkQ78uiiewEAvOXRWMmP64caBgU+I'),
(3, 'Mamadou Bobo', 'Barry', 'madou224@yahoo.fr', '23 terrace de l&#39;UNIVERSITE', '0', '06647585', '5548667488', 'warisko', '$argon2i$v=19$m=65536,t=4,p=1$dE1XcEJHRllrLmU4bHFqQw$BF6WX2OTQo3GDse8JnoXcJGiQkP+0m9yz3GGXlt/HHY'),
(5, 'Mamadou Bobo', 'ousmane', 'omdousmane@gmail.com', '23 terrace de l&#39;UNIVERSITE', '0', '0664758555', '06549578', 'warisko', '$argon2i$v=19$m=65536,t=4,p=1$eno0WGx4OXVONmdHaDBqWA$v0359SwGwXRe+DKN/A03CTYoaK41ZnYc67zTQzeYeyg'),
(6, 'Mariama', 'Sow', 'mariama@gmail.com', '17 rue de la mediterranÃ©e', 'reims', '0664758555', '065495785', 'Mange fruit &#38; legumes', '$argon2i$v=19$m=65536,t=4,p=1$MmNMYmJzM2ltV2tpdEdLdw$Niw7kNlBomM18Z0lubq9KXdP5FRJO7cUJvr1IXU6Xlo');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`id_cmd`) REFERENCES `commande` (`id_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_commande_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `product` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type_prodct`
--
ALTER TABLE `type_prodct`
  ADD CONSTRAINT `type_prodct_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `product` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
