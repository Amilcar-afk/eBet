-- MariaDB dump 10.17  Distrib 10.4.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dataX
-- ------------------------------------------------------
-- Server version	10.4.12-MariaDB-1:10.4.12+maria~buster-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `dataX`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dataX` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dataX`;

--
-- Table structure for table `BET`
--

DROP TABLE IF EXISTS `BET`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BET` (
  `id_match` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `date_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `team` varchar(200) DEFAULT NULL,
  `victory` tinyint(1) DEFAULT NULL,
  `score` char(3) DEFAULT NULL,
  PRIMARY KEY (`id_match`,`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BET`
--

LOCK TABLES `BET` WRITE;
/*!40000 ALTER TABLE `BET` DISABLE KEYS */;
INSERT INTO `BET` VALUES (4,7,0,10,'2021-03-30 22:00:00',' GIGN R6 TEAM 1 ',NULL,NULL),(4,8,0,123,'2021-03-30 22:00:00',' GIGN R6 TEAM 1 ',NULL,NULL),(9,8,0,10,'2021-09-09 19:45:00',' ZWARRIORS ',NULL,NULL),(10,8,0,100,'2020-06-11 00:00:00',' ZWARRIORS ',NULL,NULL);
/*!40000 ALTER TABLE `BET` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CATEGORY`
--

DROP TABLE IF EXISTS `CATEGORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CATEGORY` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(9) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CATEGORY`
--

LOCK TABLES `CATEGORY` WRITE;
/*!40000 ALTER TABLE `CATEGORY` DISABLE KEYS */;
INSERT INTO `CATEGORY` VALUES (1,'MMORPG','Massive Multiplayer Online Role Play Game'),(2,'FPS','First Person Shooter');
/*!40000 ALTER TABLE `CATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COUNTRY`
--

DROP TABLE IF EXISTS `COUNTRY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COUNTRY` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `nom_en_gb` varchar(45) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alpha2` (`alpha2`),
  UNIQUE KEY `alpha3` (`alpha3`),
  UNIQUE KEY `code_unique` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COUNTRY`
--

LOCK TABLES `COUNTRY` WRITE;
/*!40000 ALTER TABLE `COUNTRY` DISABLE KEYS */;
INSERT INTO `COUNTRY` VALUES (1,4,'AF','AFG','Afghanistan','Afghanistan'),(2,8,'AL','ALB','Albania','Albanie'),(3,10,'AQ','ATA','Antarctica','Antarctique'),(4,12,'DZ','DZA','Algeria','Algérie'),(5,16,'AS','ASM','American Samoa','Samoa Américaines'),(6,20,'AD','AND','Andorra','Andorre'),(7,24,'AO','AGO','Angola','Angola'),(8,28,'AG','ATG','Antigua and Barbuda','Antigua-et-Barbuda'),(9,31,'AZ','AZE','Azerbaijan','Azerbaïdjan'),(10,32,'AR','ARG','Argentina','Argentine'),(11,36,'AU','AUS','Australia','Australie'),(12,40,'AT','AUT','Austria','Autriche'),(13,44,'BS','BHS','Bahamas','Bahamas'),(14,48,'BH','BHR','Bahrain','Bahreïn'),(15,50,'BD','BGD','Bangladesh','Bangladesh'),(16,51,'AM','ARM','Armenia','Arménie'),(17,52,'BB','BRB','Barbados','Barbade'),(18,56,'BE','BEL','Belgium','Belgique'),(19,60,'BM','BMU','Bermuda','Bermudes'),(20,64,'BT','BTN','Bhutan','Bhoutan'),(21,68,'BO','BOL','Bolivia','Bolivie'),(22,70,'BA','BIH','Bosnia and Herzegovina','Bosnie-Herzégovine'),(23,72,'BW','BWA','Botswana','Botswana'),(24,74,'BV','BVT','Bouvet Island','Île Bouvet'),(25,76,'BR','BRA','Brazil','Brésil'),(26,84,'BZ','BLZ','Belize','Belize'),(27,86,'IO','IOT','British Indian Ocean Territory','Territoire Britannique de l\'Océan Indien'),(28,90,'SB','SLB','Solomon Islands','Îles Salomon'),(29,92,'VG','VGB','British Virgin Islands','Îles Vierges Britanniques'),(30,96,'BN','BRN','Brunei Darussalam','Brunéi Darussalam'),(31,100,'BG','BGR','Bulgaria','Bulgarie'),(32,104,'MM','MMR','Myanmar','Myanmar'),(33,108,'BI','BDI','Burundi','Burundi'),(34,112,'BY','BLR','Belarus','Bélarus'),(35,116,'KH','KHM','Cambodia','Cambodge'),(36,120,'CM','CMR','Cameroon','Cameroun'),(37,124,'CA','CAN','Canada','Canada'),(38,132,'CV','CPV','Cape Verde','Cap-vert'),(39,136,'KY','CYM','Cayman Islands','Îles Caïmanes'),(40,140,'CF','CAF','Central African','République Centrafricaine'),(41,144,'LK','LKA','Sri Lanka','Sri Lanka'),(42,148,'TD','TCD','Chad','Tchad'),(43,152,'CL','CHL','Chile','Chili'),(44,156,'CN','CHN','China','Chine'),(45,158,'TW','TWN','Taiwan','Taïwan'),(46,162,'CX','CXR','Christmas Island','Île Christmas'),(47,166,'CC','CCK','Cocos (Keeling) Islands','Îles Cocos (Keeling)'),(48,170,'CO','COL','Colombia','Colombie'),(49,174,'KM','COM','Comoros','Comores'),(50,175,'YT','MYT','Mayotte','Mayotte'),(51,178,'CG','COG','Republic of the Congo','République du Congo'),(52,180,'CD','COD','The Democratic Republic Of The Congo','République Démocratique du Congo'),(53,184,'CK','COK','Cook Islands','Îles Cook'),(54,188,'CR','CRI','Costa Rica','Costa Rica'),(55,191,'HR','HRV','Croatia','Croatie'),(56,192,'CU','CUB','Cuba','Cuba'),(57,196,'CY','CYP','Cyprus','Chypre'),(58,203,'CZ','CZE','Czech Republic','République Tchèque'),(59,204,'BJ','BEN','Benin','Bénin'),(60,208,'DK','DNK','Denmark','Danemark'),(61,212,'DM','DMA','Dominica','Dominique'),(62,214,'DO','DOM','Dominican Republic','République Dominicaine'),(63,218,'EC','ECU','Ecuador','Équateur'),(64,222,'SV','SLV','El Salvador','El Salvador'),(65,226,'GQ','GNQ','Equatorial Guinea','Guinée Équatoriale'),(66,231,'ET','ETH','Ethiopia','Éthiopie'),(67,232,'ER','ERI','Eritrea','Érythrée'),(68,233,'EE','EST','Estonia','Estonie'),(69,234,'FO','FRO','Faroe Islands','Îles Féroé'),(70,238,'FK','FLK','Falkland Islands','Îles (malvinas) Falkland'),(71,239,'GS','SGS','South Georgia and the South Sandwich Islands','Géorgie du Sud et les Îles Sandwich du Sud'),(72,242,'FJ','FJI','Fiji','Fidji'),(73,246,'FI','FIN','Finland','Finlande'),(74,248,'AX','ALA','Åland Islands','Îles Åland'),(75,250,'FR','FRA','France','France'),(76,254,'GF','GUF','French Guiana','Guyane Française'),(77,258,'PF','PYF','French Polynesia','Polynésie Française'),(78,260,'TF','ATF','French Southern Territories','Terres Australes Françaises'),(79,262,'DJ','DJI','Djibouti','Djibouti'),(80,266,'GA','GAB','Gabon','Gabon'),(81,268,'GE','GEO','Georgia','Géorgie'),(82,270,'GM','GMB','Gambia','Gambie'),(83,275,'PS','PSE','Occupied Palestinian Territory','Territoire Palestinien Occupé'),(84,276,'DE','DEU','Germany','Allemagne'),(85,288,'GH','GHA','Ghana','Ghana'),(86,292,'GI','GIB','Gibraltar','Gibraltar'),(87,296,'KI','KIR','Kiribati','Kiribati'),(88,300,'GR','GRC','Greece','Grèce'),(89,304,'GL','GRL','Greenland','Groenland'),(90,308,'GD','GRD','Grenada','Grenade'),(91,312,'GP','GLP','Guadeloupe','Guadeloupe'),(92,316,'GU','GUM','Guam','Guam'),(93,320,'GT','GTM','Guatemala','Guatemala'),(94,324,'GN','GIN','Guinea','Guinée'),(95,328,'GY','GUY','Guyana','Guyana'),(96,332,'HT','HTI','Haiti','Haïti'),(97,334,'HM','HMD','Heard Island and McDonald Islands','Îles Heard et Mcdonald'),(98,336,'VA','VAT','Vatican City State','Saint-Siège (état de la Cité du Vatican)'),(99,340,'HN','HND','Honduras','Honduras'),(100,344,'HK','HKG','Hong Kong','Hong-Kong'),(101,348,'HU','HUN','Hungary','Hongrie'),(102,352,'IS','ISL','Iceland','Islande'),(103,356,'IN','IND','India','Inde'),(104,360,'ID','IDN','Indonesia','Indonésie'),(105,364,'IR','IRN','Islamic Republic of Iran','République Islamique d\'Iran'),(106,368,'IQ','IRQ','Iraq','Iraq'),(107,372,'IE','IRL','Ireland','Irlande'),(108,376,'IL','ISR','Israel','Israël'),(109,380,'IT','ITA','Italy','Italie'),(110,384,'CI','CIV','Côte d\'Ivoire','Côte d\'Ivoire'),(111,388,'JM','JAM','Jamaica','Jamaïque'),(112,392,'JP','JPN','Japan','Japon'),(113,398,'KZ','KAZ','Kazakhstan','Kazakhstan'),(114,400,'JO','JOR','Jordan','Jordanie'),(115,404,'KE','KEN','Kenya','Kenya'),(116,408,'KP','PRK','Democratic People\'s Republic of Korea','République Populaire Démocratique de Corée'),(117,410,'KR','KOR','Republic of Korea','République de Corée'),(118,414,'KW','KWT','Kuwait','Koweït'),(119,417,'KG','KGZ','Kyrgyzstan','Kirghizistan'),(120,418,'LA','LAO','Lao People\'s Democratic Republic','République Démocratique Populaire Lao'),(121,422,'LB','LBN','Lebanon','Liban'),(122,426,'LS','LSO','Lesotho','Lesotho'),(123,428,'LV','LVA','Latvia','Lettonie'),(124,430,'LR','LBR','Liberia','Libéria'),(125,434,'LY','LBY','Libyan Arab Jamahiriya','Jamahiriya Arabe Libyenne'),(126,438,'LI','LIE','Liechtenstein','Liechtenstein'),(127,440,'LT','LTU','Lithuania','Lituanie'),(128,442,'LU','LUX','Luxembourg','Luxembourg'),(129,446,'MO','MAC','Macao','Macao'),(130,450,'MG','MDG','Madagascar','Madagascar'),(131,454,'MW','MWI','Malawi','Malawi'),(132,458,'MY','MYS','Malaysia','Malaisie'),(133,462,'MV','MDV','Maldives','Maldives'),(134,466,'ML','MLI','Mali','Mali'),(135,470,'MT','MLT','Malta','Malte'),(136,474,'MQ','MTQ','Martinique','Martinique'),(137,478,'MR','MRT','Mauritania','Mauritanie'),(138,480,'MU','MUS','Mauritius','Maurice'),(139,484,'MX','MEX','Mexico','Mexique'),(140,492,'MC','MCO','Monaco','Monaco'),(141,496,'MN','MNG','Mongolia','Mongolie'),(142,498,'MD','MDA','Republic of Moldova','République de Moldova'),(143,500,'MS','MSR','Montserrat','Montserrat'),(144,504,'MA','MAR','Morocco','Maroc'),(145,508,'MZ','MOZ','Mozambique','Mozambique'),(146,512,'OM','OMN','Oman','Oman'),(147,516,'NA','NAM','Namibia','Namibie'),(148,520,'NR','NRU','Nauru','Nauru'),(149,524,'NP','NPL','Nepal','Népal'),(150,528,'NL','NLD','Netherlands','Pays-Bas'),(151,530,'AN','ANT','Netherlands Antilles','Antilles Néerlandaises'),(152,533,'AW','ABW','Aruba','Aruba'),(153,540,'NC','NCL','New Caledonia','Nouvelle-Calédonie'),(154,548,'VU','VUT','Vanuatu','Vanuatu'),(155,554,'NZ','NZL','New Zealand','Nouvelle-Zélande'),(156,558,'NI','NIC','Nicaragua','Nicaragua'),(157,562,'NE','NER','Niger','Niger'),(158,566,'NG','NGA','Nigeria','Nigéria'),(159,570,'NU','NIU','Niue','Niué'),(160,574,'NF','NFK','Norfolk Island','Île Norfolk'),(161,578,'NO','NOR','Norway','Norvège'),(162,580,'MP','MNP','Northern Mariana Islands','Îles Mariannes du Nord'),(163,581,'UM','UMI','United States Minor Outlying Islands','Îles Mineures Éloignées des États-Unis'),(164,583,'FM','FSM','Federated States of Micronesia','États Fédérés de Micronésie'),(165,584,'MH','MHL','Marshall Islands','Îles Marshall'),(166,585,'PW','PLW','Palau','Palaos'),(167,586,'PK','PAK','Pakistan','Pakistan'),(168,591,'PA','PAN','Panama','Panama'),(169,598,'PG','PNG','Papua New Guinea','Papouasie-Nouvelle-Guinée'),(170,600,'PY','PRY','Paraguay','Paraguay'),(171,604,'PE','PER','Peru','Pérou'),(172,608,'PH','PHL','Philippines','Philippines'),(173,612,'PN','PCN','Pitcairn','Pitcairn'),(174,616,'PL','POL','Poland','Pologne'),(175,620,'PT','PRT','Portugal','Portugal'),(176,624,'GW','GNB','Guinea-Bissau','Guinée-Bissau'),(177,626,'TL','TLS','Timor-Leste','Timor-Leste'),(178,630,'PR','PRI','Puerto Rico','Porto Rico'),(179,634,'QA','QAT','Qatar','Qatar'),(180,638,'RE','REU','Réunion','Réunion'),(181,642,'RO','ROU','Romania','Roumanie'),(182,643,'RU','RUS','Russian Federation','Fédération de Russie'),(183,646,'RW','RWA','Rwanda','Rwanda'),(184,654,'SH','SHN','Saint Helena','Sainte-Hélène'),(185,659,'KN','KNA','Saint Kitts and Nevis','Saint-Kitts-et-Nevis'),(186,660,'AI','AIA','Anguilla','Anguilla'),(187,662,'LC','LCA','Saint Lucia','Sainte-Lucie'),(188,666,'PM','SPM','Saint-Pierre and Miquelon','Saint-Pierre-et-Miquelon'),(189,670,'VC','VCT','Saint Vincent and the Grenadines','Saint-Vincent-et-les Grenadines'),(190,674,'SM','SMR','San Marino','Saint-Marin'),(191,678,'ST','STP','Sao Tome and Principe','Sao Tomé-et-Principe'),(192,682,'SA','SAU','Saudi Arabia','Arabie Saoudite'),(193,686,'SN','SEN','Senegal','Sénégal'),(194,690,'SC','SYC','Seychelles','Seychelles'),(195,694,'SL','SLE','Sierra Leone','Sierra Leone'),(196,702,'SG','SGP','Singapore','Singapour'),(197,703,'SK','SVK','Slovakia','Slovaquie'),(198,704,'VN','VNM','Vietnam','Viet Nam'),(199,705,'SI','SVN','Slovenia','Slovénie'),(200,706,'SO','SOM','Somalia','Somalie'),(201,710,'ZA','ZAF','South Africa','Afrique du Sud'),(202,716,'ZW','ZWE','Zimbabwe','Zimbabwe'),(203,724,'ES','ESP','Spain','Espagne'),(204,732,'EH','ESH','Western Sahara','Sahara Occidental'),(205,736,'SD','SDN','Sudan','Soudan'),(206,740,'SR','SUR','Suriname','Suriname'),(207,744,'SJ','SJM','Svalbard and Jan Mayen','Svalbard etÎle Jan Mayen'),(208,748,'SZ','SWZ','Swaziland','Swaziland'),(209,752,'SE','SWE','Sweden','Suède'),(210,756,'CH','CHE','Switzerland','Suisse'),(211,760,'SY','SYR','Syrian Arab Republic','République Arabe Syrienne'),(212,762,'TJ','TJK','Tajikistan','Tadjikistan'),(213,764,'TH','THA','Thailand','Thaïlande'),(214,768,'TG','TGO','Togo','Togo'),(215,772,'TK','TKL','Tokelau','Tokelau'),(216,776,'TO','TON','Tonga','Tonga'),(217,780,'TT','TTO','Trinidad and Tobago','Trinité-et-Tobago'),(218,784,'AE','ARE','United Arab Emirates','Émirats Arabes Unis'),(219,788,'TN','TUN','Tunisia','Tunisie'),(220,792,'TR','TUR','Turkey','Turquie'),(221,795,'TM','TKM','Turkmenistan','Turkménistan'),(222,796,'TC','TCA','Turks and Caicos Islands','Îles Turks et Caïques'),(223,798,'TV','TUV','Tuvalu','Tuvalu'),(224,800,'UG','UGA','Uganda','Ouganda'),(225,804,'UA','UKR','Ukraine','Ukraine'),(226,807,'MK','MKD','The Former Yugoslav Republic of Macedonia','L\'ex-République Yougoslave de Macédoine'),(227,818,'EG','EGY','Egypt','Égypte'),(228,826,'GB','GBR','United Kingdom','Royaume-Uni'),(229,833,'IM','IMN','Isle of Man','Île de Man'),(230,834,'TZ','TZA','United Republic Of Tanzania','République-Unie de Tanzanie'),(231,840,'US','USA','United States','États-Unis'),(232,850,'VI','VIR','U.S. Virgin Islands','Îles Vierges des États-Unis'),(233,854,'BF','BFA','Burkina Faso','Burkina Faso'),(234,858,'UY','URY','Uruguay','Uruguay'),(235,860,'UZ','UZB','Uzbekistan','Ouzbékistan'),(236,862,'VE','VEN','Venezuela','Venezuela'),(237,876,'WF','WLF','Wallis and Futuna','Wallis et Futuna'),(238,882,'WS','WSM','Samoa','Samoa'),(239,887,'YE','YEM','Yemen','Yémen'),(240,891,'CS','SCG','Serbia and Montenegro','Serbie-et-Monténégro'),(241,894,'ZM','ZMB','Zambia','Zambie');
/*!40000 ALTER TABLE `COUNTRY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENMT`
--

DROP TABLE IF EXISTS `EVENMT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EVENMT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `libele` varchar(20) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EVENMT`
--

LOCK TABLES `EVENMT` WRITE;
/*!40000 ALTER TABLE `EVENMT` DISABLE KEYS */;
/*!40000 ALTER TABLE `EVENMT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FAVOURITE`
--

DROP TABLE IF EXISTS `FAVOURITE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FAVOURITE` (
  `id_user` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_match`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FAVOURITE`
--

LOCK TABLES `FAVOURITE` WRITE;
/*!40000 ALTER TABLE `FAVOURITE` DISABLE KEYS */;
INSERT INTO `FAVOURITE` VALUES (8,10),(8,11),(12,4),(12,9);
/*!40000 ALTER TABLE `FAVOURITE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FILTER`
--

DROP TABLE IF EXISTS `FILTER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FILTER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `optionS` int(11) DEFAULT NULL,
  `libele` varchar(15) DEFAULT NULL,
  `usr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FILTER`
--

LOCK TABLES `FILTER` WRITE;
/*!40000 ALTER TABLE `FILTER` DISABLE KEYS */;
/*!40000 ALTER TABLE `FILTER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FOLLOWER`
--

DROP TABLE IF EXISTS `FOLLOWER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FOLLOWER` (
  `id_usr` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  PRIMARY KEY (`follower`,`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FOLLOWER`
--

LOCK TABLES `FOLLOWER` WRITE;
/*!40000 ALTER TABLE `FOLLOWER` DISABLE KEYS */;
INSERT INTO `FOLLOWER` VALUES (8,7),(7,8),(10,8),(12,8),(13,12);
/*!40000 ALTER TABLE `FOLLOWER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GAME`
--

DROP TABLE IF EXISTS `GAME`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GAME` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GAME`
--

LOCK TABLES `GAME` WRITE;
/*!40000 ALTER TABLE `GAME` DISABLE KEYS */;
INSERT INTO `GAME` VALUES (1,'World Of Warcraft','The most playefull MMORPG ever',0),(2,'Guild Wars 2','Guild Wars 2 is an online role-playing game with fast-paced action combat, a rich and detailed universe of stories, awe-inspiring landscapes to explore, two challenging player vs. player modes and no subscription fees !\r\n\r\n',1),(3,'Eve Online','Eve Online is a space-based, persistent world massively multiplayer online role-playing game developed and published by CCP Games.',1),(4,'Dofus ','Dofus1 (pronounced /do.fus/2) is a French massively multiplayer online role-playing game (MMORPG) developed and published by Ankama and then by its subsidiary Ankama Games since its creation in 2004.',1),(5,'Call Of Duty','Call of Duty or COD (French &quot;Call of Duty&quot;) is a series of first-person shooter war video games. The series was created in 2003 by the studio Infinity Ward and published by Activision. ',2),(6,'Black Desert Online','Black Desert Online is an MMORPG type video game developed by Pearl Abyss and published by Kakao Games, released in 2015 on Windows then in 2019 on Xbox One and PlayStation 4',1),(7,'Rainbow Six Siege','Rainbow Six: Siege est un jeu de tir tactique où le joueur incarne différents agents de plusieurs unités de forces spéciales et de groupes d\'interventions qui constituent l’équipe Rainbow. ',2);
/*!40000 ALTER TABLE `GAME` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ISUB`
--

DROP TABLE IF EXISTS `ISUB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ISUB` (
  `id_usr` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  PRIMARY KEY (`id_usr`,`id_follower`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ISUB`
--

LOCK TABLES `ISUB` WRITE;
/*!40000 ALTER TABLE `ISUB` DISABLE KEYS */;
/*!40000 ALTER TABLE `ISUB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MATSH`
--

DROP TABLE IF EXISTS `MATSH`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MATSH` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `game` int(11) DEFAULT NULL,
  `first` int(11) DEFAULT NULL,
  `second` int(11) DEFAULT NULL,
  `dateH` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MATSH`
--

LOCK TABLES `MATSH` WRITE;
/*!40000 ALTER TABLE `MATSH` DISABLE KEYS */;
INSERT INTO `MATSH` VALUES (3,'sparta',1,4,5,'2020-03-31 00:00:00'),(4,'athenes',3,4,5,'2021-03-31 00:00:00'),(5,'LYON e-sprt',1,5,1,'2020-04-03 01:00:00'),(6,'coco',1,2,3,'2020-04-09 00:00:00'),(7,'channel',2,2,3,'2020-04-08 15:00:00'),(8,'wartek',3,2,3,'2020-04-11 15:00:00'),(9,'AZERT ESPORT',2,2,1,'2021-09-09 21:45:00'),(10,'AZERTY ESPORT',3,2,3,'2020-06-11 02:00:00'),(11,'SPARTIATE',4,5,2,'2020-04-21 15:00:00');
/*!40000 ALTER TABLE `MATSH` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NOTIF`
--

DROP TABLE IF EXISTS `NOTIF`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NOTIF` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NOTIF`
--

LOCK TABLES `NOTIF` WRITE;
/*!40000 ALTER TABLE `NOTIF` DISABLE KEYS */;
/*!40000 ALTER TABLE `NOTIF` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PLAYER`
--

DROP TABLE IF EXISTS `PLAYER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PLAYER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `pseudo` varchar(15) DEFAULT NULL,
  `team` int(11) DEFAULT NULL,
  `country` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PLAYER`
--

LOCK TABLES `PLAYER` WRITE;
/*!40000 ALTER TABLE `PLAYER` DISABLE KEYS */;
INSERT INTO `PLAYER` VALUES (1,'Andreas','Meaney','Raiku',0,186),(2,'Grégoire','Morin','monkey',1,75),(3,'mich','jean','mj',3,88),(4,'Antoine','Roche','ANTOINETTE',1,11),(5,'Marcos','Alexandre','MarcosTropBeau',1,79),(6,'Pina','Jonathan','Pinacota',1,186),(7,'Uzumaki','Naruto','NANADAIME',2,114),(8,'Prince','Diana','WonderWoman',2,108),(9,'San','Goku','KAKAROTTO',2,112),(10,'Otsotsuki','Kaguya','DéesseLunaire',2,158),(11,'Rogers','Steve','CaptainAmerica',3,231),(12,'Tony','Stark','IronMan',3,73),(13,'Natasha','Romanov','BlackWidow',3,116),(14,'Eren','Yäger','Assaillant',4,71),(15,'Mikasa','Ackerman','Azumabito94',4,11),(16,'Armin','Harlet','ErwinSmith',4,14),(17,'Hoover','Bertholdt','GeantDu77',4,9),(18,'Corantin','Gotaga','FrenchMonster',5,67),(19,'Benoit','Briatte','JS&gt;C',5,11),(20,'Frédéric','Sananes','JScodéEnC',5,66),(21,'Sananes','Briatte','PassionAmour',5,114),(22,'Yanis','Tagri','guccywallet',3,3);
/*!40000 ALTER TABLE `PLAYER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SHARE_BET`
--

DROP TABLE IF EXISTS `SHARE_BET`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SHARE_BET` (
  `id_user` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_match`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SHARE_BET`
--

LOCK TABLES `SHARE_BET` WRITE;
/*!40000 ALTER TABLE `SHARE_BET` DISABLE KEYS */;
INSERT INTO `SHARE_BET` VALUES (7,10),(8,10),(12,4),(12,11),(13,4),(13,9),(22,9),(22,10);
/*!40000 ALTER TABLE `SHARE_BET` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TEAM`
--

DROP TABLE IF EXISTS `TEAM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TEAM` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `organization` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TEAM`
--

LOCK TABLES `TEAM` WRITE;
/*!40000 ALTER TABLE `TEAM` DISABLE KEYS */;
INSERT INTO `TEAM` VALUES (1,'Method Black',4,'METHOD EU'),(2,'ZWARRIORS',4,'WWE ESPORT'),(3,'KPA R6 TEAM 1',5,'KPA ESPORT'),(4,'GIGN R6 TEAM 1',5,'GIGN ESPORT'),(5,'MILLENIUM',5,'BTP ESPORT');
/*!40000 ALTER TABLE `TEAM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TRACK`
--

DROP TABLE IF EXISTS `TRACK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TRACK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `count` int(11) DEFAULT 0,
  `mounth` char(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TRACK`
--

LOCK TABLES `TRACK` WRITE;
/*!40000 ALTER TABLE `TRACK` DISABLE KEYS */;
INSERT INTO `TRACK` VALUES (1,'signup',3,'2020-04'),(2,'signup',15,'2020-03'),(3,NULL,0,'2020-04'),(4,NULL,0,'2020-04'),(5,NULL,0,'2020-04'),(6,NULL,0,'2020-04'),(7,NULL,0,'2020-04'),(8,NULL,0,'2020-04'),(9,NULL,0,'2020-04'),(10,NULL,0,'2020-04'),(11,NULL,0,'2020-04'),(12,NULL,0,'2020-04'),(13,NULL,0,'2020-04');
/*!40000 ALTER TABLE `TRACK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USR`
--

DROP TABLE IF EXISTS `USR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `wallet` int(11) DEFAULT NULL,
  `city` smallint(5) unsigned DEFAULT NULL,
  `phoneNumber` char(10) DEFAULT NULL,
  `confirmKey` varchar(255) DEFAULT NULL,
  `confirm` int(11) DEFAULT NULL,
  `banOrNot` tinyint(1) DEFAULT 0,
  `countReport` int(11) DEFAULT NULL,
  `countVictory` int(11) DEFAULT 0,
  `ip` varchar(15) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `credit` int(11) DEFAULT 0,
  `private` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USR`
--

LOCK TABLES `USR` WRITE;
/*!40000 ALTER TABLE `USR` DISABLE KEYS */;
INSERT INTO `USR` VALUES (7,'g-mrn@gmx.com','adm','adm','grgoire44','111fe611704dc421b65ba8f5234730deccb0f3c9023fb3e082a8ac152fded3af',190,1,'0166666666','795941588666',0,0,NULL,0,'86.245.46.217','image-1585573664.jpg',0,0),(8,'pablomsb93@gmail.com','taskforce','test','taskforce','46a1af0c02a21e47edded758daa16ca506075969194f2ba1e41f30e89b522412',4663,75,'0606060606','091373973715',1,0,NULL,0,'82.251.191.80','image-1585574201.PNG',8,0),(9,'test0@yopmail.com','testerreur','testerreur','test0','5859287955847c73dddeba0a3eb34aebb9c52f4f56a330c93e59e17f72f52d47',100,1,'Test123456','196226777741',0,0,NULL,0,'82.251.191.80','image-1585575210.png',0,0),(10,'letourneaunathan7@gmail.com','Letourneau','Nathan','nathan77','092b191016eb415a5446983dfb103a0859b8dd6a47ff5e0e0b913a111c892a64',100,75,'5555555555','387686094415',0,0,NULL,0,'89.80.47.126','image-1586288874.jpg',0,0),(11,'project.parionsweb@gmail.com','testerreur','testerreur','testerreur','458f52b87ae8981c7bd21a9b9b780c2b8be094d173b31073324f365c18cbb3e0',100,75,'0606060606','917481366648',1,0,NULL,0,'82.251.191.80','image-1586603866.jpg',0,0),(14,'nathan.letourneau@net-c.com','Letourneau','Nathan','rondin','092b191016eb415a5446983dfb103a0859b8dd6a47ff5e0e0b913a111c892a64',100,75,'9999999999','776543168102',0,0,NULL,0,'89.80.47.126','image-1586893382.jpg',0,0),(15,'other@other.fr','Letourneau','Nathan','proutdu77','092b191016eb415a5446983dfb103a0859b8dd6a47ff5e0e0b913a111c892a64',100,75,'5555555555','531503167616',0,0,NULL,0,'89.80.47.126','image-1586893554.jpg',0,0),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,0,0),(21,'blackoscapos@gmail.com','Goku','Vegeta','kakarootoo','a9ea23d80f977f2200ef5ca604e48f8fe2b6999fa5bebefee7dab5a8fe4c2918',100,1,'0633406481','724077372437',1,0,NULL,0,'93.23.15.5','image-1587146146.png',0,0),(22,'fernandesamilcar28@gmail.com','Wayne','Bruce','Batman94','af411b6e68157b220f4df7693f9928d2cd7ca11eb1a701f6d019604525ae0e7b',100,133,'0633406481','112947976408',0,0,NULL,0,'93.23.15.5','image-1587147187.png',0,0);
/*!40000 ALTER TABLE `USR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `id_captcha` int(11) NOT NULL AUTO_INCREMENT,
  `linkfolder` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_captcha`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
INSERT INTO `captcha` VALUES (1,'captchaimg/apple','apple'),(2,'captchaimg/sun','sun'),(3,'captchaimg/thief','thief');
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-17 20:57:09
