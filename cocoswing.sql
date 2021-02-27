-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 27 fév. 2021 à 16:39
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cocoswing`
--

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type_dance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `profs` varchar(255) NOT NULL DEFAULT 'Les profs',
  `name_planning` varchar(255) NOT NULL,
  `id_type_course` int(11) NOT NULL DEFAULT '6',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `day`, `start_time`, `end_time`, `level`, `type_dance`, `address`, `description`, `profs`, `name_planning`, `id_type_course`) VALUES
(1, 'mercredi', '18:45:00', '20:00:00', '1', 'solo', '', '', 'Les profs', 'SOLO 1', 1),
(2, 'lundi', '18:45:00', '19:45:00', '2', 'solo', NULL, 'Cours de danse solo, de niveau 2', 'Les profs', 'SOLO 2', 2),
(3, 'mardi', '21:30:00', '22:30:00', '1', 'lindy_hop', 'adresse', '', 'Les profs', 'LINDY HOP 1', 3),
(5, 'jeudi', '19:45:00', '21:00:00', '2', 'lindy_hop', NULL, '', 'Les profs', 'LINDY HOP 2', 4),
(6, 'lundi', '19:45:00', '21:00:00', '3', 'lindy_hop', NULL, '', 'Les profs', 'LINDY HOP 3', 5),
(7, 'lundi', '18:00:00', '19:00:00', '1', 'solo', 'adresse', 'description', 'Les profs', 'SOLO 1', 1),
(9, 'vendredi', '20:00:00', '21:00:00', '3', 'lindy_hop', 'test', 'test', 'Les profs', 'LINDY HOP 3', 5),
(12, 'lundi', '14:00:00', '15:00:00', '3', 'lindy_hop', '', 'Cours de lindy hop', 'Les profs', 'LINDY HOP 3', 1),
(13, 'mardi', '00:00:15', '00:00:16', '2', 'lindy_hop', '', '', 'Les profs', 'LINDY HOP 2', 6),
(14, 'vendredi', '16:01:00', '17:01:00', '2', 'lindy_hop', '', '', 'Les profs', 'LINDY HOP 2', 6),
(15, 'jeudi', '18:00:00', '19:00:00', '1', 'solo', '', '', 'Les profs', 'SOLO 1', 6),
(16, 'mardi', '16:00:00', '17:00:00', '2', 'solo', '', '', 'Les profs', 'SOLO 2', 6);

-- --------------------------------------------------------

--
-- Structure de la table `courses_requests`
--

DROP TABLE IF EXISTS `courses_requests`;
CREATE TABLE IF NOT EXISTS `courses_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'waiting',
  `role_dance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'indifferent',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courses_requests`
--

INSERT INTO `courses_requests` (`id`, `id_course`, `id_user`, `status`, `role_dance`) VALUES
(1, 1, 1, 'accepted', 'leader'),
(2, 7, 1, 'waiting', 'leader'),
(3, 6, 1, 'waiting', 'follower'),
(4, 9, 1, 'waiting', 'indifferent'),
(5, 5, 1, 'accepted', 'follower'),
(6, 3, 1, 'accepted', 'indifferent'),
(7, 1, 4, 'accepted', 'indifferent'),
(8, 1, 4, 'waiting', 'indifferent'),
(9, 1, 4, 'waiting', 'indifferent'),
(10, 1, 4, 'waiting', 'indifferent');

-- --------------------------------------------------------

--
-- Structure de la table `errors`
--

