-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 11 oct. 2020 à 01:22
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `nom_categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categories`, `nom_categories`) VALUES
(1, 'web'),
(2, 'bureautique'),
(3, 'mobile'),
(4, 'game'),
(5, 'autres');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `contenu_mess` varchar(255) NOT NULL,
  `date_mess` datetime NOT NULL DEFAULT current_timestamp(),
  `id_utilisateur` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `contenu_mess`, `date_mess`, `id_utilisateur`, `id_sujet`) VALUES
(2, 'pour créer une balise html il faut d\'abord il faut aller sur ce lien htmlpourlesnuls.com', '2020-09-05 00:00:00', 1, 2),
(3, 'haha très bien repondu', '2020-09-05 23:03:25', 2, 2),
(4, 'une balise s\'est ...', '0000-00-00 00:00:00', 1, 3),
(5, 'nous aussi on sait pas oh', '0000-00-00 00:00:00', 1, 4),
(6, 'zzzz va refaire ta 1ère année haha', '0000-00-00 00:00:00', 10, 2),
(7, 'les jeune d\'aujourd\'hui aucune culture', '0000-00-00 00:00:00', 10, 2),
(8, 'mdrr', '0000-00-00 00:00:00', 10, 2),
(9, 'okok', '0000-00-00 00:00:00', 10, 2),
(10, 'okok', '0000-00-00 00:00:00', 10, 2),
(11, 'hahha', '0000-00-00 00:00:00', 1, 5),
(12, 'okiuyy', '0000-00-00 00:00:00', 1, 2),
(13, 'je sais pas', '0000-00-00 00:00:00', 14, 5),
(14, 'hum vous aussi', '0000-00-00 00:00:00', 12, 5);

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recuperation`
--

INSERT INTO `recuperation` (`id`, `id_utilisateur`, `code`, `confirme`) VALUES
(15, 14, 69763617, 0);

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE `souscategories` (
  `id_souscategories` int(11) NOT NULL,
  `nom_souscategories` varchar(255) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `souscategories`
--

INSERT INTO `souscategories` (`id_souscategories`, `nom_souscategories`, `id_categories`) VALUES
(6, 'php', 1),
(7, 'hmtl', 1),
(8, 'javascript', 1),
(9, 'Css', 1),
(10, 'java (J2EE)', 1),
(11, 'VB.net', 2),
(12, 'java', 2),
(13, 'javascript', 2),
(14, 'kotlin', 3),
(15, 'dart', 3),
(16, 'java', 3);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_souscategories` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sujet`
--

INSERT INTO `sujet` (`id_sujet`, `titre`, `contenu`, `date_creation`, `id_souscategories`, `id_utilisateur`) VALUES
(2, 'comment créer une balise ?\r\n', 'bonsoir je m\'appelle kouakou et j\'aimerais savoir comment créer une balise html 0 je suis nouveau dans la programmation', '2020-09-05 00:00:00', 7, 1),
(3, 'qu\'est ce qu\'une balise', 'ok', '0000-00-00 00:00:00', 8, 1),
(4, 'quel est le but de node js ?', 'je sais pas', '0000-00-00 00:00:00', 8, 2),
(5, 'qu\'est ce qu\'une balise', 'ettd', '0000-00-00 00:00:00', 6, 1),
(6, 'qu\'est ce que c\'est ?', 'en quoi consiste le vb.net svp', '0000-00-00 00:00:00', 11, 10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `email_utilisateur` varchar(255) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `sexe_utilisateur` varchar(1) NOT NULL,
  `datenaiss_utilisateur` date NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `num_utilisateur` int(11) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT 'anonyme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `email_utilisateur`, `mdp_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `sexe_utilisateur`, `datenaiss_utilisateur`, `avatar`, `num_utilisateur`, `pseudo`) VALUES
(1, 'koua@gmail.com', '6a62415b43a0268f38f117f076dce135705d7895', 'kouakou', 'kra', 'M', '1999-09-05', '708697_62e45e4f94854bb4b5ef1eb8a55ccb88_mv2_d_3024_4032_s_4_2.jpg', 145263, 'oriest'),
(2, 'kiki@gmail.com', '1230', 'kiki ', 'do you love me ?', 'F', '1999-09-23', NULL, NULL, 'kikiii'),
(10, 'mar@gmail.com', '1230', 'César', 'plok', 'M', '2020-09-02', '96a62ce400f5d2660d39c3a3fbbcabf7.jpg', 4152621, '404rev'),
(11, 'oriestdjelloh@gmail.com', '6a62415b43a0268f38f117f076dce135705d7895', 'Djelloh', 'oriest', 'M', '2007-02-01', NULL, NULL, 'anonyme'),
(12, 'oriestmsp@gmail.com', 'f5678f1aa83c871e4d0218f20af62aa11dcbae74', 'kokziik', 'oklm', 'M', '2020-10-14', '96a62ce400f5d2660d39c3a3fbbcabf7.jpg', 49126278, 'kizame'),
(14, 'oxolebest@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'dester', 'oxen', 'M', '2006-11-23', '708697_62e45e4f94854bb4b5ef1eb8a55ccb88_mv2_d_3024_4032_s_4_2.jpg', 145263, 'owxen');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_sujet` (`id_sujet`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id_souscategories`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_souscategories` (`id_souscategories`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id_souscategories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`);

--
-- Contraintes pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD CONSTRAINT `recuperation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recuperation_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD CONSTRAINT `souscategories_ibfk_1` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `sujet_ibfk_2` FOREIGN KEY (`id_souscategories`) REFERENCES `souscategories` (`id_souscategories`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
