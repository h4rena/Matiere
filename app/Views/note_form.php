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

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" style="background: #dcfce7; color: #166534; border-left: 4px solid #22c55e;">
                    <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    <span><?= htmlspecialchars(session()->getFlashdata('success'), ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error" style="background: #fee2e2; color: #991b1b; border-left: 4px solid #ef4444;">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                    <span><?= htmlspecialchars(session()->getFlashdata('error'), ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endif; ?>

            <form action="/form" method="post" class="form-card">
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
                            <?php if (!empty($matieres) && is_array($matieres)): ?>
                                <?php foreach ($matieres as $matiere): ?>
                                    <option value="<?= htmlspecialchars($matiere['id'], ENT_QUOTES, 'UTF-8') ?>">
                                        <?= htmlspecialchars($matiere['nom'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($matiere['code'], ENT_QUOTES, 'UTF-8') ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div>
                        <label class="field-label" for="id_periode">Semestre <span class="required">*</span></label>
                        <select id="id_periode" name="id_periode" required>
                            <option value="">— Sélectionner —</option>
                            <?php if (!empty($semestres) && is_array($semestres)): ?>
                                <?php foreach ($semestres as $semestre): ?>
                                    <option value="<?= htmlspecialchars($semestre['id'], ENT_QUOTES, 'UTF-8') ?>">
                                        <?= htmlspecialchars($semestre['nom'], ENT_QUOTES, 'UTF-8') ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div>
                        <label class="field-label" for="id_option">Option <span class="required">*</span></label>
                        <select id="id_option" name="id_option" required>
                            <option value="">— Sélectionner —</option>
                            <?php if (!empty($options) && is_array($options)): ?>
                                <?php foreach ($options as $option): ?>
                                    <option value="<?= htmlspecialchars($option['id'], ENT_QUOTES, 'UTF-8') ?>">
                                        <?= htmlspecialchars($option['nom'], ENT_QUOTES, 'UTF-8') ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
