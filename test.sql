-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 juin 2025 à 23:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `description`, `image`, `date_creation`) VALUES
(1, ' Instants Nature', 'la beauté dramatique d\'une grotte sombre illuminée par des rayons de lumière perçant une ouverture dans le plafond, révélant une scène de sérénité et de mystère', '', '2025-06-05 22:29:16'),
(5, ' Instants Nature', 'la beauté dramatique d\'une grotte sombre illuminée par des rayons de lumière perçant une ouverture dans le plafond, révélant une scène de sérénité et de mystère', 'uploads/photo11.jpg', '2025-06-06 00:58:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'SAVI', 'yezid', 'yesidsavi@gmail.com', '$2y$10$3lMCYcHrJbYKfz/Pr4UltO0U0sfLksK1B'),
(3, 'DJOSS', 'Dossa', 'dossadj@gmail.com', '$2y$10$Hva0YpNb1qHW8Mz7DHjHhOMhYNHLFLsKa'),
(5, 'Mariella', 'BOUROU', 'mariellebourou@gmail.com', '$2y$10$Y/XhJgqoTC.2EzRZ5u/L2e3dp33U.frQU'),
(6, 'DOSSOU-YOVO', 'Viviane', 'vivianedossouyovo@gmail.com', '$2y$10$smNJiNmVMem63mRGbsrpm.5JroWjyqO9A'),
(7, 'KAKPO', 'Lucian', 'luciankakpo@gmail.com', '$2y$10$7MYITvcVz6fGjJIUaaMhneNat2pTdxo30'),
(9, 'BANKOLE', 'Quian', 'quianbankole@gmail.com', '$2y$10$m6bDB9tg0g04pMYV.EDorOzGvtx6SOOS7'),
(10, 'BADAROU', 'Julien', 'julienbadarou@gmail.com', '$2y$10$nrUWnNbKRdjsbN1uOj2fEOqTuiaMuosy/'),
(13, 'DOSSOU-YOVO23566', 'Lucian66787875', '7vo@gmail.com', '$2y$10$n43HRyMS/WRLJiiGdsWOVuAn6Fv3cuP4v'),
(14, 'DOSSOU-YOVO', 'Lucian', '3@gmail.com', '$2y$10$ZkULaCDnyIAIYiMjSSpEbOh1WuUUA8Jyj'),
(15, 'BANKOLE', 'Lucian', 'lucianbankole@gmail.com', '$2y$10$k6kR.JIuR.r0pRyQ9rh1X.PpLbpN2Acxo'),
(16, 'SAMORI', 'Jenny', 'jennysamori@gmail.com', '$2y$10$97PHl1PdAEc6U9u5ZNMBH.rwKXp2CvHne'),
(18, 'ALAO', 'Miriam', 'miriamalao@gmail.com', '$2y$10$OzQLKfveSN9uGs1awcdlnu2jjWgZ1NWuy'),
(19, 'SAVI', 'Mohamed', 'mohamedsavi@gmail.com', '$2y$10$vbsdC33Cc46qp8ir/A8dKuAvzHCFUFUM0'),
(20, 'MALADE', 'Mamadou', 'mamadoumalade@gmail.com', '$2y$10$lNw8tGB.e5jOMcIl2PM/s.yLtXmONwNbb'),
(21, 'SAMORI', 'Tori', 'torisamori@gmail.com', '$2y$10$egiM/MlbSlAz1qtEP9XP9.Hb0xoHsOGAV'),
(22, 'TOGBE', 'Bio', 'biotogbe@gmail.com', '$2y$10$oK7H/ajdcjAK5suo/qBZIOumfV.GAYMRc'),
(23, 'GANDAHO', 'Marie', 'mariegandaho@gmail.com', '$2y$10$21LVOWyZMGuL8B3Ey17snu4C73BR3C7tJ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
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
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
