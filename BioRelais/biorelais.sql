-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 jan. 2021 à 09:30
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biorelais`
--
CREATE DATABASE IF NOT EXISTS `biorelais` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biorelais`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ClientId` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ClientId`, `UserEmail`) VALUES
(1, 'brung.mathieu@gmail.com'),
(2, 'clienttest@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `grower`
--

CREATE TABLE `grower` (
  `GrowerId` int(11) NOT NULL,
  `GrowerStreet` varchar(100) NOT NULL,
  `GrowerCity` varchar(100) NOT NULL,
  `GrowerPostalCode` varchar(5) NOT NULL,
  `GrowerCompanyName` varchar(50) NOT NULL,
  `GrowerCompanyPresentation` text DEFAULT NULL,
  `UserEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grower`
--

INSERT INTO `grower` (`GrowerId`, `GrowerStreet`, `GrowerCity`, `GrowerPostalCode`, `GrowerCompanyName`, `GrowerCompanyPresentation`, `UserEmail`) VALUES
(1, 'Maison \"DUMENE\"', 'GAUJACQ', '40330', 'La Cabane Landaise', 'La Famille COMET est heureuse de vous présenter ses produits traditionnels du terroir landais.', 'cabanelandaise@gmail.com'),
(2, 'Chemin de Langlet', 'Eysines', '33320', 'Le Jardin de Quentin', 'Producteur de légumes Bio en Gironde de génération en génération.', 'jardinquentin@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `manager`
--

CREATE TABLE `manager` (
  `ManagerId` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ordered`
--

CREATE TABLE `ordered` (
  `OrderId` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `ClientId` int(11) NOT NULL,
  `OSCode` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordered`
--

INSERT INTO `ordered` (`OrderId`, `OrderDate`, `ClientId`, `OSCode`) VALUES
(3, '2020-12-29', 1, 'V'),
(4, '2020-12-29', 1, 'V'),
(5, '2020-12-29', 2, 'V'),
(6, '2020-12-29', 2, 'V'),
(7, '2021-01-01', 1, 'V'),
(8, '2021-01-01', 2, 'V'),
(9, '2021-01-02', 1, 'V'),
(10, '2021-01-02', 1, 'V'),
(11, '2021-01-02', 1, 'V'),
(12, '2021-01-03', 6, 'V'),
(13, '2021-01-04', 1, 'V');

-- --------------------------------------------------------

--
-- Structure de la table `ordered_line`
--

CREATE TABLE `ordered_line` (
  `OLQuantity` int(11) NOT NULL,
  `OLPrice` float NOT NULL,
  `OLDiscount` float NOT NULL,
  `ProductsId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordered_line`
--

INSERT INTO `ordered_line` (`OLQuantity`, `OLPrice`, `OLDiscount`, `ProductsId`, `OrderId`) VALUES
(5, 25, 0, 1, 3),
(4, 20, 0, 1, 4),
(2, 10, 0, 1, 5),
(8, 40, 0, 1, 6),
(1, 5, 0, 1, 7),
(1, 5, 0, 1, 8),
(3, 15, 0, 1, 9),
(2, 10, 0, 1, 10),
(1, 5, 0, 1, 12),
(1, 5, 0, 1, 13),
(4, 16, 0, 2, 3),
(10, 40, 0, 2, 4),
(3, 12, 0, 2, 5),
(7, 28, 0, 2, 6),
(1, 4, 0, 2, 7),
(2, 8, 0, 2, 8),
(4, 16, 0, 2, 9),
(2, 8, 0, 2, 13),
(3, 6.3, 0, 4, 3),
(2, 4.2, 0, 4, 4),
(3, 6.3, 0, 4, 5),
(7, 14.7, 0, 4, 6),
(1, 2.1, 0, 4, 7),
(3, 6.3, 0, 4, 8),
(1, 2.1, 0, 4, 11),
(2, 4.2, 0, 4, 12),
(2, 4.2, 0, 4, 13),
(2, 5.6, 0, 6, 3),
(4, 11.2, 0, 6, 4),
(3, 8.4, 0, 6, 5),
(2, 5.6, 0, 6, 6),
(1, 2.8, 0, 6, 7),
(4, 11.2, 0, 6, 8),
(2, 5.6, 0, 6, 11),
(1, 2.8, 0, 6, 12),
(1, 2.8, 0, 6, 13);

-- --------------------------------------------------------

--
-- Structure de la table `ordered_status`
--

CREATE TABLE `ordered_status` (
  `OSCode` char(1) NOT NULL,
  `OSName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordered_status`
--

INSERT INTO `ordered_status` (`OSCode`, `OSName`) VALUES
('P', 'Payée'),
('V', 'Validée');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ProductsId` int(11) NOT NULL,
  `ProductsName` varchar(50) NOT NULL,
  `ProductsPresentation` text DEFAULT NULL,
  `ProductsTVA` float DEFAULT NULL,
  `GrowerId` int(11) NOT NULL,
  `PCCode` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ProductsId`, `ProductsName`, `ProductsPresentation`, `ProductsTVA`, `GrowerId`, `PCCode`) VALUES
(1, 'Carottes', 'Carottes lavées, produites en agriculture raisonnées.', 20, 1, 'LGM'),
(2, 'Céleri branche', 'Un pied de céleri branche (entre 800g et 1kg).', 20, 1, 'LGM'),
(3, 'Courges Buttercup', 'Très bonne qualité gustative (proche du potimarron). Bonne conservation.', 20, 1, 'LGM'),
(4, 'Pommes chantecler', 'Variété reinette jaune\r\nElle est croquante avec un arrière goût sucré/amer.', 20, 2, 'FRT'),
(5, 'Longues de Nice', 'Une sorte de courgette longue collée à une courgette ronde ! Sa taille peut varier de 60 cm à 1 m. Sa chair ferme a un goût musqué et sucré. L\'épiderme, d\'abord vert, vire à l\'ocre à maturité. Ils sont utilisés pour faire des soupes, des tartes de la purée et des gâteaux.', 20, 2, 'LGM'),
(6, 'Pommes pitchounettes', 'Croquante, parfumée, juteuse, sucrée, douce...\r\nVariété de la famille des reinettes... Calibre moyen', 20, 2, 'FRT');

-- --------------------------------------------------------

--
-- Structure de la table `products_category`
--

CREATE TABLE `products_category` (
  `PCCode` char(3) NOT NULL,
  `PCName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_category`
--

INSERT INTO `products_category` (`PCCode`, `PCName`) VALUES
('BLG', 'Boulangerie'),
('BSN', 'Boissons'),
('CRM', 'Crèmerie'),
('EPC', 'Épicerie'),
('FRT', 'Fruits'),
('LGM', 'Légumes'),
('VND', 'Viandes');

-- --------------------------------------------------------

--
-- Structure de la table `sale`
--

CREATE TABLE `sale` (
  `SaleId` int(11) NOT NULL,
  `SaleWeek` date NOT NULL,
  `SaleDateStartGrower` datetime NOT NULL,
  `SaleDateEndGrower` datetime NOT NULL,
  `SaleDateStartClient` datetime NOT NULL,
  `SaleDateEndClient` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sale`
--

INSERT INTO `sale` (`SaleId`, `SaleWeek`, `SaleDateStartGrower`, `SaleDateEndGrower`, `SaleDateStartClient`, `SaleDateEndClient`) VALUES
(1, '2020-12-20', '2020-12-20 09:23:20', '2020-12-22 09:23:20', '2020-12-22 09:23:20', '2020-12-26 09:23:20');

-- --------------------------------------------------------

--
-- Structure de la table `sale_line`
--

CREATE TABLE `sale_line` (
  `SLQuantity` int(11) NOT NULL,
  `SLUnitPrice` float NOT NULL,
  `SLProductUnit` char(3) NOT NULL,
  `SaleId` int(11) NOT NULL,
  `ProductsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sale_line`
--

INSERT INTO `sale_line` (`SLQuantity`, `SLUnitPrice`, `SLProductUnit`, `SaleId`, `ProductsId`) VALUES
(31, 5, 'kg', 1, 1),
(11, 4, 'kg', 1, 2),
(61, 2.1, 'kg', 1, 4),
(41, 2.8, 'kg', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `UserEmail` varchar(100) NOT NULL,
  `UserLastName` varchar(50) NOT NULL,
  `UserFirstName` varchar(50) NOT NULL,
  `UserPhoneNumber` varchar(12) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UTCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`UserEmail`, `UserLastName`, `UserFirstName`, `UserPhoneNumber`, `UserPassword`, `UTCode`) VALUES
('brung.mathieu@gmail.com', 'Dumora--Brung', 'Mathieu', '0615719695', '94e89013258dfaca1363c8e1859098f0', 1),
('cabanelandaise@gmail.com', 'Comet', 'Michel', '0558890341', '91b85c935a9cb4d8ba9d8fb98b41bcee', 2),
('jardinquentin@gmail.com', 'Sournac', 'Philippe', '0667838484', '1a9a3dd12e8369f8d3f21ec8328e7b13', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_type`
--

CREATE TABLE `user_type` (
  `UTCode` int(11) NOT NULL,
  `UTName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_type`
--

INSERT INTO `user_type` (`UTCode`, `UTName`) VALUES
(1, 'Abonné'),
(2, 'Producteur'),
(3, 'Responsable');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientId`),
  ADD KEY `UserEmail` (`UserEmail`);

--
-- Index pour la table `grower`
--
ALTER TABLE `grower`
  ADD PRIMARY KEY (`GrowerId`),
  ADD KEY `UserEmail` (`UserEmail`);

--
-- Index pour la table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerId`),
  ADD KEY `UserEmail` (`UserEmail`);

--
-- Index pour la table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `ClientId` (`ClientId`),
  ADD KEY `OSCode` (`OSCode`);

--
-- Index pour la table `ordered_line`
--
ALTER TABLE `ordered_line`
  ADD PRIMARY KEY (`ProductsId`,`OrderId`),
  ADD KEY `OrderId` (`OrderId`);

--
-- Index pour la table `ordered_status`
--
ALTER TABLE `ordered_status`
  ADD PRIMARY KEY (`OSCode`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductsId`),
  ADD KEY `GrowerId` (`GrowerId`),
  ADD KEY `PCCode` (`PCCode`);

--
-- Index pour la table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`PCCode`);

--
-- Index pour la table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`SaleId`);

--
-- Index pour la table `sale_line`
--
ALTER TABLE `sale_line`
  ADD PRIMARY KEY (`SaleId`,`ProductsId`),
  ADD KEY `ProductsId` (`ProductsId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserEmail`),
  ADD KEY `UTCode` (`UTCode`);

--
-- Index pour la table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`UTCode`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ClientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `grower`
--
ALTER TABLE `grower`
  MODIFY `GrowerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `manager`
--
ALTER TABLE `manager`
  MODIFY `ManagerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `ProductsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sale`
--
ALTER TABLE `sale`
  MODIFY `SaleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `UTCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`UserEmail`) REFERENCES `user` (`UserEmail`);

--
-- Contraintes pour la table `grower`
--
ALTER TABLE `grower`
  ADD CONSTRAINT `grower_ibfk_1` FOREIGN KEY (`UserEmail`) REFERENCES `user` (`UserEmail`);

--
-- Contraintes pour la table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`UserEmail`) REFERENCES `user` (`UserEmail`);

--
-- Contraintes pour la table `ordered`
--
ALTER TABLE `ordered`
  ADD CONSTRAINT `ordered_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `client` (`ClientId`),
  ADD CONSTRAINT `ordered_ibfk_2` FOREIGN KEY (`OSCode`) REFERENCES `ordered_status` (`OSCode`);

--
-- Contraintes pour la table `ordered_line`
--
ALTER TABLE `ordered_line`
  ADD CONSTRAINT `ordered_line_ibfk_1` FOREIGN KEY (`ProductsId`) REFERENCES `products` (`ProductsId`),
  ADD CONSTRAINT `ordered_line_ibfk_2` FOREIGN KEY (`OrderId`) REFERENCES `ordered` (`OrderId`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`GrowerId`) REFERENCES `grower` (`GrowerId`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`PCCode`) REFERENCES `products_category` (`PCCode`);

--
-- Contraintes pour la table `sale_line`
--
ALTER TABLE `sale_line`
  ADD CONSTRAINT `sale_line_ibfk_1` FOREIGN KEY (`SaleId`) REFERENCES `sale` (`SaleId`),
  ADD CONSTRAINT `sale_line_ibfk_2` FOREIGN KEY (`ProductsId`) REFERENCES `products` (`ProductsId`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UTCode`) REFERENCES `user_type` (`UTCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
