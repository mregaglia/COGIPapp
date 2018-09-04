-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 04, 2018 at 08:39 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cogipapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id_facture` int(11) NOT NULL,
  `facture_number` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `prestation` varchar(45) DEFAULT NULL,
  `FK_societes` int(11) NOT NULL,
  `FK_personnes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id_facture`, `facture_number`, `date`, `prestation`, `FK_societes`, `FK_personnes`) VALUES
(1, 0000000123, '2017-04-11', 'depannagepc', 1, 1),
(2, 0000000146, '2017-09-03', 'developpement', 2, 2),
(3, 0000000158, '2017-11-07', 'developpement', 3, 3),
(4, 0000000178, '2018-05-07', 'achatmateriel', 4, 4),
(5, 0000000192, '2018-04-17', 'electricite', 5, 5),
(6, 0000000213, '2018-06-12', 'développement', 6, 6),
(7, 0000000245, '2018-05-14', 'développement', 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE `personnes` (
  `id_personnes` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `phone_number` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `FK_societes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`id_personnes`, `firstname`, `lastname`, `phone_number`, `email`, `FK_societes`) VALUES
(1, 'Ajay', 'Shindei', 00486326497, '2018.Ajay.Shindei@gmail.com', 1),
(2, 'Massimo', 'Regalgia', 00477586535, '2018.Massimo.Regaglia.com', 2),
(3, 'Jean', 'Michmuch', 00056331679, '2018.Jean.Michmuch@gmail.com', 3),
(4, 'Robert', 'Robertson', 00066332146, '2018.Robert.Robertson@gmail.com', 4),
(5, 'Pika', 'Pikatchuson', 00066666666, 'Pika.pikachuson@gmail.com', 5),
(6, 'Draco', 'Dracoson', 00077777777, 'Draco.Dracoson@gmail.com', 6),
(7, 'Liam', 'Carlier', 00486493061, '2016.carlier.Liam@gmail.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `societes`
--

CREATE TABLE `societes` (
  `id_society` int(11) NOT NULL,
  `society_name` varchar(45) DEFAULT NULL,
  `society_adress` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `TVA` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `society_phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `FK_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `societes`
--

INSERT INTO `societes` (`id_society`, `society_name`, `society_adress`, `country`, `TVA`, `society_phone`, `FK_type`) VALUES
(1, 'Technowash', 'Rue de la poisse, 23 - 2433 Houla', 'Belgique', '462887469', '0455729385', 1),
(2, 'Infosys', 'Rue des vilains, 55 - 7086 Bonville', 'Belgique', '735528409', '045563789', 2),
(3, 'Devbase', 'Rue des enfoirés, 77 - 10556 Goldman', 'France', '838900938', '046783987', 2),
(4, 'Webshop', 'Rue assynchrone, 20 - 7355 Vardump', 'Italie', '334567679', '049076353', 2),
(5, 'Elelkpower', 'Avenue de la rue, 134 - 1008 Place', 'France', '624435778', '043252678', 1),
(6, 'Clothinn', 'Impasse du crime, 98 - 75244 Passetatune', 'Belgique', '937365589', '047835356', 1),
(7, 'Rotarionline', 'Rue des arnaques, 88 - 87366 Loterie', 'Nigeria', '739083008', '048736357', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` enum('client','fournisseur') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'client'),
(2, 'fournisseur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `FK_societes` (`FK_societes`),
  ADD KEY `FK_personnes` (`FK_personnes`);

--
-- Indexes for table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_personnes`),
  ADD KEY `FK_societes` (`FK_societes`);

--
-- Indexes for table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`id_society`),
  ADD KEY `FK_type` (`FK_type`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_personnes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `societes`
--
ALTER TABLE `societes`
  MODIFY `id_society` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`FK_societes`) REFERENCES `societes` (`id_society`),
  ADD CONSTRAINT `factures_ibfk_2` FOREIGN KEY (`FK_personnes`) REFERENCES `personnes` (`id_personnes`);

--
-- Constraints for table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `personnes_ibfk_1` FOREIGN KEY (`FK_societes`) REFERENCES `societes` (`id_society`);

--
-- Constraints for table `societes`
--
ALTER TABLE `societes`
  ADD CONSTRAINT `societes_ibfk_1` FOREIGN KEY (`FK_type`) REFERENCES `type` (`id_type`);
