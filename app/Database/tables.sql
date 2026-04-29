CREATE DATABASE IF NOT EXISTS matiere_db;
USE matiere_db;

CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    id_role INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES role(id)
);

CREATE TABLE responsable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    id_responsable INT NOT NULL,
    total_credit INT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_responsable) REFERENCES responsable(id)
);

CREATE TABLE `option` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE anne_univ (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE periode (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    id_anne_univ INT NOT NULL,
    id_option INT NOT NULL,
    FOREIGN KEY (id_anne_univ) REFERENCES anne_univ(id),
    FOREIGN KEY (id_option) REFERENCES `option`(id)
);

CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenoms VARCHAR(150) NOT NULL,
    etu VARCHAR(50) NOT NULL UNIQUE,
    id_option INT NOT NULL,
    FOREIGN KEY (id_option) REFERENCES `option`(id)
);

CREATE TABLE matieres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    code VARCHAR(50) NOT NULL,
    coefficient DECIMAL(10,2) NOT NULL DEFAULT 1,
    credit INT NOT NULL DEFAULT 0,
    id_parcours INT NOT NULL,
    id_periode INT NOT NULL,
    FOREIGN KEY (id_parcours) REFERENCES parcours(id),
    FOREIGN KEY (id_periode) REFERENCES periode(id)
);

CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant INT NOT NULL,
    id_matiers INT NOT NULL,
    total_credit INT NOT NULL DEFAULT 0,
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id),
    FOREIGN KEY (id_matiers) REFERENCES matieres(id)
);

CREATE TABLE resultat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant INT NOT NULL,
    total_note DECIMAL(10,2) NOT NULL DEFAULT 0,
    moyenne_general DECIMAL(10,2) NOT NULL DEFAULT 0,
    total_credit INT NOT NULL DEFAULT 0,
    mention VARCHAR(50) NOT NULL,
    situation VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id)
);
