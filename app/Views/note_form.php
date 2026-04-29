<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une note</title>
    <link rel="stylesheet" href="/design/style.css">
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24" width="18" height="18"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <div class="brand-name">SysInfo</div>
                <div class="brand-sub">Gestion des notes</div>
            </div>
        </div>

        <div class="sidebar-section">Navigation</div>
        <a href="#" class="nav-item active">
            <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
            Ajouter une note
        </a>
        <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/></svg>
            Liste des notes
        </a>

        <div class="sidebar-bottom">
            <div class="user-row">
                <div class="avatar">AD</div>
                <div class="user-info">
                    <div class="name">Admin Sys</div>
                    <div class="role">Super administrateur</div>
                </div>
            </div>
        </div>
    </aside>

    <main class="main">
        <div class="topbar">
            <div class="topbar-title">Ajouter une note</div>
        </div>

        <div class="content">
            <div class="page-header">
                <div>
                    <h2>Nouvelle note</h2>
                    <div class="breadcrumb">Accueil / Notes / <span>Ajouter</span></div>
                </div>
            </div>

            <div class="alert alert-info">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>Renseigne l'ETU, la matière, le semestre, l'option et la note avant de valider.</span>
            </div>

            <form action="#" method="post" class="form-card">
                <div class="form-section-title">Saisie de la note</div>

                <div class="form-grid">
                    <div>
                        <label class="field-label" for="etu">ETU <span class="required">*</span></label>
                        <input id="etu" name="etu" type="text" placeholder="Ex : ETU2024001" required>
                    </div>

                    <div>
                        <label class="field-label" for="id_matiere">Matière <span class="required">*</span></label>
                        <select id="id_matiere" name="id_matiere" required>
                            <option value="">— Sélectionner —</option>
                            <option value="INF201">Programmation orientée objet</option>
                            <option value="INF202">Bases de données objets</option>
                            <option value="INF203">Programmation système</option>
                            <option value="INF204">Système d'information géographique</option>
                            <option value="INF205">Système d'information</option>
                            <option value="INF206">Interface Homme/Machine</option>
                            <option value="INF207">Éléments d'algorithmique</option>
                            <option value="INF208">Réseaux informatiques</option>
                            <option value="INF209">Web dynamique</option>
                            <option value="INF210">Mini-projet de développement</option>
                            <option value="INF211">Mini-projet de bases de données et/ou de réseaux</option>
                            <option value="INF212">Mini-projet de Web et design</option>
                            <option value="MTH201">Méthodes numériques</option>
                            <option value="MTH202">Analyse des données</option>
                            <option value="MTH203">MAO</option>
                            <option value="MTH204">Géométrie</option>
                            <option value="MTH205">Équations différentielles</option>
                            <option value="MTH206">Optimisation</option>
                            <option value="ORG201">Bases de gestion</option>
                        </select>
                    </div>

                    <div>
                        <label class="field-label" for="id_periode">Semestre <span class="required">*</span></label>
                        <select id="id_periode" name="id_periode" required>
                            <option value="">— Sélectionner —</option>
                            <option value="1">Semestre 3</option>
                            <option value="2">Semestre 4 - Développement</option>
                            <option value="3">Semestre 4 - Réseaux</option>
                            <option value="4">Semestre 4 - Web</option>
                        </select>
                    </div>

                    <div>
                        <label class="field-label" for="id_option">Option <span class="required">*</span></label>
                        <select id="id_option" name="id_option" required>
                            <option value="">— Sélectionner —</option>
                            <option value="1">sans option</option>
                            <option value="2">dev</option>
                            <option value="3">bdd reseau</option>
                            <option value="4">web</option>
                        </select>
                    </div>

                    <div>
                        <label class="field-label" for="note">Note <span class="required">*</span></label>
                        <input id="note" name="note" type="number" min="0" max="20" step="0.01" placeholder="Ex : 14.5" required>
                        <div class="field-hint">Saisie sur 20.</div>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Entrer</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
