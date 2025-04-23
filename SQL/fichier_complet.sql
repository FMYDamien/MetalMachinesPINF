-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 avr. 2025 à 16:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteeditable`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` char(64) NOT NULL,
  `salt` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `mot_de_passe`, `salt`) VALUES
(1, 'admin@example.com', '305fbd95161339e2f2c1fa8845285daf45454354c2e6b7bd980827b0528ccaae', 'e6d254800c12e11c0a3453c2865559c7');

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

CREATE TABLE `element` (
  `id_element` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `type` enum('titre','paragraphe','image') NOT NULL,
  `contenu_fr` text DEFAULT NULL,
  `contenu_en` text DEFAULT NULL,
  `position` enum('gauche','droite','plein') DEFAULT 'plein',
  `ordre` int(11) NOT NULL,
  `deplacable` tinyint(1) DEFAULT 1,
  `supprimable` tinyint(1) DEFAULT 1,
  `id_media` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupepage`
--

CREATE TABLE `groupepage` (
  `id_groupe` int(11) NOT NULL,
  `nom_fr` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `nom_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupepage`
--

INSERT INTO `groupepage` (`id_groupe`, `nom_fr`, `description`, `nom_en`) VALUES
(1, 'L\'entreprise', 'Ce groupe contient toutes les pages qui parlent de l\'entreprise. ', 'Company'),
(2, 'Savoir-faire', 'Ce groupe contient toutes les pages qui parlent du savoir-faire de l\'entreprise.', 'Expertise');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `taille` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'image/png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `titre_fr` varchar(255) DEFAULT NULL,
  `titre_en` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT 0,
  `supprimable` tinyint(1) DEFAULT 1,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id_page`, `id_groupe`, `titre_fr`, `titre_en`, `position`, `supprimable`, `slug`) VALUES
(1, NULL, 'Accueil', 'Home', NULL, 0, 'accueil'),
(2, NULL, 'Actualités', 'News', NULL, 0, 'actualites'),
(3, NULL, 'Nous contacter', 'Contact us', NULL, 0, 'contact'),
(4, 1, 'Qui sommes-nous ?', 'About us', 0, 1, 'qui-sommes-nous'),
(5, 1, 'Atelier', 'Workshop', 1, 1, 'atelier'),
(6, 1, 'Bureau d\'études', 'Engineering office', 2, 1, 'bureau'),
(7, 1, 'Laboratoire d\'essais', 'Test laboratory', 3, 1, 'laboratoire'),
(8, 2, 'Nos compétences', 'Our expertise', 0, 1, 'competences'),
(9, 2, 'Nos réalisations', 'Our projects', 1, 1, 'realisations'),
(10, 2, 'Industrie', 'Industry', 2, 1, 'industrie');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`id_element`),
  ADD KEY `id_page` (`id_page`),
  ADD KEY `id_media` (`id_media`);

--
-- Index pour la table `groupepage`
--
ALTER TABLE `groupepage`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `element`
--
ALTER TABLE `element`
  MODIFY `id_element` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `groupepage`
--
ALTER TABLE `groupepage`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `element`
--
ALTER TABLE `element`
  ADD CONSTRAINT `element_ibfk_1` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`),
  ADD CONSTRAINT `element_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`);

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupepage` (`id_groupe`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
