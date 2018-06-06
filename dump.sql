-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 31 mai 2018 à 15:31
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `My_Movie_Base`
--

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` tinytext,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `image`) VALUES
(1, 'Un très bon film', NULL, ''),
(2, 'fdskjsd', 'jsdk', ''),
(3, 'iuhdfs', 'jkkjdfjkk\r\n', ''),
(4, 'Test', 'Un très bon film', ''),
(6, 'Film modifié!', 'C\'est trop bien quand ça marche!', '/MovieBase/assets/img/poster-placeholder.png'),
(7, 'dfhjdfjh', 'hjdfgjkdkjd', '/MovieBase/assets/img/poster/'),
(8, 'Un film sans poster', 'Ce film n\'a pas d\'image?! Oh mon Dieu!!!', '/MovieBase/assets/img/poster-placeholder.png');

-- --------------------------------------------------------

--
-- Structure de la table `movie_has_user`
--

CREATE TABLE `movie_has_user` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vu` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie_has_user`
--

INSERT INTO `movie_has_user` (`movie_id`, `user_id`, `vu`) VALUES
(1, 1, 0),
(1, 2, 0),
(2, 1, 0),
(2, 2, 0),
(3, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `admin`) VALUES
(1, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '', 0),
(2, 'test2', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 0),
(3, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie_has_user`
--
ALTER TABLE `movie_has_user`
  ADD PRIMARY KEY (`movie_id`,`user_id`),
  ADD KEY `fk_movie_has_user_user1_idx` (`user_id`),
  ADD KEY `fk_movie_has_user_movie_idx` (`movie_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie_has_user`
--
ALTER TABLE `movie_has_user`
  ADD CONSTRAINT `fk_movie_has_user_movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_user_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
