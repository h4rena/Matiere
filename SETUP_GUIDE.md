# Guide de Configuration et Test - Système de Gestion des Notes

## 1. Configuration Initiale

### Prérequis
- PHP 8.0+
- MySQL 8.0+ ou MariaDB 10.4+
- CodeIgniter 4.x
- Serveur Web (Apache/Nginx)

### Étapes de Configuration

#### 1.1 Créer la Base de Données
```bash
mysql -u root -p
CREATE DATABASE matiere_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE matiere_db;
```

#### 1.2 Importer le Schéma des Tables
```bash
mysql -u root -p matiere_db < base/tables.sql
```

#### 1.3 Importer les Comptes et Données par Défaut
```bash
mysql -u root -p matiere_db < base/insert_users.sql
mysql -u root -p matiere_db < base/data_test.sql
```

#### 1.4 Configurer la Connexion Base de Données
Éditer `app/Config/Database.php`:
```php
public array $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'YOUR_PASSWORD',
    'database' => 'matiere_db',
    'port'     => 3306,
    // ... reste de la config
];
```

#### 1.5 Démarrer le Serveur CodeIgniter
```bash
cd /home/unknowm/Documents/GitHub/Matiere
php spark serve
```
Accéder à: http://localhost:8080

---

## 2. Comptes de Test

### 📌 Administrateur
- **Email**: admin@sysinfo.mg
- **Mot de passe**: admin123
- **Rôle**: Admin
- **Permissions**: Voir liste des notes + Ajouter/Éditer/Supprimer des notes

### 📌 Utilisateur Standard
- **Email**: user@sysinfo.mg
- **Mot de passe**: user123
- **Rôle**: User
- **Permissions**: Voir liste des notes (lecture seule)

---

## 3. Scénarios de Test

### 🧪 Test 1: Login Admin

**Étapes**:
1. Accéder à http://localhost:8080/login
2. Saisir Email: `admin@sysinfo.mg`
3. Saisir Mot de passe: `admin123`
4. Cliquer "Se connecter"

**Résultat Attendu**:
- ✅ Redirection vers /list
- ✅ Liste des notes affichée
- ✅ Boutons "Ajouter" visibles dans la sidebar et topbar
- ✅ Colonnes "Actions" (Éditer/Supprimer) visibles dans le tableau

---

### 🧪 Test 2: Login User Standard

**Étapes**:
1. Accéder à http://localhost:8080/login
2. Saisir Email: `user@sysinfo.mg`
3. Saisir Mot de passe: `user123`
4. Cliquer "Se connecter"

**Résultat Attendu**:
- ✅ Redirection vers /list
- ✅ Liste des notes affichée
- ✅ ❌ Boutons "Ajouter" NOT visibles (réservé admin)
- ✅ ❌ Colonnes "Actions" NOT visibles
- ✅ Message info: "Vous avez accès en lecture seule"

---

### 🧪 Test 3: Accès Non-Autorisé au Formulaire

**Étapes (User Standard)**:
1. Se connecter en tant que user@sysinfo.mg
2. Essayer d'accéder directement à http://localhost:8080/form

**Résultat Attendu**:
- ✅ Erreur 403 Forbidden
- ❌ Formulaire NOT accessible

---

### 🧪 Test 4: Ajouter une Note (Admin)

**Étapes**:
1. Se connecter en tant que admin@sysinfo.mg
2. Cliquer "Ajouter une note" dans la sidebar
3. Remplir le formulaire:
   - **ETU**: `2024001` (correspond à Jean Dupont)
   - **Matière**: Choisir une matière (ex: "Programmation orientée objet")
   - **Semestre**: Choisir un semestre
   - **Option**: Choisir une option
   - **Note**: Saisir `15.5`
4. Cliquer "Entrer"

**Résultat Attendu**:
- ✅ Validation réussie
- ✅ Redirection vers /list
- ✅ Message de succès: "Note ajoutée avec succès"
- ✅ Nouvelle note visible dans le tableau

---

### 🧪 Test 5: Logout

**Étapes**:
1. Connecté à l'application
2. Cliquer sur le bouton "Se déconnecter" en bas de la sidebar

**Résultat Attendu**:
- ✅ Redirection vers /login
- ✅ Session détruite
- ✅ Accès à /list/form retourne 403

---

### 🧪 Test 6: Validation du Formulaire

