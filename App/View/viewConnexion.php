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
    <!--HEADER-->
    <header>
        <div class="container">
            <?php include __DIR__ . '/components/navbar.php'; ?>
        </div>
    </header>

    <!--------------main---------------->

    <section class="btn_back" id="btn_back">
        <a id="btn_back">
            < Retour</a>
    </section>
    <main id="main_connexion">

        <section class="section_connexion">
            <div class="container_connexion">
                <h1 id="h1_medium">SE CONNECTER</h1>
                <div class="pink_line" id="pink_line_connexion"></div>
            </div>
        </section>

        <!-------------------------Message de confirmation---------------------------->
        <?php
        if (!empty($_SESSION['success_message'])) {
            echo '<p class="success_message">' . htmlspecialchars($_SESSION['success_message']) . '</p>';
            unset($_SESSION['success_message']);
        }
        ?>

        <!-------------------------Formulaire de connexion---------------------------->
        <?php if (!empty($error)) : ?>
            <p class="error_message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <section class="section_form_connexion">
            <div class="container_form_connexion">
                <form action="<?= BASE_URL ?>/connexion" method="post" class="form_connexion">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="saisir votre email" required>
                    <div class="helper_text">
                        <img id="email_valid" src="<?= BASE_URL ?>/public/image/email_valid.png" alt="Logo validation email">
                        <span>Entrez une adresse e-mail valide</span>
                    </div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    <div class="checkbox_group">
                        <input type="checkbox" id="showPassword" onclick="togglePassword()">
                        <label for="showPassword">Afficher le mot de passe</label>
                    </div>
                    <button type="submit">VALIDER</button>
                    <p class="p_form_connexion"><a href="<?= BASE_URL ?>/mot-de-passe-oublie" id="forgot">Mot de passe oublié ?</a></p>
                    <p class="signup_text">Pas encore de compte ? <a href="<?= BASE_URL ?>/inscription">Inscrivez-vous</a></p>
                </form>
            </div>
        </section>
    </main>
    <!------------------------------FOOTER------------------------------->
    <footer>
        <?php include __DIR__ . '/components/footer.php'; ?>
    </footer>
    <!------------------------------SCRIPT------------------------------->
    <script src="<?= BASE_URL ?>/public/script/script.js"></script>
</body>

</html>