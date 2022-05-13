-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 mai 2022 à 21:49
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblioweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(30) NOT NULL DEFAULT '',
  `firstname` varchar(30) NOT NULL DEFAULT '',
  `nationality` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id`, `lastname`, `firstname`, `nationality`) VALUES
(1, 'Simenon', 'Georges', 'Belgique'),
(2, 'Zola', 'Émile', 'France'),
(3, 'Clark', 'Marie-Higgins', 'Grande-Bretagne'),
(4, 'Dick', 'Philip K.', 'États-Unis'),
(5, 'Balzac', 'Honoré de', 'France'),
(7, 'Maupassant', 'Guy', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `ref` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `author_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `cover_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`ref`, `title`, `author_id`, `description`, `cover_url`) VALUES
(1, 'Ubik', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(2, 'Une vie', 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(3, 'Germinal', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(4, 'Maigret et le voleur paresseux', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(5, 'Un crime en Hollande', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(6, 'Le Chien Jaune', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(7, 'Maigret à la mer', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(8, 'La Danseuse du Gai-Moulin', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(9, 'Le Chat', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(10, 'Blade Runner', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(11, 'Minority Report', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(12, 'Paycheck', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(13, 'En attendant l\'année dernière', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(14, 'Le Crâne', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(15, 'LeHorla', 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(16, 'Boule de Suif', 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(17, 'Bel Ami', 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(18, 'L\'Assommoir', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(19, 'La Bête humaine', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(20, 'Nana', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(21, 'Thérèse Raquin', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(22, 'Germinal', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(23, 'La Croisière de Noël', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL),
(24, 'Cette chanson que je n\'oublierai jamais', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus error facilis, ipsa laboriosam nulla officia! Corporis dolorum eius labore necessitatibus nulla numquam quidem sit sunt veritatis! Accusantium beatae, sunt.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `loans`
--

CREATE TABLE `loans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `return_date`) VALUES
(3, 23, 1, '2021-03-31'),
(4, 4, 2, '2021-03-26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `statut` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `statut`, `password`, `created_at`, `updated_at`) VALUES
(4, 'ced', 'ceruth@epfc.eu', 'admin', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2007-06-21 00:00:00', NULL),
(23, 'jim', 'jim@sull.com', 'membre', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2020-04-24 13:39:03', NULL),
(24, 'bob', 'bob@sull.com', 'membre', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-04-23 16:38:03', NULL),
(25, 'fred', 'fred@sull.com', 'membre', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-04-23 16:51:51', NULL),
(26, 'clark', 'cla@sull.com', 'membre', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-04-23 16:54:15', NULL),
(27, 'lara', 'lara@sull.com', 'membre', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-04-23 17:02:48', NULL),
(28, 'link', 'link@sull.com', 'membre', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-05-14 14:19:24', NULL),
(29, 'kaneda', 'kaneda@gmail.com', 'admin', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2022-05-11 02:04:52', '2022-05-11 02:00:53'),
(30, 'tetsuo', 'tetsuo@gmail.com', 'membre', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2022-05-11 02:04:52', '2022-05-11 02:00:53'),
(52, 'kadrik', 'kadrik@gmail.com', 'membre', '$2y$10$8ncM5xNwIpip86fDoso9YuNkegktx9esL3z9F1cqIchJ1YJ0or4AO', '2022-05-13 20:30:37', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `titre` (`title`),
  ADD KEY `auteur_id` (`author_id`);

--
-- Index pour la table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `nom` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `ref` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`ref`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
