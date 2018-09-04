phpMyAdmin SQL Dump
version 4.0.10deb1
http://www.phpmyadmin.net

Client: localhost
Généré le: Jeu 19 Mai 2016 à 11:34
Version du serveur: 5.5.49-0ubuntu0.14.04.1-log
Version de PHP: 5.5.9-1ubuntu4.16
 SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 --
--
--
CREATE DATABASE IF NOT EXISTS `COGIPapp` DEFAULT CHARACTER SET utf-8 bin;
USE `COGIPapp`;
 -- --------------------------------------------------------
 --
Structure de la table `factures`
--
 DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id_facture` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `facture_number` varchar(255) NOT NULL,
  `date` date,
  `society_name` int(11) ,
  `prestation`NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;