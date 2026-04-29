-- =============================================
-- DONNÉES DE TEST - Basées sur les PDFs
-- =============================================
USE matiere_db;

-- =============================================
-- Insertion des rôles
-- =============================================
INSERT INTO role (nom) VALUES 
('Admin'),
('Responsable'),
('Enseignant'),
('Etudiant');

-- =============================================
-- Insertion des utilisateurs
-- =============================================
INSERT INTO users (nom, email, mdp, id_role) VALUES 
('Admin System', 'admin@univ.edu', MD5('admin123'), 1),
('Razafinjoelina Tahina', 'razafinjoelina.tahina@univ.edu', MD5('password123'), 2),
('Rakotomolala Vahatriniaina', 'rakotomolala.vahatriniaina@univ.edu', MD5('password123'), 2),
('Rabenanary Rojo', 'rabenanary.rojo@univ.edu', MD5('password123'), 2),
('Prof Enseignant', 'prof.enseignant@univ.edu', MD5('password123'), 3),
('Etudiant 1', 'etudiant1@etudiant.edu', MD5('password123'), 4);

-- =============================================
-- Insertion des responsables (basé sur les PDFs)
-- =============================================
INSERT INTO responsable (nom) VALUES 
('Razafinjoelina Tahina'),
('Rakotomolala Vahatriniaina'),
('Rabenanary Rojo');

-- =============================================
-- Insertion des options
-- =============================================
INSERT INTO `option` (nom) VALUES 
('Développement'),
('Réseaux et Base de Données'),
('Web et Design');

-- =============================================
-- Insertion des années universitaires
-- =============================================
INSERT INTO anne_univ (nom) VALUES 
('L1'),
('L2'),
('L3');

-- =============================================
-- Insertion des parcours (basé sur les PDFs)
-- =============================================
INSERT INTO parcours (nom, id_responsable, total_credit) VALUES 
('Développement', 1, 90),
('Bases de Données et Réseaux', 2, 90),
('Web et Design', 3, 90);

-- =============================================
-- Insertion des périodes (semestres)
-- =============================================
INSERT INTO periode (nom, id_anne_univ, id_option) VALUES 
('Semestre 3', 1, 1),
('Semestre 4 - Développement', 1, 1),
('Semestre 4 - Réseaux', 1, 2),
('Semestre 4 - Web', 1, 3);

-- =============================================
-- MATIERES SEMESTRE 3 (pour tous les parcours)
-- =============================================
INSERT INTO matieres (nom, code, coefficient, credit, id_parcours, id_periode) VALUES 
('Programmation orientée objet', 'INF201', 1, 6, 1, 1),
('Bases de données objets', 'INF202', 1, 6, 1, 1),
('Programmation système', 'INF203', 1, 4, 1, 1),
('Réseaux informatiques', 'INF208', 1, 6, 1, 1),
('Méthodes numériques', 'MTH201', 1, 4, 1, 1),
('Bases de gestion', 'ORG201', 1, 4, 1, 1);

-- =============================================
-- MATIERES SEMESTRE 4 - Développement
-- =============================================
INSERT INTO matieres (nom, code, coefficient, credit, id_parcours, id_periode) VALUES 
('Système d''information géographique', 'INF204', 1, 6, 1, 2),
('Système d''information', 'INF205', 1, 6, 1, 2),
('Interface Homme/Machine', 'INF206', 1, 6, 1, 2),
('Eléments d''algorithmique', 'INF207', 1, 6, 1, 2),
('Mini-projet de développement', 'INF210', 1, 10, 1, 2),
('Géométrie', 'MTH204', 1, 4, 1, 2),
('Equations différentielles', 'MTH205', 1, 4, 1, 2),
('Optimisation', 'MTH206', 1, 4, 1, 2),
('MAO', 'MTH203', 1, 4, 1, 2);

-- =============================================
-- MATIERES SEMESTRE 4 - Réseaux et BD
-- =============================================
INSERT INTO matieres (nom, code, coefficient, credit, id_parcours, id_periode) VALUES 
('Système d''information', 'INF205', 1, 6, 2, 3),
('Système d''information géographique', 'INF204', 1, 6, 2, 3),
('Interface Homme/Machine', 'INF206', 1, 6, 2, 3),
('Eléments d''algorithmique', 'INF207', 1, 6, 2, 3),
('Mini-projet de bases de données et/ou de réseaux', 'INF211', 1, 10, 2, 3),
('Analyse des données', 'MTH202', 1, 4, 2, 3),
('Equations différentielles', 'MTH205', 1, 4, 2, 3),
('Optimisation', 'MTH206', 1, 4, 2, 3),
('MAO', 'MTH203', 1, 4, 2, 3);

-- =============================================
-- MATIERES SEMESTRE 4 - Web et Design
-- =============================================
INSERT INTO matieres (nom, code, coefficient, credit, id_parcours, id_periode) VALUES 
('Système d''information géographique', 'INF204', 1, 6, 3, 4),
('Système d''information', 'INF205', 1, 6, 3, 4),
('Interface Homme/Machine', 'INF206', 1, 6, 3, 4),
('Web dynamique', 'INF209', 1, 6, 3, 4),
('Mini-projet de Web et design', 'INF212', 1, 10, 3, 4),
('Analyse des données', 'MTH202', 1, 4, 3, 4),
('Géométrie', 'MTH204', 1, 4, 3, 4),
('Optimisation', 'MTH206', 1, 4, 3, 4),
('MAO', 'MTH203', 1, 4, 3, 4);

-- =============================================
-- ETUDIANTS
-- =============================================
INSERT INTO etudiants (nom, prenoms, etu, id_option) VALUES 
('Dupont', 'Jean Marie', 'ETU2024001', 1);

-- =============================================
-- NOTES SEMESTRE 3 - Jean Dupont (option Développement)
-- =============================================
INSERT INTO notes (id_etudiant, id_matiere, total_credit) VALUES 
(1, 1, 10.5),   -- INF201 - 10.5/20
(1, 2, 14),     -- INF202 - 14/20
(1, 3, 11),     -- INF203 - 11/20
(1, 4, 10),     -- INF208 - 10/20
(1, 5, 6.5),    -- MTH201 - 6.5/20
(1, 6, 13);     -- ORG201 - 13/20

-- =============================================
-- NOTES SEMESTRE 4 - Jean Dupont (option Développement)
-- =============================================
INSERT INTO notes (id_etudiant, id_matiere, total_credit) VALUES 
(1, 7, 9.5),    -- INF207 (Eléments Algorithmique) - 9.5/20
(1, 8, 12.2),   -- INF210 (Mini-projet développement) - 12.2/20
(1, 17, 12),    -- INF204 (Système Information géographique) - 12/20
(1, 24, 11.33), -- MTH203 (MAO) - 11.33/20
(1, 23, 12.25); -- MTH206 (Optimisation) - 12.25/20

-- =============================================
-- RÉSULTATS - Jean Dupont
-- =============================================
-- Après Semestre 3 (30 crédits)
INSERT INTO resultat (id_etudiant, total_note, moyenne_general, total_credit, mention, situation) VALUES 
(1, 65, 10.97, 30, 'Passable', 'ADMIS(E)');

-- Après Semestre 4 (cumul 60 crédits)
-- Note: 65 (S3) + 57.2 (S4) = 122.2 / (30+30) = 11.24
-- UPDATE resultat SET total_note = 122.2, moyenne_general = 11.24, total_credit = 60 WHERE id_etudiant = 1;
