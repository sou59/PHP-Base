-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 11 juin 2018 à 20:03
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tvshow`
--

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `released_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `released_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `showtv`
--

CREATE TABLE `showtv` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `synopsis` text CHARACTER SET utf8 NOT NULL,
  `released_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `showtv`
--

INSERT INTO `showtv` (`id`, `title`, `category`, `cover`, `synopsis`, `released_at`) VALUES
(1, 'L\'Arme fatale. Saison 1', 'Action', '', 'Veuf depuis la mort tragique de son ?pouse enceinte, Martin Riggs, flic texan et ancien de la Marine, prend un nouveau d?part ? Los Angeles. Il devient le co-?quipier du d?tective Roger Murtaugh, lequel a r?cemment subi une crise cardiaque b?nigne et doit ? tout prix ?viter les situations de stress. Entre l\'un prudent et l\'autre trop impr?visible, le duo de choc risque de faire des ?tincelles.', '0000-00-00'),
(2, 'L\'Arme fatale. Saison 2', 'Action', '', 'Il devient le co-?quipier du d?tective Roger Murtaugh, lequel a r?cemment subi une crise cardiaque b?nigne et doit ? tout prix ?viter les situations de stress. Entre l\'un prudent et l\'autre trop impr?visible, le duo de choc risque de faire des ?tincelles.', '0000-00-00'),
(3, 'L\'Arme fatale. Saison 2', 'Action', '', 'Veuf depuis la mort tragique de son ?pouse enceinte, Martin Riggs, flic texan et ancien de la Marine, prend un nouveau d?part ? Los Angeles. Il devient le co-?quipier du d?tective Roger Murtaugh, lequel a r?cemment subi une crise cardiaque b?nigne et doit ? tout prix ?viter les situations de stress. Entre l\'un prudent et l\'autre trop impr?visible, le duo de choc risque de faire des ?tincelles.', '0000-00-00'),
(4, 'dsdfsdf', 'Action', '', 'tesdf', '0000-00-00'),
(5, 'L\'arme fatale', 'Action', 'img/larme-fatale.jpg', '18 épisodes Diffusé sur FOX Saison produite en 2016', '2016-01-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `season`
--
ALTER TABLE `season`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `showtv`
--
ALTER TABLE `showtv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `showtv`
--
ALTER TABLE `showtv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`id`) REFERENCES `season` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`id`) REFERENCES `showtv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
