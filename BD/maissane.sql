-- MySQL dump 10.13  Distrib 5.6.27, for osx10.8 (x86_64)
--
-- Host: localhost    Database: supremcoach
-- ------------------------------------------------------
-- Server version	5.6.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonnement` (
  `idabo` int(3) NOT NULL,
  `idpcl` int(3) NOT NULL,
  `libabo` varchar(50) DEFAULT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  PRIMARY KEY (`idabo`),
  KEY `idpcl` (`idpcl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnement`
--

LOCK TABLES `abonnement` WRITE;
/*!40000 ALTER TABLE `abonnement` DISABLE KEYS */;
INSERT INTO `abonnement` VALUES (1,7,'dede','2016-02-04',NULL);
/*!40000 ALTER TABLE `abonnement` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger etat
before update on abonnement 
for each row 
begin
if new.datedebut is NULL
then update client 
SET etat='prospect';
end if;
if old.datefin is NOT NULL 
then update client
SET etat='inactif';
end if;
if new.datedebut is NOT NULL 
and new.datefin is NULL OR new.datefin>curedate()
then update client
SET etat='actif';
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrateur` (
  `ida` int(3) NOT NULL AUTO_INCREMENT,
  `nomp` varchar(50) DEFAULT NULL,
  `prenomp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `mdp` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ida`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateur`
--

LOCK TABLES `administrateur` WRITE;
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` VALUES (1,'admina','jj','j','jj','j','j','jjj','jjj','j');
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger ajoutadmin
before insert on administrateur
for each row
begin
declare x int;
declare num int;
Select max(idP) into num from personne;
Select count(*) into x from personne where idp=new.ida;
if num is null
then
set num=1;
else
set num=num+1;
end if;
if new.ida=num
then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Erreur id';
end if;
if x=0 
then
insert into personne (idp, nomp, prenomp, adresse, cp, telephone, email, avatar, pseudo, mdp) values (num, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from client where idpcl=new.ida;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='L administrateur est déja client';

end if;
Select count(*) into x from coach where idpco=new.ida;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='L administrateur ne peut être coach';

end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `idpcl` int(3) NOT NULL AUTO_INCREMENT,
  `nomp` varchar(50) DEFAULT NULL,
  `prenomp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `etat` enum('prospect','actif','inactif') DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `pseudo` varchar(60) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idpcl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'kk','k','k','kk','kkk','actif','kkk','kkkk','kk','kk'),(2,'jjj','jjj','jjj','jjj','jjj','actif','jjjj','jjjj','jjjj','jjjj');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger ajoutclient
before insert on client
for each row
begin
declare x int;
declare num int;
Select max(idP) into num from personne;
Select count(*) into x from personne where idp=new.idpcl;
if num is null
then
set num=1;
else
set num=num+1;
end if;
if new.idpcl=num
then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Erreur id';
end if;
if x=0 
then
insert into personne (idp, nomp, prenomp, adresse, cp, telephone, email, avatar, pseudo, mdp) values(num, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from administrateur where ida=new.idpcl;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le client est déja administrateurs';

end if;
Select count(*) into x from gestionnaire where idg=new.idpcl;
if x>0 then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Le client est déja gestionnaire';

end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `coach`
--

DROP TABLE IF EXISTS `coach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coach` (
  `idpco` int(11) NOT NULL AUTO_INCREMENT,
  `iddis` int(3) DEFAULT NULL,
  `nomp` varchar(50) DEFAULT NULL,
  `prenomp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `pseudo` varchar(60) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idpco`),
  KEY `iddis` (`iddis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coach`
--

LOCK TABLES `coach` WRITE;
/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
INSERT INTO `coach` VALUES (1,0,'jjjj','jjjj','jjj','92600','jjjjj','jjjjjj','jjjj','jjjj','jjjj'),(2,0,'u','u','uu','u','u','uuu','uuu','uuuu','uuuu');
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger ajoutcoach
before insert on coach
for each row
begin
declare x int;
declare num int;
Select count(*) into x from personne where idp=new.idpco;
Select max(idP) into num from personne;
if num is null
then
set num=1;
else
set num=num+1;
end if;
if new.idpco=num
then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Erreur id';
end if;
if x=0 
then
insert into personne (idp, nomp, prenomp, adresse, cp, telephone, email, avatar, pseudo, mdp) values(num, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from client where idpcl=new.idpco;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le coach est déja client';

end if;
Select count(*) into x from administrateur where ida=new.idpco;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le coach est déja administrateur';

end if;
Select count(*) into x from gestionnaire where idg=new.idpco;
if x>0 then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Le coach est déja gestionnaire';

end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `discipline`
--

DROP TABLE IF EXISTS `discipline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discipline` (
  `iddis` int(3) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iddis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discipline`
--

LOCK TABLES `discipline` WRITE;
/*!40000 ALTER TABLE `discipline` DISABLE KEYS */;
INSERT INTO `discipline` VALUES (1,'musculation');
/*!40000 ALTER TABLE `discipline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facture` (
  `idfact` int(3) NOT NULL,
  `idabo` int(3) NOT NULL,
  `idg` int(3) NOT NULL,
  `datefacture` date DEFAULT NULL,
  PRIMARY KEY (`idfact`),
  KEY `idg` (`idg`),
  KEY `idabo` (`idabo`),
  CONSTRAINT `facture_ibfk_2` FOREIGN KEY (`idabo`) REFERENCES `abonnement` (`idabo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facture`
--

LOCK TABLES `facture` WRITE;
/*!40000 ALTER TABLE `facture` DISABLE KEYS */;
/*!40000 ALTER TABLE `facture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestionnaire` (
  `idg` int(3) NOT NULL AUTO_INCREMENT,
  `nomp` varchar(50) DEFAULT NULL,
  `prenomp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `pseudo` varchar(60) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestionnaire`
--

LOCK TABLES `gestionnaire` WRITE;
/*!40000 ALTER TABLE `gestionnaire` DISABLE KEYS */;
INSERT INTO `gestionnaire` VALUES (1,'ggg','gg','g','g','g','g','g','gggg','ggg');
/*!40000 ALTER TABLE `gestionnaire` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger ajoutgestionnaire
before insert on gestionnaire
for each row
begin
declare x int;
declare num int;
Select count(*) into x from personne where idp=new.idg;
Select max(idP) into num from personne;
if num is null
then
set num=1;
else
set num=num+1;
end if;
if new.idg=num
then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Erreur id';
end if;
if x=0 
then
insert into personne (idp, nomp, prenomp, adresse, cp, telephone, email, avatar, pseudo, mdp) values (num, new.nomp, new.prenomp, new.adresse, new.cp, new.telephone, new.email,
new.avatar, new.pseudo, new.mdp);
end if;
Select count(*) into x from client where idpcl=new.idg;
if x>0 then SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT='Le gestionnaire est déja client';

end if;
Select count(*) into x from coach where idpco=new.idg;
if x>0 then SIGNAL SQLSTATE  '45000' SET MESSAGE_TEXT='Le gestionnaire est déja coach';

end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personne` (
  `idp` int(3) DEFAULT NULL,
  `nomp` varchar(50) DEFAULT NULL,
  `prenomp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `pseudo` varchar(200) NOT NULL,
  `mdp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personne`
--

LOCK TABLES `personne` WRITE;
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` VALUES (1,'kk','k','k','kk','kkk','kkk','kkkk','kk','kk'),(2,'jjj','jjj','jjj','jjj','jjj','jjjj','jjjj','jjjj','jjjj'),(3,'admina','jj','j','jj','j','jjj','j','jjj','j'),(4,'u','u','uu','u','u','uuu','uuu','uuuu','uuuu'),(5,'ggg','gg','g','g','g','g','ggg','g','gggg');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rdv` (
  `idpco` int(3) NOT NULL,
  `idpcl` int(3) NOT NULL,
  `ids` int(3) NOT NULL,
  `datedebut` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `datefin` datetime DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idpco`,`idpcl`,`ids`,`datedebut`),
  KEY `idpcl` (`idpcl`),
  KEY `ids` (`ids`),
  CONSTRAINT `rdv_ibfk_3` FOREIGN KEY (`ids`) REFERENCES `salle` (`idsalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rdv`
--

LOCK TABLES `rdv` WRITE;
/*!40000 ALTER TABLE `rdv` DISABLE KEYS */;
/*!40000 ALTER TABLE `rdv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salle`
--

DROP TABLE IF EXISTS `salle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salle` (
  `idsalle` int(3) NOT NULL,
  PRIMARY KEY (`idsalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salle`
--

LOCK TABLES `salle` WRITE;
/*!40000 ALTER TABLE `salle` DISABLE KEYS */;
/*!40000 ALTER TABLE `salle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stats_visites`
--

DROP TABLE IF EXISTS `stats_visites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stats_visites` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `agent` varchar(150) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `port` int(10) NOT NULL,
  `langue` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `date_visite` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3105 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stats_visites`
--

LOCK TABLES `stats_visites` WRITE;
/*!40000 ALTER TABLE `stats_visites` DISABLE KEYS */;
/*!40000 ALTER TABLE `stats_visites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_billet`
--

DROP TABLE IF EXISTS `t_billet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_billet` (
  `BIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BIL_DATE` datetime NOT NULL,
  `BIL_TITRE` varchar(100) NOT NULL,
  `BIL_CONTENU` text NOT NULL,
  PRIMARY KEY (`BIL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_billet`
--

LOCK TABLES `t_billet` WRITE;
/*!40000 ALTER TABLE `t_billet` DISABLE KEYS */;
INSERT INTO `t_billet` VALUES (1,'2015-12-11 17:36:16','Réserver votre rendez-vous!','- Inscrivez-vous\n-Prenez un rendez-vous\n-Reserver votre coach\n-Motivez vous\n-Votre corps, vous remercer'),(2,'2015-12-11 17:36:16','Motivez-vous ','Vous sortez de votre travail et vous n\'avez qu\'une idée en tête : décompresser ! Et comme beaucoup, vous trouvez la solution dans la pratique d\'une activité sportive. Alors vous voilà jeté(e) avec un entrain certain dans l\'effort, vous évertuant à vous dépenser et à évacuer les soucis professionnels, les discussions houleuses avec votre conjoint, les prises de bec avec votre ado qui ne veut en faire qu\'à sa tête ! Penser à vous, rien qu\'à vous, c\'est aussi ce qui vous fait faire régulièrement un sport. D\'une simple pratique de loisir, vous vous prenez au jeu.');
/*!40000 ALTER TABLE `t_billet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_commentaire`
--

DROP TABLE IF EXISTS `t_commentaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`COM_ID`),
  KEY `fk_com_bil` (`BIL_ID`),
  CONSTRAINT `fk_com_bil` FOREIGN KEY (`BIL_ID`) REFERENCES `t_billet` (`BIL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_commentaire`
--

LOCK TABLES `t_commentaire` WRITE;
/*!40000 ALTER TABLE `t_commentaire` DISABLE KEYS */;
INSERT INTO `t_commentaire` VALUES (1,'2015-12-11 17:36:16','A. Nonyme','Bravo pour ce début',1),(2,'2015-12-11 17:36:16','Moi','Merci ! Je vais continuer sur ma lancée',1),(3,'2015-12-18 16:03:48','dd','dd',2),(4,'2015-12-24 19:50:05','dd','mlm',2);
/*!40000 ALTER TABLE `t_commentaire` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-17 12:25:08