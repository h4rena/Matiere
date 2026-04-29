<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SysInfo</title>
    <link rel="stylesheet" href="/design/style.css">
</head>
<body class="login-page">
    <div class="login-card">
        <div class="login-logo">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24" width="22" height="22"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <div>
                <h1>SysInfo</h1>
                <span>Gestion des notes</span>
            </div>
        </div>

        <h2>Connexion</h2>
        <p class="subtitle">Identifiez-vous pour accéder au système</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" style="margin-bottom: 20px; background: rgba(239,68,68,.08); color: #b91c1c;">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <form action="/auth/doLogin" method="post">
            <div class="field-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="admin@sysinfo.mg" required>
            </div>

            <div class="field-group">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="password" placeholder="••••••••" required>
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember" checked>
                    Se souvenir de moi
                </label>
                <a href="#">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn btn-primary btn-full">Se connecter</button>
        </form>

        <div class="login-footer">
            Comptes de test :
            <br>
            <strong>Admin :</strong> admin@sysinfo.mg / admin123
            <br>
            <strong>User :</strong> user@sysinfo.mg / user123
        </div>
    </div>
</body>
</html>
