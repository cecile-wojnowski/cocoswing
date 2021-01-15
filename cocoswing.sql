-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 05 jan. 2021 à 15:40
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
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_last_change` datetime NOT NULL,
  `picture_cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `day`, `start_time`, `end_time`, `level`, `type_dance`, `address`, `description`) VALUES
(1, 'mercredi', '18:45:00', '20:00:00', '1', 'solo', '', ''),
(2, 'lundi', '18:45:00', '19:45:00', '2', 'solo', NULL, ''),
(3, 'mardi', '21:30:00', '22:30:00', '1', 'lindy_hop', 'adresse', ''),
(5, 'jeudi', '19:45:00', '21:00:00', '2', 'lindy_hop', NULL, ''),
(6, 'lundi', '19:45:00', '21:00:00', '3', 'lindy_hop', NULL, ''),
(7, 'lundi', '18:00:00', '19:00:00', '1', 'solo', 'adresse', 'description'),
(9, 'vendredi', '20:00:00', '21:00:00', '3', 'lindy_hop', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `courses_requests`
--

DROP TABLE IF EXISTS `courses_requests`;
CREATE TABLE IF NOT EXISTS `courses_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'attente',
  `role_dance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'indifferent',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courses_requests`
--

INSERT INTO `courses_requests` (`id`, `id_course`, `id_user`, `status`, `role_dance`) VALUES
(1, 5, 1, 'waiting', 'indifferent');

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
-- Structure de la table `manage_courses_requests`
--

DROP TABLE IF EXISTS `manage_courses_requests`;
CREATE TABLE IF NOT EXISTS `manage_courses_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course_request` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `manage_documents`
--

DROP TABLE IF EXISTS `manage_documents`;
CREATE TABLE IF NOT EXISTS `manage_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_history`
--

DROP TABLE IF EXISTS `purchase_history`;
CREATE TABLE IF NOT EXISTS `purchase_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_course` varchar(255) NOT NULL,
  `teachers` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `helloasso_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `type_dance`, `lower_price`, `installment_payment`, `price`, `helloasso_link`) VALUES
(1, '1lindy', 0, 0, 325, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-de-lindy-hop-t-p-adhesion'),
(2, '1lindy', 0, 1, 325, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/plein-1-cours-3x-sans-frais'),
(3, '1lindy', 1, 0, 275, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-lindy-hop-t-r-adhesion-obligatoire-1'),
(4, '1lindy', 1, 1, 275, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-lindy-hop-t-r-adhesion-obligatoire'),
(5, '1solo', 0, 0, 280, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-p-adhesion-obligatoire-en-3x-sans-frais'),
(6, '1solo', 0, 1, 280, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-p-adhesion-obligatoire-en-3x-sans-frais-1'),
(7, '1solo', 1, 0, 250, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-r-adhesion-obligatoire'),
(8, '1solo', 1, 1, 250, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/1-cours-solo-t-r-adhesion-obligatoire-en-3x-sans-frais'),
(9, '1lindy_1solo', 0, 0, 485, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-p-adhesion-obligatoire'),
(10, '1lindy_1solo', 0, 1, 485, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-p-adhesion-obligatoire-en-3x-sans-frais'),
(11, '1lindy_1solo', 1, 0, 435, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-r-adhesion-obligatoire-en-3x-sans-frais-2'),
(12, '1lindy_1solo', 1, 1, 435, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-lindy-solo-t-r-adhesion-obligatoire-en-3x-sans-frais'),
(13, '2lindy', 0, 1, 514, 'https://www.helloasso.com/associations/coco-swing-marseille/adhesions/2-cours-de-lindy-hop-t-p-adhesion-en-3x-sans-frais');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `family_name`, `phone`, `pseudo_facebook`, `password`, `admin`, `registration_date`, `picture`, `member`) VALUES
(1, 'test', 'testeur', 'testeur', 0, 'pseudo facebook', '$2y$10$1hHCfYtWPRoHKQ8xYnTfDejJNNjlITNIFKh40OiZ.aclTKiMMKQPe', 0, '2020-12-22 15:09:49', 'default.jpg', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(9, 1, 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
