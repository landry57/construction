-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 25 avr. 2019 à 11:13
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `building`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `lastname`, `tel`, `email`, `password`, `date_reg`) VALUES
(1, 'Fofana', 'landry', '57-53-46-97', 'landry.fof@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PLANS DE MAISONS MODERNES'),
(2, 'PLANS DE MAISONS CLASSIQUES'),
(3, 'PLANS DE MAISONS DE VILLE'),
(4, 'PLANS DE MAISONS REGIONALES');

-- --------------------------------------------------------

--
-- Structure de la table `marchands`
--

CREATE TABLE `marchands` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `civilite` tinyint(1) NOT NULL,
  `city` varchar(255) NOT NULL,
  `code_post` varchar(100) NOT NULL,
  `besoin` varchar(100) NOT NULL,
  `projet_city` varchar(100) NOT NULL,
  `alternative` int(11) NOT NULL,
  `budget` double NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_send` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marchands`
--

INSERT INTO `marchands` (`id`, `plan_id`, `name`, `lastname`, `tel`, `address`, `email`, `civilite`, `city`, `code_post`, `besoin`, `projet_city`, `alternative`, `budget`, `message`, `date_send`) VALUES
(6, 21, 'fofana', 'landry', '57-54-85-56', 'BP11', 'landry@gmail.com', 1, 'Abidjan', '4585yt', 'Finance', 'bouake', 1, 7000000, 'je vous contacte pour......', '2019-04-24 16:08:30');

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `date_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`id`, `plan_id`, `name`, `photos`, `date_reg`) VALUES
(11, 10, 'modele un', 'maison-contemporaine-facade-arriere-azur.jpg', '2019-04-23 15:38:15'),
(12, 10, 'modele deux', 'maison-contemporaine-facade-avant-azur.jpg', '2019-04-23 15:38:24'),
(13, 10, 'modele trois', 'maison-contemporaine-piece-a-vivre-lumineuse-azur.jpg', '2019-04-23 15:38:42'),
(14, 11, 'modele un', 'maison-contemporaine-facade-avant-zante.jpg', '2019-04-23 15:40:05'),
(15, 11, 'modele deux', 'maison-contemporaine-interieur-zante.jpg', '2019-04-23 15:40:25'),
(16, 11, 'modele trois', 'maison-contemporaine-plan-maison-88-zante.jpg', '2019-04-23 15:40:38'),
(17, 11, 'modele quatre', 'maison-contemporaine-zante-facade-arriere.jpg', '2019-04-23 15:40:51'),
(18, 12, 'modele un', 'maison-moderne-facade-arriere-mana_0.jpg', '2019-04-23 15:43:14'),
(19, 12, 'modele deux', 'maison-moderne-facade-arriere-terrasse-mana.jpg', '2019-04-23 15:43:24'),
(20, 12, 'modele trois', 'maison-moderne-facade-avant-mana_0.jpg', '2019-04-23 15:43:47'),
(21, 12, 'modele quatre', 'maison-moderne-facade-avant-version-nuit_0.jpg', '2019-04-23 15:44:03'),
(22, 12, 'molele cinq', 'maison-moderne-porte-entree-mana_0.jpg', '2019-04-23 15:44:23'),
(23, 13, 'modele un', 'Maison-modulable-Tremolat-facade.jpg', '2019-04-23 15:47:54'),
(24, 13, 'modele deux', 'Maison-modulable-Tremolat-facade-arriere.jpg', '2019-04-23 15:48:10'),
(25, 13, 'modele trois', 'Maison-modulable-Tremolat-facade-avant.jpg', '2019-04-23 15:48:27'),
(26, 14, 'modele un', 'Maison-contemporaine-Nova-facade-avant.jpg', '2019-04-23 15:51:17'),
(27, 14, 'modele deux', 'Maison-contemporaine-Nova-facade-entree.jpg', '2019-04-23 15:51:31'),
(28, 14, 'modele trois', 'Maison-contemporaine-Nova-facade-terrasse.jpg', '2019-04-23 15:51:52'),
(29, 15, 'modele un', 'Maison-classique-Bastide-Prestige-facade-arriere.jpg', '2019-04-23 15:54:08'),
(30, 15, 'modele deux', 'Maison-classique-Bastide-Prestige-facade-arriere-de-nuit.jpg', '2019-04-23 15:54:20'),
(31, 15, 'modele trois', 'Maison-classique-Bastide-Prestige-facade-avant.jpg', '2019-04-23 15:54:36'),
(32, 15, 'modele quatre', 'Maison-classique-Bastide-Prestige-sejour.jpg', '2019-04-23 15:54:53'),
(33, 16, 'modele un', 'Maison-Baia-classique-facade-avant.jpg', '2019-04-23 15:56:55'),
(34, 16, 'modele deux', 'Maison-Baia-classique-grand-sejour.jpg', '2019-04-23 15:57:15'),
(35, 16, 'modele trois', 'Maison-Baia-classique-salon.jpg', '2019-04-23 15:57:31'),
(36, 17, 'modele un', 'Maison-a-etage-Bastide-Belgrave-classique-facade-arriere.jpg', '2019-04-23 16:04:01'),
(37, 17, 'modele deux', 'Maison-a-etage-Bastide-Belgrave-classique-facade-arriere-terrasse.jpg', '2019-04-23 16:04:16'),
(38, 17, 'modele trois', 'Maison-a-etage-Bastide-Belgrave-classique-facade-avant.jpg', '2019-04-23 16:04:33'),
(39, 17, 'modele quatre', 'Maison-a-etage-Bastide-Belgrave-classique-grand-sejour.jpg', '2019-04-23 16:04:51'),
(40, 17, 'modele cinq', 'Maison-a-etage-Bastide-Belgrave-classique-piece-de-vie.jpg', '2019-04-23 16:05:09'),
(41, 18, 'modele un', 'maison-contemporaine-etage-urban-open_0.jpg', '2019-04-23 16:08:41'),
(42, 18, 'modele deux', 'maison-urban-open.jpg', '2019-04-23 16:08:54'),
(43, 19, 'modele un', 'maison-de-ville-a-etage-urban-garden_0.jpg', '2019-04-23 16:10:50'),
(44, 19, 'modele deux', 'maison-de-ville--facade-arriere-urban-G_0.jpg', '2019-04-23 16:11:07'),
(45, 21, 'modele un', '1.jpg', '2019-04-23 16:18:01'),
(46, 21, 'modele deux', '2.jpg', '2019-04-23 16:18:17'),
(47, 21, 'modele trois', '3.jpg', '2019-04-23 16:18:32'),
(48, 22, 'modele un', 'Bastide-130-m²---1.jpg', '2019-04-23 16:21:06'),
(49, 22, 'modele deux', 'Bastide-130-m²---2.jpg', '2019-04-23 16:21:20'),
(50, 22, 'modele trois', 'Bastide-130-m²---4.jpg', '2019-04-23 16:21:37'),
(51, 23, 'modele un', 'Maison-Toulousaine---1.jpg', '2019-04-23 16:24:05'),
(52, 23, 'modele deux', 'Maison-Toulousaine---2.jpg', '2019-04-23 16:24:17'),
(53, 23, 'modele trois', 'Maison-Toulousaine---3.jpg', '2019-04-23 16:24:33'),
(54, 24, 'modele un', '1_1.jpg', '2019-04-23 16:26:28'),
(55, 24, 'modele deux', '2_1.jpg', '2019-04-23 16:26:40'),
(56, 24, 'modele trois', '3_1.jpg', '2019-04-23 16:27:04'),
(57, 25, 'modele un', '1_0.jpg', '2019-04-23 16:28:34'),
(58, 25, 'modele deux', '2_0.jpg', '2019-04-23 16:28:46'),
(59, 25, 'modele trois', '3_0.jpg', '2019-04-23 16:28:58'),
(60, 26, 'modele un', 'boyardville-17---a.jpg', '2019-04-23 16:32:57'),
(61, 26, 'modele deux', 'boyardville-17---b.jpg', '2019-04-23 16:33:13');

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `time`, `user_ip`) VALUES
(127, 1556183625, '::1'),
(128, 1556183625, '127.0.0.1'),
(129, 1556183621, '192.168.1.105');

-- --------------------------------------------------------

--
-- Structure de la table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `date_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plans`
--

INSERT INTO `plans` (`id`, `category_id`, `name`, `description`, `photos`, `date_reg`) VALUES
(10, 1, 'maison-contemporaine-plan-maison-azur', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'maison-contemporaine-plan-maison-82-azur.jpg', '2019-04-23 15:37:32'),
(11, 1, 'maison-contemporaine-plan-maison-zante', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'maison-contemporaine-plan-maison-88-zante.jpg', '2019-04-23 15:39:41'),
(12, 1, 'Plan-de-maison-moderne-mana', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'Plan-de-maison-moderne-mana_0.jpg', '2019-04-23 15:42:48'),
(13, 1, 'plan-maison-moderne-tremolat', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'plan-maison-moderne-tremolat.jpg', '2019-04-23 15:46:13'),
(14, 2, 'Plan-maison-contemporaine-Nova', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'Plan-maison-contemporaine-Nova-100m2.jpg', '2019-04-23 15:50:03'),
(15, 2, 'Plan-maison-classique-Bastide-Prestige-rdc', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'Plan-maison-classique-Bastide-Prestige-rdc.jpg', '2019-04-23 15:53:43'),
(16, 2, 'Plan-maison-Baia-classique-plain-pied', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'Plan-maison-Baia-classique-plain-pied-103m2.jpg', '2019-04-23 15:56:14'),
(17, 2, 'Plan-maison-Bastide-Belgrave-classique-rdc-cuisine-ouverte', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'Plan-maison-Bastide-Belgrave-classique-rdc-85.42m2-cuisine-ouverte.jpg', '2019-04-23 15:59:22'),
(18, 3, 'plan-maison-contemporaine-urban-open', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'plan-maison-contemporaine-urban-open_0.jpg', '2019-04-23 16:07:49'),
(19, 3, 'maison-de-ville-plan-maison-etage-Urban-G', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'maison-de-ville-plan-maison-etage-Urban-G.jpg', '2019-04-23 16:10:09'),
(21, 4, 'rdc', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'rdc.jpg', '2019-04-23 16:17:32'),
(22, 4, 'PLAN-MARKETING-RDC', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'PLAN-MARKETING-RDC.jpg', '2019-04-23 16:20:15'),
(23, 4, 'plan-marketing', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'plan-marketing.jpg', '2019-04-23 16:23:29'),
(24, 4, 'plan-maison-basque', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'plan-maison-basque.jpg', '2019-04-23 16:26:00'),
(25, 4, 'plan-rdc', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'plan-rdc.jpg', '2019-04-23 16:28:03'),
(26, 4, 'plan-maison-charentaise-boyarville', 'Builders propose de nombreux plans de maisons adaptables et personnalisables à votre projet. Choisissez parmi nos plans de maison, modernes, en L, en V, plain pied ou encore à étage', 'plan-maison-charentaise-boyarville.jpg', '2019-04-23 16:30:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marchands`
--
ALTER TABLE `marchands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `marchands`
--
ALTER TABLE `marchands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
