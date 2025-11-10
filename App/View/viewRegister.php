<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violette Gilavert Reflexologie</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style/variables.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style/fonts.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style/calendar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style/queries.css">
    <!--favicon-->
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>/public/image/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL ?>/public/image/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>/public/image/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/public/image/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="<?= BASE_URL ?>/public/image/favicon/site.webmanifest" />
</head>

<body>

    <header>
        <div class="container">
            <?php include __DIR__ . '/components/navbar.php'; ?>
        </div>
    </header>
    <section class="btn_back">
        <a id="btn_back">
            < Retour</a>
    </section>
    <main>
        <section class="section_connexion">
            <div class="container_connexion">
                <h1 id="h1_medium">S'INSCRIRE</h1>
                <div class="pink_line" id="pink_line_connexion"></div>
            </div>
        </section>
        <!-- Affichage des erreurs -->
        <?php if (!empty($error)) : ?>
            <p class="error_message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <!-- Formulaire -->
        <section class="section_form_connexion">
            <div class="container_form_connexion">
                <form action="<?= BASE_URL ?>/inscription" method="post" class="form_connexion">
                    <label for="firstname">Prénom *</label>
                    <input type="text" name="firstname" id="firstname" required maxlength="50">

                    <label for="lastname">Nom *</label>
                    <input type="text" name="lastname" id="lastname" required maxlength="50">

                    <label for="email">Email *</label>
                    <input type="email" name="email" id="email" required maxlength="100">

                    <label for="telephone">Téléphone *</label>
                    <input type="tel" name="telephone" id="telephone" maxlength="20" pattern="[0-9+ ]{6,20}">

                    <label for="password">Mot de passe *</label>
                    <input type="password" name="password" id="password" required minlength="8">

                    <label for="password_confirm">Confirmer mot de passe *</label>
                    <input type="password" name="password_confirm" id="password_confirm" required minlength="8">

                    <button type="submit">S’inscrire</button>
                    <p class="signup_text">Déjà un compte ? <a href="<?= BASE_URL ?>/connexion">Connectez-vous</a></p>
                </form>
            </div>
        </section>

    </main>

    <footer>
        <?php include __DIR__ . '/components/footer.php'; ?>
    </footer>
    <script src="<?= BASE_URL ?>/public/script/script.js"></script>
</body>

</html>