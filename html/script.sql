CREATE TABLE `BET` (
  `id_match` int NOT NULL AUTO_INCREMENT,
  `id_usr` int DEFAULT NULL AUTO_INCREMENT,
  `star` boolean DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `CITY`
--

CREATE TABLE `CITY` (
  `id` char(5) NOT NULL,
  `department` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `COUNTRY`
--

CREATE TABLE `COUNTRY` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `DEPARTMENT`
--

CREATE TABLE `DEPARTMENT` (
  `id` char(2) NOT NULL,
  `name` varchar(15) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `EVENTEMENT`
--

CREATE TABLE `EVENTEMENT` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `GAME`
--

CREATE TABLE `GAME` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `GROUPS`
--

CREATE TABLE `GROUPS` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `IS_SUB`
--

CREATE TABLE `IS_SUB` (
  `id_usr` integer NOT NULL AUTO_INCREMENT,
  `id_sub` integer NOT NULL AUTO_INCREMENT
);

-- --------------------------------------------------------

--
-- Structure de la table `MATSH`
--

CREATE TABLE `MATSH` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `game` integer DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `date` date DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `NOTIFICATION`
--

CREATE TABLE `NOTIFICATION` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `type` integer DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `PLAYER`
--

CREATE TABLE `PLAYER` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `rating` integer DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `team` integer NOT NULL,
  `country` integer NOT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `SUB`
--

CREATE TABLE `SUB` (
  `id_usr` integer NOT NULL AUTO_INCREMENT,
  `groups` integer DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `TEAM`
--

CREATE TABLE `TEAM` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `type` varchar(9) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `USR`
--

CREATE TABLE `USR` (
  `id` integer NOT NULL AUTO_INCREMENT,
  `mail` varchar(25) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `wallet` int DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` char(5) DEFAULT NULL,
  `phoneNumber` char(10) DEFAULT NULL,
  `banOrNot` boolean DEFAULT NULL,
  `adminOrNot` boolean DEFAULT NULL,
  `countVictory` integer DEFAULT NULL,
  `countReport` integer DEFAULT NULL,
  `token` VARCHAR(25) DEFAULT NULL
);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `BET`
--
ALTER TABLE `BET`ADD PRIMARY KEY (`id_match`);

--
-- Index pour la table `CATEGORY`
--
ALTER TABLE `CATEGORY` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `CITY`
--
ALTER TABLE `CITY` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `COUNTRY`
--
ALTER TABLE `COUNTRY` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `EVENTEMENT`
--
ALTER TABLE `EVENTEMENT` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `GAME`
--
ALTER TABLE `GAME` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `GROUPS`
--
ALTER TABLE `GROUPS` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `IS_SUB`
--
ALTER TABLE `IS_SUB` ADD PRIMARY KEY (`id_usr`,`id_sub`);

--
-- Index pour la table `MATSH`
--
ALTER TABLE `MATSH` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `NOTIFICATION`
--
ALTER TABLE `NOTIFICATION` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `PLAYER`
--
ALTER TABLE `PLAYER` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `SUB`
--
ALTER TABLE `SUB` ADD PRIMARY KEY (`id_usr`);

--
-- Index pour la table `TEAM`
--
ALTER TABLE `TEAM` ADD PRIMARY KEY (`id`);

--
-- Index pour la table `USR`
--
ALTER TABLE `USR` ADD PRIMARY KEY (`id`);
COMMIT;