DROP TABLE IF EXISTS `errors`;
CREATE TABLE IF NOT EXISTS `errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_error` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message_error` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `errors`
--

INSERT INTO `errors` (`id`, `type_error`, `message_error`) VALUES
(1, 'short_password', 'Votre mot de passe doit contenir plus de 8 caractères.'),
(2, 'error_password', 'Vos mots de passe ne sont pas identiques.'),
(3, 'empty_name', 'Le champ prénom est vide, veuillez le renseigner.'),
(4, 'empty_family_name', 'Le champ nom est vide, veuillez le renseigner.'),
(5, 'format_email', 'Veuillez saisir une adresse e-mail avec le format suivant : monadresse@email.com'),
(9, 'unknown_email', 'Nous ne reconnaissons pas votre adresse e-mail.'),
(7, 'empty_confirm', 'Le champ de confirmation du mot de passe est vide. Veuillez le renseigner.'),
(6, 'empty_email', 'Le champ e-mail est vide, veuillez le renseigner.'),
(8, 'empty_password', 'Le champ mot de passe est vide. Veuillez le renseigner.'),
(10, 'wrong_password', 'Votre mot de passe est incorrect.'),
(11, 'empty_phone', 'Le champ du numéro de téléphone est vide. Veuillez le renseigner.'),
(12, 'format_phone', 'Le numéro de téléphone ne doit contenir que des chiffres.'),
(13, 'size_phone', 'Le numéro de téléphone doit contenir 10 chiffres.');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'waiting',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `filename`, `id_user`, `status`) VALUES
(1, 'css_liste.jpg', 3, 'waiting'),
(20, '', 1, 'waiting'),
(19, 'MVC.jpg', 1, 'waiting');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reception_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `family_name`, `first_name`, `email`, `message`, `reception_date`) VALUES
(1, 'test', 'test', 'test@test.com', 'test', '2021-02-16 13:43:55'),
(2, 'new', 'new', 'new@new.com', 'nouveau test avec un é !', '2021-02-16 13:59:53');

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_dance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lower_price` tinyint(1) NOT NULL,
  `installment_payment` tinyint(1) NOT NULL,
  `price` int(11) NOT NULL,
  `year` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  `helloasso_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `type_dance`, `lower_price`, `installment_payment`, `price`, `year`, `description`, `helloasso_link`) VALUES
(1, '1lindy', 0, 0, 325, '2021-01-06 20:20:04', 'LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-de-lindy-hop-t-p-adhesion'),
(2, '1lindy', 0, 1, 325, '2021-01-06 20:20:04', 'LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/plein-1-cours-3x-sans-frais'),
(3, '1lindy', 1, 0, 275, '2021-01-06 20:20:04', 'LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-lindy-hop-t-r-adhesion-obligatoire-1'),
(4, '1lindy', 1, 1, 275, '2021-01-06 20:20:04', 'LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-lindy-hop-t-r-adhesion-obligatoire'),
(5, '1solo', 0, 0, 280, '2021-01-06 20:20:04', 'SOLO - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-p-adhesion-obligatoire-en-3x-sans-frais'),
(6, '1solo', 0, 1, 280, '2021-01-06 20:20:04', 'SOLO - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-p-adhesion-obligatoire-en-3x-sans-frais-1'),
(7, '1solo', 1, 0, 250, '2021-01-06 20:20:04', 'SOLO - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-r-adhesion-obligatoire'),
(8, '1solo', 1, 1, 250, '2021-01-06 20:20:04', 'SOLO - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-r-adhesion-obligatoire-en-3x-sans-frais'),
(9, '1lindy_1solo', 0, 0, 485, '2021-01-06 20:20:04', 'SOLO & LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-p-adhesion-obligatoire'),
(10, '1lindy_1solo', 0, 1, 485, '2021-01-06 20:20:04', 'SOLO & LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-p-adhesion-obligatoire-en-3x-sans-frais'),
(11, '1lindy_1solo', 1, 0, 435, '2021-01-06 20:20:04', 'SOLO & LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-r-adhesion-obligatoire-en-3x-sans-frais-2'),
(12, '1lindy_1solo', 1, 1, 435, '2021-01-06 20:20:04', 'SOLO & LINDY HOP - 1x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-r-adhesion-obligatoire-en-3x-sans-frais'),
(13, '2lindy', 0, 1, 514, '2021-01-06 20:20:04', 'LINDY HOP - 2x par semaine', 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-de-lindy-hop-t-p-adhesion-en-3x-sans-frais');

-- --------------------------------------------------------

--
-- Structure de la table `types_courses`
--

DROP TABLE IF EXISTS `types_courses`;
CREATE TABLE IF NOT EXISTS `types_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_level` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '#9CC1D9',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `types_courses`
--

INSERT INTO `types_courses` (`id`, `name_level`, `color`) VALUES
(1, 'SOLO 1', '#24BBC5'),
(2, 'SOLO 2', '#24BBC5'),
(3, 'LINDY 1', '#FFD02E'),
(4, 'LINDY 2', '#8FC552'),
(5, 'LINDY 3', '#ED823A'),
(6, 'default', '#B8CED4');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `family_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `pseudo_facebook` varchar(255) NOT NULL,
  `password` varchar(2552) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.jpg',
  `member` tinyint(1) NOT NULL DEFAULT '0',
  `id_file` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `family_name`, `phone`, `pseudo_facebook`, `password`, `admin`, `registration_date`, `picture`, `member`, `id_file`) VALUES
(1, 'test', 'testeur', 'testeur', 0, 'pseudo facebook', '$2y$10$1hHCfYtWPRoHKQ8xYnTfDejJNNjlITNIFKh40OiZ.aclTKiMMKQPe', 0, '2020-12-22 15:09:49', 'default.jpg', 0, 20),
(3, 'admin', 'a', 'a', 111, 'a', '$2y$10$6wt1cIPrUazqB6Vo/nvMa.YmhTU5uguqFEIqdl7S2hABZCHMXj0T6', 1, '2021-01-19 09:41:55', 'balloon.jpeg', 1, NULL),
(4, 'membre', 'azerty', 'azerty', 10, 'None', '$2y$10$C/gkqjRNuAoM5vHCluAo/e9g5GfAqJNJVxA9pTcbHrof/31YXwqVO', 0, '2021-02-20 19:57:15', 'default.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_courses`
--

DROP TABLE IF EXISTS `users_courses`;
CREATE TABLE IF NOT EXISTS `users_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users_subscriptions`
--

DROP TABLE IF EXISTS `users_subscriptions`;
CREATE TABLE IF NOT EXISTS `users_subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_subscription` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users_subscriptions`
--

INSERT INTO `users_subscriptions` (`id`, `id_user`, `id_subscription`) VALUES
(1, 1, 5),
(2, 1, 5),
(3, 1, 4),
(4, 1, 6),
(5, 1, 6),
(6, 1, 6),
(7, 1, 6),
(8, 1, 2),
(9, 1, 11),
(10, 1, 5),
(11, 1, 1),
(12, 1, 6),
(13, 1, 6),
(14, 1, 8),
(15, 1, 7),
(16, 1, 7),
(17, 1, 7),
(18, 1, 7),
(19, 1, 7),
(20, 1, 4),
(21, 1, 5),
(22, 1, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
