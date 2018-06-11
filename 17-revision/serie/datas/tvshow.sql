-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 11 juin 2018 à 14:54
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

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
  `title` varchar(255) DEFAULT NULL,
  `release_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `released_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `showtv`
--

CREATE TABLE `showtv` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `synopsis` text NOT NULL,
  `released_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `showtv`
--

INSERT INTO `showtv` (`id`, `title`, `category`, `cover`, `synopsis`, `released_at`) VALUES
(1, 'L\'Arme fatal. Saison 1', 'Action', '', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '2016-05-21'),
(2, 'L\'Arme fatal. Saison 2', 'Action', 'img/-.jpg', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '2016-05-21'),
(3, 'L\'Arme fatal. Saison 2', 'Action', 'img/-.jpg', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '0000-00-00'),
(4, 'L\'Arme fatal. Saison 2', 'Action', 'img/-larme-fatal.-saison-2.jpg', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '0000-00-00'),
(5, 'L\'arme fatal saison 3', 'Action', 'img/-larme-fatal-saison-3.jpg', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '0000-00-00'),
(6, 'L\'arme fatal saison 3', 'Action', 'img/-larme-fatal-saison-3.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(7, 'L\'arme fatal saison 3', 'Action', 'img/-larme-fatal-saison-3.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(8, 'L\'arme fatal saison 3', 'Action', 'img/-larme-fatal-saison-3.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(9, 'L\'arme fatal saison 3', 'Action', 'img/-larme-fatal-saison-3.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(10, 'larme-fatal-saison-3', 'Action', 'img/-larme-fatal-saison-3.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(11, 'L\'arme fatale. Saison 12', 'Action', 'img/-larme-fatale.-saison-12.jpg', 'Machine a tué machin.', '0000-00-00'),
(12, 'L\'arme fatale. Saison 13', 'Action', 'img/-larme-fatale.-saison-13.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(13, 'L\'arme fatale. Saison 22', 'Action', 'img/larme-fatale.-saison-22.jpg', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(14, 'larme-fatale.-saison-22', 'Action', 'img/larme-fatale.-saison-22.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(15, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(16, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(17, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(18, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(19, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(20, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(21, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(22, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(23, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(24, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(25, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Après le braquage d’un fourgon blindé transportant l’argent de dispensaires, Roger et Martin enquêtent sur une sombre histoire de drogue sur fond d’argent du cartel. Si les voleurs initiaux étaient les propriétaires du dispensaire eux-mêmes, c’est en réalité le conducteur du fourgon, ancien agent instructeur de Roger, qui a récupéré l’argent. ', '0000-00-00'),
(26, 'L\'arme fatale. Saison 42', 'Horreur', 'img/larme-fatale.-saison-42.jpg', 'Machin a tué truc.', '2016-05-12'),
(27, 'L\'arme fatale. Saison 42', 'Horreur', 'img/larme-fatale.-saison-42.jpg', 'Machin a tué truc.', '2016-05-12'),
(28, 'L\'arme fatale. Saison 42', 'Horreur', 'img/larme-fatale.-saison-42.jpg', 'Machin a tué truc.', '2016-05-12'),
(29, 'L\'arme fatale. Saison 42', 'Horreur', 'img/larme-fatale.-saison-42.jpg', 'Machin a tué truc.', '2016-05-12'),
(30, 'L\'arme fatale. Saison 42', 'Horreur', 'img/larme-fatale.-saison-42.jpg', 'Machin a tué truc.', '2016-05-12'),
(31, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '0000-00-00'),
(32, 'larme-fatal.-saison-1', 'Action', 'img/larme-fatal.-saison-1.', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '2016-05-12'),
(33, 'L\'Arme fatal. Saison 1', 'Action', 'img/larme-fatal.-saison-1.', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '2016-05-12'),
(34, 'larme-fatal.-saison-1', 'Action', 'img/larme-fatal.-saison-1.', 'Roger Murtaugh, policier de retour au travail après un infarctus, fait la connaissance de son nouveau coéquipier, Martin Riggs, instable suite au décès de sa femme. Ils élucident ensemble le meurtre d’un ancien Navy SEAL, Ramon Alvarez.', '2016-05-21');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
