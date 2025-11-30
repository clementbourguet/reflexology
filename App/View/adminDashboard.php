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

    <main>
        <div class="container_form_connexion">
            <h1>Back Office - Gestion des prestations</h1>
            <form method="GET" action="<?= BASE_URL ?>/admin">
                <label for="service_id">Choisir une prestation :</label>
                <select name="id" id="service_id" onchange="this.form.submit()">
                    <option value="">-- Sélectionner --</option>
                    <?php foreach ($services as $service): ?>
                        <option value="<?= $service['id'] ?>" <?= isset($_GET['id']) && $_GET['id'] == $service['id'] ? 'selected' : '' ?>>
                            <?= \App\Utils\Utilitaire::sanitize($service['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>


            <?php if (!empty($selectedService)): ?>
                <div class="service_form">
                    <h2>Modifier la prestation</h2>
                    <form method="POST" action="<?= BASE_URL ?>/admin/edit/<?= $selectedService['id'] ?>">
                        <label>Titre
                            <input type="text" name="name" value="<?= \App\Utils\Utilitaire::sanitize($selectedService['name']) ?>">
                        </label>
                        <label>Description
                            <textarea name="description"><?= \App\Utils\Utilitaire::sanitize($selectedService['description']) ?></textarea>
                        </label>
                        <label>Durée (minutes)
                            <input type="number" name="duration_minutes"
                                value="<?= \App\Utils\Utilitaire::sanitize($selectedService['duration_minutes']) ?>">
                        </label>
                        <label>Prix (€)
                            <input type="number" name="price"
                                value="<?= \App\Utils\Utilitaire::sanitize($selectedService['price']) ?>">
                        </label>
                        <label>Active ?
                            <input type="checkbox" name="active" value="1" <?= $selectedService['active'] ? 'checked' : '' ?>>
                        </label>

                        <div class="actions">
                            <button type="submit">Enregistrer</button>
                            <a href="<?= BASE_URL ?>/admin/delete/<?= $selectedService['id'] ?>"
                                onclick="return confirm('Supprimer cette prestation ?')">Supprimer</a>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <div class="new_service service_form">
                <h2>Ajouter une nouvelle prestation</h2>
                <form method="POST" action="<?= BASE_URL ?>/admin/add">
                    <label>Titre
                        <input type="text" name="name">
                    </label>
                    <label>Description
                        <textarea name="description"></textarea>
                    </label>
                    <label>Durée (minutes)
                        <input type="number" name="duration_minutes">
                    </label>
                    <label>Prix (€)
                        <input type="number" step="0.01" name="price">
                    </label>
                    <label>Active ?
                        <input type="checkbox" name="active" value="1" checked>
                    </label>

                    <div class="actions">
                        <button type="submit">Créer</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <footer>
        <?php include __DIR__ . '/components/footer.php'; ?>
    </footer>
    <script src="<?= BASE_URL ?>/public/script/script.js"></script>
</body>

</html>