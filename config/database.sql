-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 13 mai 2023 à 19:13
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `super_week`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `content`, `id_user`) VALUES
(1, 'book 1', 'content content content content content', 1),
(2, 'book 2', 'content content content content content', 3),
(3, 'book test', 'content content content content content', 7),
(4, 'book book', 'content content content content content', 1),
(5, 'book math', 'content content content content content', 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'yasmeen.koss@hudson.biz', 'Godfrey', 'Baumbach', ''),
(2, 'block.abigale@yahoo.com', 'Kay', 'Steuber', ''),
(3, 'micah.kuhic@mohr.net', 'Marielle', 'Beahan', ''),
(4, 'rwilderman@dietrich.com', 'Royal', 'West', ''),
(5, 'mariana47@gmail.com', 'Justus', 'Weimann', ''),
(6, 'jordane41@gmail.com', 'Earnest', 'Parisian', ''),
(7, 'stan.crona@gmail.com', 'Dannie', 'Stroman', ''),
(8, 'kristopher.kub@yahoo.com', 'Turner', 'Pfeffer', ''),
(9, 'fisher.cruz@gmail.com', 'Hal', 'Sporer', ''),
(10, 'leuschke.keagan@bode.net', 'Tressie', 'Flatley', ''),
(11, 'lcollins@yahoo.com', 'Kory', 'Kessler', ''),
(12, 'bernice.mueller@gmail.com', 'Lexie', 'Wunsch', ''),
(13, 'alysson57@batz.com', 'Ressie', 'Lind', ''),
(14, 'elisa82@yahoo.com', 'Cristal', 'Green', ''),
(15, 'dickens.antwan@yahoo.com', 'Ethel', 'Fahey', ''),
(16, 'oschumm@runolfsdottir.net', 'Esmeralda', 'Kohler', ''),
(17, 'wjacobs@stoltenberg.com', 'Noble', 'Gutkowski', ''),
(18, 'roslyn49@von.com', 'Noelia', 'Sipes', ''),
(19, 'art38@hotmail.com', 'Brant', 'Cremin', ''),
(20, 'howard62@hotmail.com', 'Polly', 'Hodkiewicz', ''),
(21, 'mohamed.habbaaina@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$16vCAkrgKjumI4hOMttW1ONuxUDXjnoz9W.iFJSS4LwvBzmdz6AE6'),
(30, 'mohamed.habbaaina@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$/xYEqqBaHLIb4FBn7KYWC.xDOalqZxfwIdbuVwSLOwfz.ufmQZ792'),
(31, 'mohamed.habbaaina@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$ajSLQZrmjRZxzIG8nus54OKXT07CpcvtnZsKVTwpcq96u/v.D4Oq2'),
(32, 'mohamed.habbaaina@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$Pa41x4MZyQ3y27slpAS7puAfMONdfYD5k2sqg1udrUGtU16ENxgpG'),
(33, 'mohamed.habbaaina@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$IfeDSsPcOsnKQtgQB7SyzOVkFpCmY69iD4ApQaAVHkx9HEzRiN9O.'),
(34, 'wawa@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$/EVIhZ0.gfOOrhX5ZrI88OKCoLQEU2rI9ZgVQpUqQbd2MFYFvpp5a'),
(35, 'nnnnnnnnnnnnnnnn@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$57.sGlkhCgTxpANkmau1/upMlc9bOMekRthmbRe3PIc0ty5/OnQW2'),
(36, 'kjkjkjkmmmmmmmma@laplateforme.io', 'MOHAMED', 'HABBAAINA', '$2y$12$r5tZPqzHh.VWrKhETDiPAOMqaCAJ5Ey1EiEdIvWcVf/tWty0kHZyi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
