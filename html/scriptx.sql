-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 17 fév. 2020 à 11:38
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `data`
--

-- --------------------------------------------------------

--
-- Structure de la table `BET`
--

CREATE TABLE `BET` (
  `id_match` int(11) NOT NULL,
  `id_usr` int(11) DEFAULT NULL,
  `star` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `CITY`
--

CREATE TABLE `CITY` (
  `id` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `department` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `COUNTRY`
--

CREATE TABLE `COUNTRY` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `DEPARTMENT`
--

CREATE TABLE `DEPARTMENT` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `EVENTEMENT`
--

CREATE TABLE `EVENTEMENT` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `GAME`
--

CREATE TABLE `GAME` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `GROUPS`
--

CREATE TABLE `GROUPS` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `IS_SUB`
--

CREATE TABLE `IS_SUB` (
  `id_usr` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MATSH`
--

CREATE TABLE `MATSH` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `NOTIFICATION`
--

CREATE TABLE `NOTIFICATION` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `PLAYER`
--

CREATE TABLE `PLAYER` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team` int(11) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `SUB`
--

CREATE TABLE `SUB` (
  `id_usr` int(11) NOT NULL,
  `groups` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TEAM`
--

CREATE TABLE `TEAM` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `USR`
--

CREATE TABLE `USR` (
  `id` int(11) NOT NULL,
  `mail` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wallet` int(11) DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banOrNot` tinyint(1) DEFAULT NULL,
  `adminOrNot` tinyint(1) DEFAULT NULL,
  `countVictory` int(11) DEFAULT NULL,
  `countReport` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `BET`
--
ALTER TABLE `BET`
  ADD PRIMARY KEY (`id_match`);

--
-- Index pour la table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `CITY`
--
ALTER TABLE `CITY`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `COUNTRY`
--
ALTER TABLE `COUNTRY`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `EVENTEMENT`
--
ALTER TABLE `EVENTEMENT`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `GAME`
--
ALTER TABLE `GAME`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `GROUPS`
--
ALTER TABLE `GROUPS`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `IS_SUB`
--
ALTER TABLE `IS_SUB`
  ADD PRIMARY KEY (`id_usr`,`id_sub`);

--
-- Index pour la table `MATSH`
--
ALTER TABLE `MATSH`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PLAYER`
--
ALTER TABLE `PLAYER`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `SUB`
--
ALTER TABLE `SUB`
  ADD PRIMARY KEY (`id_usr`);

--
-- Index pour la table `TEAM`
--
ALTER TABLE `TEAM`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `USR`
--
ALTER TABLE `USR`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