**Étapes** (Admin):
1. Aller à /form
2. Essayer de soumettre avec champs vides
3. Essayer avec ETU invalide (qui n'existe pas)
4. Essayer avec note > 20

**Résultat Attendu**:
- ✅ Affichage des messages d'erreur
- ✅ Redirection vers /form avec data pré-remplie (withInput)
- ✅ Note > 20 rejetée
- ✅ ETU invalide rejeté

---

## 4. Données de Test

### 📊 Étudiant Disponible
- **Nom**: Jean Dupont
- **ETU**: 2024001
- **Option**: sans option

### 📚 Matières Chargées (19 total)
**Semestre 3** (6 matières):
- Programmation orientée objet
- Bases de données objets
- Programmation système
- Système d'information géographique
- Système d'information
- Interface Homme/Machine

**Semestre 4 - Développement** (9 matières):
- Éléments d'algorithmique
- Réseaux informatiques
- Web dynamique
- Mini-projet de développement
- Mini-projet de bases de données et/ou de réseaux
- Mini-projet de Web et design
- Méthodes numériques
- Analyse des données
- Optimisation

**Semestre 4 - Réseaux** (4 matières):
- (Mêmes que Dev + spécifiques)

**Semestre 4 - Web** (4 matières):
- (Mêmes + spécifiques Web)

---

## 5. Structure de Base de Données

```
matiere_db
├── role (2 rows)
│   ├── 1: Admin
│   └── 2: User
├── users (2 rows)
│   ├── admin@sysinfo.mg → MD5('admin123')
│   └── user@sysinfo.mg → MD5('user123')
├── etudiants (1 row)
│   └── 2024001: Jean Dupont
├── option (4 rows)
│   ├── sans option
│   ├── dev
│   ├── bdd reseau
│   └── web
├── anne_univ (1 row)
│   └── 2024-2025
├── pirode (4 rows)
│   ├── Semestre 3
│   ├── Semestre 4 - Développement
│   ├── Semestre 4 - Réseaux
│   └── Semestre 4 - Web
├── parcours (3 rows)
├── matieres (19 rows)
├── notes (1+ rows) ← Ajoutées lors des tests
└── resultat
```

---

## 6. Chemins des Fichiers Clés

| Fichier | Rôle |
|---------|------|
| `app/Controllers/Auth.php` | Authentification (login/logout) |
| `app/Controllers/EtudiantController.php` | Gestion notes & affichage |
| `app/Filters/AuthFilter.php` | Vérification session & rôle |
| `app/Config/Filters.php` | Enregistrement filtres |
| `app/Config/Routes.php` | Définition routes + filtres |
| `app/Views/auth/login.php` | Page de connexion |
| `app/Views/note_form.php` | Formulaire ajout note |
| `app/Views/notes_list.php` | Liste notes (responsive) |
| `base/tables.sql` | Schéma BD |
| `base/insert_users.sql` | Comptes par défaut |
| `base/data_test.sql` | Données test |

---

## 7. Logging et Débogage

### Activer le Mode Debug
Éditer `.env`:
```
CI_ENVIRONMENT = development
```

### Regarder les Logs
```bash
tail -f writable/logs/log-*.log
```

### Vérifier les Sessions
Dans un contrôleur:
```php
echo session()->get('user_role'); // Affiche le rôle
echo session()->get('user_nom');  // Affiche le nom
```

---

## 8. Problèmes Courants et Solutions

### ❌ "Access Denied" (403)
**Cause**: Filter 'auth' ou 'auth:admin' non appliqué
**Solution**: Vérifier que le filtre est enregistré dans `Filters.php`

### ❌ "Session not found"
**Cause**: Session pas initialisée
**Solution**: Vérifier que `auth()` est appelé dans le contrôleur

### ❌ "Table 'matiere_db.periodo' doesn't exist"
**Cause**: Table s'appelle 'pirode' pas 'periodo'
**Solution**: Le code utilise déjà 'pirode' ✅

### ❌ Note n'apparaît pas dans la liste
**Cause**: La requête JOIN peut échouer si les IDs ne matchent pas
**Solution**: Vérifier les valeurs ID dans matieres.id_periode

---

## 9. Prochaines Étapes

### ✅ Actuellement Fonctionnel
- [x] Login/Logout
- [x] Affichage liste notes
- [x] Formulaire ajout note (admin)
- [x] Contrôle d'accès par rôle
- [x] Validation basique

### ⏳ À Implémenter
- [ ] Édition des notes
- [ ] Suppression des notes
- [ ] Calcul automatique des moyennes
- [ ] Dashboard accueil
- [ ] Gestion des utilisateurs
- [ ] Export PDF/Excel

---

## 10. Support

En cas de problème:
1. Vérifier les logs: `writable/logs/`
2. Vérifier la connexion BD: `php spark db:connect`
3. Tester le routes: `php spark routes`
4. Activer le debug mode dans `.env`
