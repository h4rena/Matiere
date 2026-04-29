-- =============================================
-- Insertion des comptes par défaut
-- =============================================
USE matiere_db;

-- Vider les tables avant d'insérer
TRUNCATE TABLE users;
TRUNCATE TABLE role;

-- Insérer les rôles
INSERT INTO role (nom) VALUES 
('Admin'),
('User');

-- Insérer les comptes par défaut
-- Admin : admin@sysinfo.mg / admin123 (MD5: 0192023a7bbd73250516f069df18b500)
INSERT INTO users (nom, email, mdp, id_role) VALUES 
('Admin System', 'admin@sysinfo.mg', MD5('admin123'), 1);

-- User : user@sysinfo.mg / user123 (MD5: 202cb962ac59075b964b07152d234b70)
INSERT INTO users (nom, email, mdp, id_role) VALUES 
('Utilisateur Système', 'user@sysinfo.mg', MD5('user123'), 2);
