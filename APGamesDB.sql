-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 14 nov. 2021 à 22:24
-- Version du serveur :  10.5.12-MariaDB-1build1
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `APGamesDB`
--
CREATE DATABASE IF NOT EXISTS `APGamesDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `APGamesDB`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Jeux Vidéo'),
(2, 'Jeux de Société');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211104124104', '2021-11-04 13:41:11', 418),
('DoctrineMigrations\\Version20211104124305', '2021-11-04 13:43:11', 38),
('DoctrineMigrations\\Version20211105092001', '2021-11-05 10:20:09', 27);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ord_order_date` datetime NOT NULL,
  `ord_payment_date` datetime DEFAULT NULL,
  `ord_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `ode_ord_id` int(11) NOT NULL,
  `ode_pro_id` int(11) NOT NULL,
  `ode_unit_price` decimal(7,2) NOT NULL,
  `ode_quantity` int(11) NOT NULL,
  `ode_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_sup_id` int(11) NOT NULL,
  `pro_sub_cat_id` int(11) DEFAULT NULL,
  `pro_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` decimal(7,2) DEFAULT NULL,
  `pro_vat` decimal(7,2) DEFAULT NULL,
  `pro_ref` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_stock` int(11) DEFAULT NULL,
  `pro_wording` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_picture` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_date_add` datetime NOT NULL,
  `pro_date_modif` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `pro_sup_id`, `pro_sub_cat_id`, `pro_name`, `pro_price`, `pro_vat`, `pro_ref`, `pro_stock`, `pro_wording`, `pro_description`, `pro_picture`, `pro_date_add`, `pro_date_modif`) VALUES
