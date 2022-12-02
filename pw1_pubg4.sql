-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 déc. 2022 à 23:05
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pw1_pubg4`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(4, 'Nos CrÃ©ations'),
(5, 'Viande'),
(6, 'Poisson'),
(7, 'Ã€ Partager'),
(8, 'Burger'),
(10, 'Salade'),
(11, 'VÃ©gÃ©'),
(12, 'Tartare'),
(13, 'Chocolat'),
(15, 'Caramel');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` tinytext NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
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
-- Structure de la table `meals`
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
-- Déchargement des données de la table `meals`
--

INSERT INTO `meals` (`id`, `name`, `description`, `price`, `image`, `type_id`) VALUES
(28, 'Salade VÃ©gÃ©tarienne', 'Donec et neque quis purus cursus mattis eu pulvinar velit. Praesent commodo rutrum nisl, at ultrices sem iaculis tincidunt. Nunc molestie accumsan porta. ', 14.99, 'public/uploads/salade_grecque.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `meals_categories`
--

CREATE TABLE `meals_categories` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `meals_categories`
--

INSERT INTO `meals_categories` (`id`, `meal_id`, `category_id`) VALUES
(8, 28, 10),
(9, 28, 11);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_infos`
--

CREATE TABLE `newsletter_infos` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `newsletter_infos`
--

INSERT INTO `newsletter_infos` (`id`, `email`, `name`) VALUES
(1, 'ontest', 'sdth'),
(2, 'ontest', 'sdth'),
(3, 'ontest', 'sthjyrj'),
(4, 'whynot', 'srh'),
(5, 'dfj@fhm', 'dfykj'),
(6, 'salutbonjour@coucou.kikoo', 'sbck');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(3, 'EntrÃ©e'),
(4, 'Repas'),
(5, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `admin`) VALUES
(4, 'Gabriel', 'RhÃ©eaume', 'admin@test.com', '$2y$10$RaIgT6ctLyByiFWDV8qDTORxKIcJNNIPK0..VwoSAa4oOlXMJayXS', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `meals_categories`
--
ALTER TABLE `meals_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Index pour la table `newsletter_infos`
--
ALTER TABLE `newsletter_infos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `meals_categories`
--
ALTER TABLE `meals_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `newsletter_infos`
--
ALTER TABLE `newsletter_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `meals_categories`
--
ALTER TABLE `meals_categories`
  ADD CONSTRAINT `meals_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `meals_categories_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
