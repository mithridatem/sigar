-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 31 mars 2021 à 11:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sigar`
--

-- --------------------------------------------------------

--
-- Structure de la table `cour`
--

DROP TABLE IF EXISTS `cour`;
CREATE TABLE IF NOT EXISTS `cour` (
  `id_cour` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cour` varchar(50) NOT NULL,
  `date_cour` date NOT NULL,
  `id_crenaux` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_session` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cour`),
  KEY `cour_crenaux_FK` (`id_crenaux`),
  KEY `cour_utilisateur0_FK` (`id_user`),
  KEY `cour_session1_FK` (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `crenaux`
--

DROP TABLE IF EXISTS `crenaux`;
CREATE TABLE IF NOT EXISTS `crenaux` (
  `id_crenaux` int(11) NOT NULL AUTO_INCREMENT,
  `nom_crenaux` varchar(50) NOT NULL,
  PRIMARY KEY (`id_crenaux`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `crenaux`
--

INSERT INTO `crenaux` (`id_crenaux`, `nom_crenaux`) VALUES
(1, 'AM'),
(2, 'PM');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `id_cour` int(11) NOT NULL,
  `id_stg` int(11) NOT NULL,
  `presence` tinyint(1) NOT NULL,
  `detail_participation` text NOT NULL,
  PRIMARY KEY (`id_cour`,`id_stg`),
  KEY `participer_stagiaire0_FK` (`id_stg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'formateur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `nom_session` varchar(50) NOT NULL,
  PRIMARY KEY (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `id_stg` int(11) NOT NULL AUTO_INCREMENT,
  `nom_stg` varchar(50) NOT NULL,
  `prenom_stg` varchar(50) NOT NULL,
  `id_session` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stg`),
  KEY `stagiaire_session_FK` (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `mdp_user` varchar(50) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `utilisateur_role_FK` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom_user`, `prenom_user`, `login_user`, `mdp_user`, `id_role`) VALUES
(8, 'Mithridate', 'Mathieu', 'mmathieu', 'e10322d6b00c5261485cd8cb023cd6f7', 1),
(9, 'Guerard', 'Léo', 'gleo', 'e10322d6b00c5261485cd8cb023cd6f7', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cour`
--
ALTER TABLE `cour`
  ADD CONSTRAINT `cour_crenaux_FK` FOREIGN KEY (`id_crenaux`) REFERENCES `crenaux` (`id_crenaux`),
  ADD CONSTRAINT `cour_session1_FK` FOREIGN KEY (`id_session`) REFERENCES `session` (`id_session`),
  ADD CONSTRAINT `cour_utilisateur0_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_cour_FK` FOREIGN KEY (`id_cour`) REFERENCES `cour` (`id_cour`),
  ADD CONSTRAINT `participer_stagiaire0_FK` FOREIGN KEY (`id_stg`) REFERENCES `stagiaire` (`id_stg`);

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_session_FK` FOREIGN KEY (`id_session`) REFERENCES `session` (`id_session`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_role_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
