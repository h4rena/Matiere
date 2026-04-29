<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des notes</title>
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
        <?php if (session()->get('user_role') === 'Admin'): ?>
            <a href="/form" class="nav-item">
                <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
                Ajouter une note
            </a>
        <?php endif; ?>
        <a href="/list" class="nav-item active">
            <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/></svg>
            Liste des notes
        </a>

        <div class="sidebar-bottom">
            <form action="/auth/logout" method="post" style="margin-bottom: 10px;">
                <button type="submit" class="btn btn-ghost btn-sm btn-full" style="text-align: left;">
                    <svg viewBox="0 0 24 24" style="width: 14px; height: 14px;"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                    Se déconnecter
                </button>
            </form>
            <div class="user-row" style="padding: 8px 0;">
                <div class="avatar" style="background: linear-gradient(135deg, #06b6d4, #2563eb);"><?= substr(session()->get('user_nom'), 0, 2) ?></div>
                <div class="user-info">
                    <div class="name"><?= session()->get('user_nom') ?></div>
                    <div class="role"><?= session()->get('user_role') ?></div>
                </div>
            </div>
        </div>
    </aside>

    <main class="main">
        <div class="topbar">
            <div class="topbar-title">Liste des notes</div>
            <div class="topbar-actions">
                <?php if (session()->get('user_role') === 'Admin'): ?>
                    <a href="/form" class="btn btn-primary btn-sm">
                        <svg viewBox="0 0 24 24"><path d="M12 5v14m7-7H5"/></svg>
                        Ajouter
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="content">
            <div class="page-header">
                <div>
                    <h2>Résultats</h2>
                    <div class="breadcrumb">Accueil / Notes / <span>Liste</span></div>
                </div>
            </div>

            <?php if (session()->get('user_role') !== 'Admin'): ?>
                <div class="alert alert-info" style="background: rgba(37,99,235,.08); color: #1e40af; margin-bottom: 20px;">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span>Vous avez accès en lecture seule. Contactez un administrateur pour toute modification.</span>
                </div>
            <?php endif; ?>

            <div class="table-card">
                <table>
                    <thead>
                        <tr>
                            <th>Étudiant (ETU)</th>
                            <th>Matière</th>
                            <th>Semestre</th>
                            <th>Note/20</th>
                            <th>Crédit</th>
                            <?php if (session()->get('user_role') === 'Admin'): ?>
                                <th style="width: 100px;">Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($notes) && is_array($notes)): ?>
                            <?php foreach ($notes as $note): ?>
                                <tr>
                                    <td><?= htmlspecialchars($note['etu'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($note['matiere'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($note['periode'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><strong><?= number_format($note['note'] ?? 0, 2, ',', ' ') ?></strong></td>
                                    <td><?= htmlspecialchars($note['credit'] ?? '0', ENT_QUOTES, 'UTF-8') ?></td>
                                    <?php if (session()->get('user_role') === 'Admin'): ?>
                                        <td>
                                            <div class="td-actions">
                                                <button class="action-btn" title="Éditer">
                                                    <svg viewBox="0 0 24 24"><path d="M17 3a2.1 2.1 0 0 1 3 3l-2 2 3-3M7 19l4 1-4-1"/></svg>
                                                </button>
                                                <button class="action-btn del" title="Supprimer">
                                                    <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6h2M10 11v6M14 11v6"/></svg>
                                                </button>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= session()->get('user_role') === 'Admin' ? '7' : '5' ?>" style="text-align: center; color: #64748b; padding: 30px;">
                                    Aucune note enregistrée
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>
