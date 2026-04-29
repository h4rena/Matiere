# 📚 Système de Gestion des Notes - Matière

Système complet de gestion des notes académiques construit avec **CodeIgniter 4** et **MySQL**.

## 🚀 Démarrage Rapide (2 minutes)

### 1️⃣ Importer la Base de Données
```bash
mysql -u root -p matiere_db < base/tables.sql
mysql -u root -p matiere_db < base/insert_users.sql
mysql -u root -p matiere_db < base/data_test.sql
```

### 2️⃣ Démarrer le Serveur
```bash
php spark serve
```

### 3️⃣ Accéder à l'Application
Ouvrir: **http://localhost:8080/login**

## 🔑 Comptes de Test

### 👨‍💼 Administrateur
- **Email**: `admin@sysinfo.mg`
- **Mot de passe**: `admin123`
- **Accès**: Ajouter, modifier, supprimer les notes

### 👤 Utilisateur Standard
- **Email**: `user@sysinfo.mg`
- **Mot de passe**: `user123`
- **Accès**: Voir les notes (lecture seule)

## 📋 Ce Que le Système Fait

| Fonctionnalité | Admin | User |
|---|---|---|
| 👁️ Voir les notes | ✅ | ✅ |
| ➕ Ajouter une note | ✅ | ❌ |
| ✏️ Éditer une note | ✅ | ❌ |
| 🗑️ Supprimer une note | ✅ | ❌ |
| 🔑 Se connecter/déconnecter | ✅ | ✅ |

## 📂 Structure du Projet

```
Matiere/
├── app/
│   ├── Controllers/
│   │   ├── Auth.php              ← Authentification
│   │   └── EtudiantController.php ← Gestion des notes
│   ├── Filters/
│   │   └── AuthFilter.php         ← Sécurité des routes
│   ├── Views/
│   │   ├── auth/login.php
│   │   ├── note_form.php
│   │   └── notes_list.php
│   └── Config/
│       ├── Routes.php
│       └── Filters.php
├── base/
│   ├── tables.sql
│   ├── insert_users.sql
│   └── data_test.sql
└── [Fichiers de documentation]
```

## 📖 Documentation Complète

- **[SETUP_GUIDE.md](SETUP_GUIDE.md)** - Guide complet de configuration et test
- **[IMPLEMENTATION_COMPLETE.md](IMPLEMENTATION_COMPLETE.md)** - Récapitulatif d'implémentation
- **[Todo.md](Todo.md)** - État actuel et tâches restantes

## ✨ Caractéristiques

✅ **Authentification sécurisée** - Sessions avec hachage MD5
✅ **Contrôle d'accès par rôle** - Admin vs User
✅ **Interface moderne** - Design cohérent et responsive
✅ **Validation complète** - Formulaire avec vérifications
✅ **Base de données normalisée** - 11 tables avec intégrité référentielle
✅ **Code sécurisé** - Protection XSS, injection SQL, CSRF prête

## 🧪 Test Rapide

1. Connectez-vous avec `admin@sysinfo.mg / admin123`
2. Allez à `/form` pour ajouter une note
3. Remplissez le formulaire avec:
   - **ETU**: `2024001`
   - **Matière**: Choisir une dans la liste
   - **Semestre**: Choisir un dans la liste
   - **Option**: Choisir une dans la liste
   - **Note**: `15.5`
4. Cliquez "Entrer"
5. Vous serez redirigé vers `/list` avec un message de succès

## 🔐 Sécurité

- **Authentification**: Vérification email/mot de passe
- **Sessions**: Validation de la session à chaque requête
- **Rôles**: Filtre 'auth:admin' pour routes sensibles
- **Injection SQL**: Query Builder CodeIgniter
- **XSS**: htmlspecialchars() dans toutes les vues

## 🐛 Débogage

```bash
# Voir les logs
tail -f writable/logs/log-*.log

# Vérifier les routes
php spark routes

# Tester la connexion BD
php spark db:connect
```

## 🎯 Prochaines Étapes (Optionnel)

- [ ] Édition des notes existantes
- [ ] Suppression des notes
- [ ] Calcul automatique des moyennes
- [ ] Dashboard avec statistiques
- [ ] Export PDF/Excel
- [ ] Gestion des utilisateurs (CRUD complet)

## 📝 Notes Techniques

- **Framework**: CodeIgniter 4
- **Base de données**: MySQL/MariaDB
- **PHP**: 8.0+
- **Sessions**: Stockée en fichier (writable/session/)
- **Logs**: writable/logs/

## 🆘 Besoin d'Aide?

1. Vérifiez [SETUP_GUIDE.md](SETUP_GUIDE.md) pour les problèmes courants
2. Activez le mode debug dans `.env`: `CI_ENVIRONMENT = development`
3. Regardez les logs: `writable/logs/`

---

**Système opérationnel et prêt à l'emploi! 🎉**
