-- Création de la base de données
CREATE DATABASE IF NOT EXISTS SiteEditable CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE SiteEditable;

-- Table des groupes de pages
CREATE TABLE GroupePage (
    id_groupe INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
);

-- Table des pages
CREATE TABLE Page (
    id_page INT AUTO_INCREMENT PRIMARY KEY,
    id_groupe INT NULL,
    titre_fr VARCHAR(255),
    titre_en VARCHAR(255),
    position INT DEFAULT 0,
    supprimable BOOLEAN DEFAULT TRUE,
    slug VARCHAR(255) UNIQUE NOT NULL,
    FOREIGN KEY (id_groupe) REFERENCES GroupePage(id_groupe) ON DELETE SET NULL
);

-- Table des médias (images principalement)
CREATE TABLE Media (
    id_media INT AUTO_INCREMENT PRIMARY KEY,
    nom_fichier VARCHAR(255) NOT NULL,
    chemin VARCHAR(255) NOT NULL,
    taille INT,
    type VARCHAR(100) DEFAULT 'image/png'
);

-- Table des éléments de page (texte, image, bouton…)
CREATE TABLE Element (
    id_element INT AUTO_INCREMENT PRIMARY KEY,
    id_page INT NOT NULL,
    type ENUM('titre', 'paragraphe', 'image') NOT NULL,
    contenu_fr TEXT,
    contenu_en TEXT,
    position ENUM('gauche', 'droite', 'plein') DEFAULT 'plein',
    ordre INT NOT NULL,
    deplacable BOOLEAN DEFAULT TRUE,
    supprimable BOOLEAN DEFAULT TRUE,
    id_media INT DEFAULT NULL,
    FOREIGN KEY (id_page) REFERENCES Page(id_page),
    FOREIGN KEY (id_media) REFERENCES Media(id_media)
);


-- Table des admins
CREATE TABLE Admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe CHAR(64) NOT NULL, -- SHA-256
    salt CHAR(32)
);
