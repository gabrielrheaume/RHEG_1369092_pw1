-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 05:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw1_pubg4`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Nos Créations'),
(5, 'Viande'),
(6, 'Poisson'),
(7, 'À Partager'),
(8, 'Burger'),
(10, 'Salade'),
(11, 'Végé'),
(12, 'Tartare'),
(13, 'Chocolat'),
(15, 'Caramel');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` tinytext NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `rating`) VALUES
(1, 'Excellent service et de la nourrite absolument délicieuse!', 5),
(2, 'Pub G4 est ma destination favorite lorsque je veux recevoir des invités. Fiables et toujours une ambiance très agréable.', 5),
(3, 'Même si les prix ne sont pas les plus bas, Pub G4 est une référence dans la qualité du service et de leur mets. Je recommande!', 4.5),
(4, 'Woow! Superbe présentation et le meilleur fish & chips que je n’ai jamais mangé!', 5),
(5, 'Une expérience agréable et un service de qualité, dommage que ce ne soit pas plus proche!', 4),
(6, 'Si vous commandez à boire, demandez les conseils de Kevin! C’est un expert!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `price` float NOT NULL,
  `image` tinytext NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `description`, `price`, `image`, `type_id`) VALUES
(29, 'Salade du Jour', 'Fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 10.99, 'public/uploads/salade_du_jour.jpg', 3),
(30, 'Potage du Moment', 'Fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 8.99, 'public/uploads/potage_du_moment.jpg', 3),
(31, 'Ailes de Lapin', 'Ut interdum viverra lacinia. Pellentesque ac nunc a nulla rutrum dictum ac ac diam. Cras vel justo ligula.  Proin ut ex et elit dapibus tempus vitae vitae magna. Nam a arcu sed ante efficitur semper. ', 16.49, 'public/uploads/ailes_lapin.jpg', 3),
(32, 'Nachos', 'Nunc et ipsum ut nisl ultricies fermentum lacinia lorem amet sit. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 18.99, 'public/uploads/nachos.jpg', 3),
(33, 'Calamar', 'Proin ut ex et elit dapibus tempus vitae vitae magna. Nam a arcu sed ante efficitur semper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 16.99, 'public/uploads/calamar.jpg', 3),
(34, 'Poutine', 'Morbi tincidunt fermentum lacinia. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi. Fusce dignissim magna eu ante tincidunt consectetur.', 14.99, 'public/uploads/poutine.jpg', 3),
(35, 'Burger double classique avec frites', 'Deux galettes de bœuf, cheddar, bacon, tomate, laitue romaine, ognon rouge, sauce maison, servi avec frites', 15.99, 'public/uploads/burger.jpg', 4),
(36, 'Filets de poulet avec frites', 'Filets de poulet pané avec un mélange d’épices maison, servis avec frites', 13.99, 'public/uploads/filets_de_poulet.jpg', 4),
(37, 'Burger au Poulet', 'Morbi tincidunt fermentum lacinia. Nunc et ipsum ut nisl ultricies vestibulum sit amet quis nisi.', 15.99, 'public/uploads/burger.jpg', 4),
(38, 'Salade Grecque', 'Donec at nisi tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. In vitae rutrum arcu. ', 18.99, 'public/uploads/salade_grecque.jpg', 4),
(39, 'Salade Végétarienne', 'Donec et neque quis purus cursus mattis eu pulvinar velit. Praesent commodo rutrum nisl, at ultrices sem iaculis tincidunt. Nunc molestie accumsan porta. ', 14.99, 'public/uploads/salade_grecque.jpg', 3),
(40, 'Tartare au Boeuf', 'Proin faucibus quam lorem, non condimentum turpis blandit non. ', 24.99, 'public/uploads/tartare_boeuf.jpg', 4),
(41, 'Tartare de Légume', 'Etiam ut tincidunt lectus. Curabitur gravida est in finibus ultricies. Vestibulum volutpat erat vel libero ultrices placerat. ', 22.99, 'public/uploads/tartare_legume.jpg', 4),
(42, 'Côtes levées (Ribs)', 'Etiam dictum purus justo, at mattis justo bibendum in. In aliquam elementum enim, quis pretium purus efficitur ac. Curabitur in pretium leo.', 19.99, 'public/uploads/ribs.jpg', 4),
(43, 'Un bon p\'tit Steak', 'Praesent aliquam a dolor eu rutrum. Sed at efficitur enim. Morbi quis placerat risus. Aenean ipsum massa, hendrerit eu molestie sit amet, mollis quis ante.  ', 14.99, 'public/uploads/chad-montano-M0lUxgLnlfk-unsplash.jpg', 4),
(44, 'Brownie', 'Vestibulum vel ex dolor. Maecenas et turpis nibh. Aliquam in imperdiet tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. ', 7.99, 'public/uploads/brownie.jpg', 5),
(45, 'Cupcake style Ferrero', 'Suspendisse id fringilla turpis. Aenean eleifend vulputate lacus, a pharetra metus. Sed eget pharetra sem. Proin tristique fringilla urna id pharetra. Vivamus sed pellentesque orci.', 8.99, 'public/uploads/cupcake_ferrero.jpg', 5),
(46, 'Gâteau au Fromage et Caramel', 'Proin tristique fringilla urna id pharetra. Vivamus sed pellentesque orci.  ', 10.99, 'public/uploads/gateau_fromage_caramel.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `meals_categories`
--

CREATE TABLE `meals_categories` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals_categories`
--

INSERT INTO `meals_categories` (`id`, `meal_id`, `category_id`) VALUES
(10, 29, 4),
(11, 30, 4),
(12, 31, 5),
(13, 32, 7),
(14, 33, 6),
(15, 34, 4),
(16, 35, 8),
(17, 36, 5),
(18, 37, 8),
(19, 38, 10),
(20, 39, 11),
(21, 39, 10),
(22, 40, 5),
(23, 40, 12),
(24, 41, 12),
(25, 41, 11),
(26, 42, 5),
(27, 43, 5),
(28, 44, 13),
(29, 45, 13),
(30, 46, 15);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_infos`
--

CREATE TABLE `newsletter_infos` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(3, 'Entrée'),
(4, 'Repas'),
(5, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `admin`) VALUES
(4, 'Gabriel', 'Rhéaume', 'admin@test.com', '$2y$10$RaIgT6ctLyByiFWDV8qDTORxKIcJNNIPK0..VwoSAa4oOlXMJayXS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `meals_categories`
--
ALTER TABLE `meals_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `newsletter_infos`
--
ALTER TABLE `newsletter_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `meals_categories`
--
ALTER TABLE `meals_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newsletter_infos`
--
ALTER TABLE `newsletter_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `meals_categories`
--
ALTER TABLE `meals_categories`
  ADD CONSTRAINT `meals_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `meals_categories_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
