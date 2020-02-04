-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 04 fév. 2020 à 22:02
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `action_report`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `Adresse_Id` int(11) NOT NULL,
  `Numero` varchar(10) NOT NULL,
  `Rue` varchar(30) NOT NULL,
  `Code_Postal` int(11) NOT NULL,
  `Commune` varchar(10) NOT NULL,
  PRIMARY KEY (`Adresse_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `Droit_Id` int(11) NOT NULL,
  `Droit_Description` varchar(30) NOT NULL,
  PRIMARY KEY (`Droit_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `Intervention_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `OPM` tinyint(1) NOT NULL,
  `Important` tinyint(1) NOT NULL,
  `Date_Debut` datetime NOT NULL,
  `Date_fin` datetime NOT NULL,
  `Adresse_Id` int(11) NOT NULL,
  `Type_Id` varchar(5) NOT NULL,
  `Requerant_Id` int(11) NOT NULL,
  `Responsable_Id` int(11) NOT NULL,
  PRIMARY KEY (`Intervention_Id`),
  KEY `Requerant_Id` (`Requerant_Id`),
  KEY `Adresse_Id` (`Adresse_Id`),
  KEY `Type_Id` (`Type_Id`),
  KEY `Responsable_Id` (`Responsable_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `intervention_vehicule`
--

DROP TABLE IF EXISTS `intervention_vehicule`;
CREATE TABLE IF NOT EXISTS `intervention_vehicule` (
  `Vehicule_Code` varchar(10) NOT NULL,
  `Intervention_ID` int(11) NOT NULL,
  `Date_Depart` datetime NOT NULL,
  `Date_Arrive` datetime NOT NULL,
  `DateRetour` datetime NOT NULL,
  PRIMARY KEY (`Vehicule_Code`,`Intervention_ID`),
  KEY `Intervention_ID` (`Intervention_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pompier`
--

DROP TABLE IF EXISTS `pompier`;
CREATE TABLE IF NOT EXISTS `pompier` (
  `Pompier_Id` int(11) NOT NULL,
  `Pompier_Prenom` varchar(20) NOT NULL,
  `Pompier_Nom` varchar(30) NOT NULL,
  `Droit_Id` int(11) NOT NULL,
  PRIMARY KEY (`Pompier_Id`),
  KEY `Droit_Id` (`Droit_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pompier_roles`
--

DROP TABLE IF EXISTS `pompier_roles`;
CREATE TABLE IF NOT EXISTS `pompier_roles` (
  `Pompier_Id` int(11) NOT NULL,
  `Vehicule_Code` varchar(10) NOT NULL,
  `Intervention_Id` int(11) NOT NULL,
  `Role_Id` int(11) NOT NULL,
  PRIMARY KEY (`Pompier_Id`,`Vehicule_Code`,`Intervention_Id`),
  KEY `Vehicule_Code` (`Vehicule_Code`),
  KEY `Intervention_Id` (`Intervention_Id`),
  KEY `Role_Id` (`Role_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `requerant`
--

DROP TABLE IF EXISTS `requerant`;
CREATE TABLE IF NOT EXISTS `requerant` (
  `Requerant_Id` int(11) NOT NULL,
  `Description` varchar(64) NOT NULL,
  PRIMARY KEY (`Requerant_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Role_Id` int(11) NOT NULL,
  `Role_NAME` varchar(25) NOT NULL,
  PRIMARY KEY (`Role_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_intervention`
--

DROP TABLE IF EXISTS `type_intervention`;
CREATE TABLE IF NOT EXISTS `type_intervention` (
  `TI_Code` varchar(5) NOT NULL,
  `TI_Description` varchar(30) NOT NULL,
  PRIMARY KEY (`TI_Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `Vehicule_Code` varchar(10) NOT NULL,
  `Vehicule_Description` varchar(60) NOT NULL,
  `NbPlaces_Dispo` int(11) NOT NULL,
  PRIMARY KEY (`Vehicule_Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_role`
--

DROP TABLE IF EXISTS `vehicule_role`;
CREATE TABLE IF NOT EXISTS `vehicule_role` (
  `vehicule_Code` varchar(10) NOT NULL,
  `Role_Id` int(11) NOT NULL,
  PRIMARY KEY (`vehicule_Code`,`Role_Id`),
  KEY `Role_Id` (`Role_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
