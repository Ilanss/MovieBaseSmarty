-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 05 juin 2018 à 20:28
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
  `description` text,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `image`) VALUES
(1, 'Avengers: Infinity War', 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers.', '/assets/img/poster/uIMcxe36h9K3K1RFuhCtdo0UiY9.jpg'),
(2, 'Deadpool 2', 'Après avoir miraculeusement survécu à une violente attaque bovine, un chef de cafétéria défiguré (Wade Wilson) se bat désormais pour réaliser son rêve ; devenir le barman le plus sexy de Mayberry , alors qu’il a complètement perdu son sens du goût. Pour retrouver les plaisirs pimentés de la vie, et aussi son convecteur temporel, Wade devra affronter des Ninjas, des Yakuza et une horde de chiens méchamment en chaleur. Au cours d’un voyage autour du monde, il va découvrir l’importance de la famille, de l’amitié et des saveurs, ainsi qu’un goût insoupçonné pour l’aventure. Il finira par remporter le prestigieux mug personnalisé de “Meilleur Coup du Monde”.', '/assets/img/poster/ybjooZMNlRBaFNfs52XqONc4Xyw.jpg'),
(3, 'Jurassic World : Fallen Kingdom', 'Cela fait maintenant quatre ans que les dinosaures se sont échappés de leurs enclos et ont détruit le parc à thème et complexe de luxe Jurassic World. Isla Nublar a été abandonnée par les humains alors que les dinosaures survivants sont livrés à eux-mêmes dans la jungle. Lorsque le volcan inactif de l\'île commence à rugir, Owen et Claire s’organisent pour sauver les dinosaures restants de l’extinction. Owen se fait un devoir de retrouver Blue, son principal raptor qui a disparu dans la nature, alors que Claire, qui a maintenant un véritable respect pour ces créatures, s’en fait une mission. Arrivant sur l\'île instable alors que la lave commence à pleuvoir, leur expédition découvre une conspiration qui pourrait ramener toute notre planète à un ordre périlleux jamais vu depuis la préhistoire.', '/assets/img/poster/9EwjVrXqYmm3Q5xWJyG1TmtTF8j.jpg'),
(4, 'Thor : Ragnarok', 'Thor est emprisonné de l’autre côté de l’univers sans son puissant marteau et se retrouve engagé dans une course contre le temps pour rejoindre Asgard et arrêter Ragnarok – la destruction de son monde natal et la fin de la civilisation Asgardienne – des mains d’une toute nouvelle menace, l’impitoyable Hela. Mais d’abord, il doit survivre à une compétition meurtrière de gladiateurs qui l’oppose à son ancien allié et compagnon Avenger – l’Incroyable Hulk !', '/assets/img/poster/pNLGDvsJyTRdjVUJdc4iy6BQYK5.jpg'),
(5, 'Solo: A Star Wars Story', 'Spin-off de la saga Star Wars : Au cours de périlleuses aventures dans les bas-fonds d’un monde criminel, Han Solo va faire la connaissance de son imposant futur copilote Chewbacca et croiser la route du charmant escroc Lando Calrissian…', '/assets/img/poster/xcKR6cAhdGmZQxyFfBqW5oPUF6E.jpg'),
(6, 'Black Panther', 'Black Panther suit T’Challa qui, après les événements de Captain America : Civil War, retourne chez lui, dans la nation africaine isolée et technologiquement avancée du Wakanda, pour prendre possession du trône. Cependant, quand un vieil ennemi réapparaît sur le radar, le courage de T’Challa en tant que roi et Black Panther est testé quand il est entraîné dans un conflit qui met le sort entier du Wakanda et du monde en danger.', '/assets/img/poster/g94IcdzPswTYl1ISdgn2EwvaZtt.jpg'),
(7, 'Wonder Woman', 'Avant d\'être Wonder Woman, elle s\'appelait Diana, princesse des Amazones, entraînée pour être une guerrière impossible à conquérir. Elle est élevée sur une île isolée et paradisiaque, mais lorsqu\'un pilote américain s\'écrase sur leur rivage et annonce qu\'un conflit à grande échelle fait rage dans le monde, Diana quitte son foyer, convaincue qu\'elle doit arrêter cette menace. Combattant aux côtés de cet homme et des siens pour mettre fin à cette guerre et à toutes les guerres, Diana découvre ses vrais pouvoirs... Et son véritable destin.', '/assets/img/poster/oomdTdke7dqffdDoDV1fFBV4fJY.jpg'),
(8, 'Les Gardiens de la Galaxie Vol. 2', 'Avec en toile de fond l’Awesome Mixtape #2, Les Gardiens de la Galaxie Vol. 2 poursuit les aventures de l’équipe alors qu’ils traversent les confins du cosmos. Les Gardiens doivent se battre pour que leur nouvelle famille reste ensemble tandis qu’ils cherchent à percer le mystère de la véritable filiation de Star-Lord. De vieux ennemis deviennent de nouveaux alliés et des personnages appréciés des fans, issus des comics, viennent en aide à nos héros alors que l’Univers Cinématographique Marvel continue de se développer.', '/assets/img/poster/8Xo5iajzeK1PYeidHK2PPsgli2x.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `movie_has_user`
--

CREATE TABLE `movie_has_user` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vu` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 1);

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