(1, 1, 2, 'Battlefield 2042', '59.00', '0.00', 'BATFL', 50, 'Jeu', 'Jeu vidéo', '1.jpeg', '2020-01-26 17:31:39', '2021-10-27 12:18:00'),
(2, 2, 1, 'Super Mario 3D World', '59.99', '0.00', 'SMB3DW', 75, 'Jeu', 'Jeu vidéo', '2.jpg', '2019-12-23 16:24:20', NULL),
(3, 3, 2, 'Call of Duty: Vanguard', '69.99', '0.00', 'CoDV', 100, 'Jeu', 'Jeu vidéo', '3.jpg', '2019-11-17 09:29:26', NULL),
(4, 4, 7, 'Assassins Creed Valhalla', '69.99', '0.00', 'ACV', 75, 'Jeu', 'Jeu vidéo', '4.jpg', '2021-09-13 08:41:45', NULL),
(5, 5, 7, 'Tales of Arise', '79.99', '0.00', 'ToA', 150, 'Jeu', 'Jeu vidéo', '5.jpg', '2021-09-01 07:06:15', NULL),
(6, 6, 2, 'Hitman 2', '49.99', '0.00', 'HIT2', 100, 'Jeu', 'Jeu vidéo', '6.png', '2020-05-16 14:25:35', NULL),
(7, 7, 3, 'Grand Theft Auto V', '39.99', '0.00', 'GTA5', 250, 'Jeu', 'Jeu vidéo', '7.jpg', '2020-12-04 22:30:52', NULL),
(8, 8, 7, 'God of War: Ragnarok', '74.99', '0.00', 'GoWR', 500, 'Jeu', 'Jeu vidéo', '8.jpg', '2020-04-14 23:19:45', NULL),
(9, 9, 3, 'The Elder Scrolls V: Skyrim', '59.99', '0.00', 'TES5S', 200, 'Jeu', 'Jeu vidéo', '9.jpg', '2019-10-31 01:10:58', NULL),
(10, 10, 7, 'Escape Dead Island', '29.00', '0.00', 'EDEADI', 50, 'Jeu', 'Jeu vidéo', '10.jpeg', '2021-10-27 15:15:34', '2021-10-27 17:11:00'),
(15, 1, 10, 'TheSims4', '25.00', '0.00', 'theSims', 2, 'ajgasjksah', 'jgdkdjl', '15.png', '2021-10-27 17:09:00', '2021-10-27 17:09:00');

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_cat_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cat_id`, `sub_cat_name`) VALUES
(1, 1, 'Jeu de Plateforme'),
(2, 1, 'FPS'),
(3, 1, 'RPG'),
(4, 1, 'MMORPG'),
(5, 1, 'MOBA'),
(6, 1, 'RTS'),
(7, 1, 'Aventure'),
(8, 1, 'Course'),
(9, 1, 'Gestion/Wargame'),
(10, 1, 'Simulation'),
(11, 1, 'Sport'),
(12, 1, 'Compilation');

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `cou_id` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_contact_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_zipcode` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suppliers`
--

INSERT INTO `suppliers` (`id`, `cou_id`, `sup_company_name`, `sup_contact_name`, `sup_address`, `sup_zipcode`, `sup_city`, `sup_phone`, `sup_mail`) VALUES
(1, 'US', 'Electronics Arts', 'Trip Hawkins', '1 avenue Cyril Hanouna', '94061', 'Redwood City', '0184656242', 'contact@hsp.fr'),
(2, 'JP', 'Nintendo', 'Fusajiro Yamauchi', '200 boulevard Eve Angeli', '520-0461', 'Kyoto', '0308351147', 'gibsonplus@gmail.com'),
(3, 'US', 'Activion-Blizzard', 'Robert Kotick', '31 rue Nabilla Benattia', '94061', 'Santa Monica', '0147492504', 'asba.instru@laposte.net'),
(4, 'FR', 'Ubisoft', 'Yves Guillemot', '56 avenue Donald Trump', '93100', 'Montreuil', '0231996082', 'gmenfain@gretsch.com'),
(5, 'JP', 'Bandai-Namco', 'Masaya Nakamura', '112 rue de Pékin', '100-8602', 'Minato-ku', '0312765204', 'chang.li@yamaha.cn'),
(6, 'US', 'Warner Interactive', 'Jace Hall', '3 place Andre', '91501', 'Burbank', '0145465519', 'faffayofoize-8037@yopmail.com'),
(7, 'US', 'Rockstar Games', 'Sam Houser', '70 chemin Louis', '10001', 'New York', '0511350116', 'xanigroupuyau-2675@yopmail.com'),
(8, 'JP', 'Sony', 'Akio Morita', '8 place Audrey Daniel', '100-8602', 'Minato-ku', '0264978827', 'deuwiprinnoya-2655@yopmail.com'),
(9, 'US', 'Bethesda', 'Christopher Weaver', 'impasse de Pierre', '20847', 'Rockville', '0187575924', 'yatreigeiquitrau-3178@yopmail.com'),
(10, 'DE', 'Koch Media', 'Klemens Kundratitz', '98 chemin Tanguy', '82152', 'Planegg', '0449988558', 'weffecrequeiyu-7551@yopmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
(8, 'admin@afpa.fr', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$5NCFW3pQCAgR8QGNQcMJhA$K8yH9O7XDhKWbMnixK/uedranJxkCVd70ThjqQzoF98', 1),
(9, 'user@afpa.fr', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$1YLPe5ttAxcIUq2TOswixw$sWhmR8KoA+XYfUVxNWV66HWvDQ5RNxhDhln6bya1gB8', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_835379F1D88BA2F4` (`ode_ord_id`),
  ADD KEY `IDX_835379F1FD0A95BB` (`ode_pro_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B3BA5A5A597B819A` (`pro_sup_id`),
  ADD KEY `IDX_B3BA5A5AE78A57AF` (`pro_sub_cat_id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6562A1CBE6ADA943` (`cat_id`);

--
-- Index pour la table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC28B95CE1217047` (`cou_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `FK_835379F1D88BA2F4` FOREIGN KEY (`ode_ord_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_835379F1FD0A95BB` FOREIGN KEY (`ode_pro_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_B3BA5A5A597B819A` FOREIGN KEY (`pro_sup_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `FK_B3BA5A5AE78A57AF` FOREIGN KEY (`pro_sub_cat_id`) REFERENCES `subcategories` (`id`);

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `FK_6562A1CBE6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `FK_AC28B95CE1217047` FOREIGN KEY (`cou_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
