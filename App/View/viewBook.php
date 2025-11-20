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

    <!--main-->
    <section class="btn_back" id="btn_back">
        <a id="btn_back">
            < Retour</a>
    </section>
    <main>
        <!-------------------------selection prestation------------------------------>
        <h3 id="service_choice">CHOIX DE LA PRESTATION</h3>
        <section class="services_selection">
            <div class="services_grid">
                <?php foreach ($services as $service): ?>
                    <article class="service_card <?= ($selectedServiceId === $service['id']) ? 'selected' : '' ?>"
                        data-service-id="<?= $service['id'] ?>">
                        <div class="service_header">
                            <h4 class="service_name"><?= htmlspecialchars($service['name']) ?></h4>
                            <span class="service_duration"><?= $service['duration_minutes'] ?> min</span>
                        </div>
                        <div class="service_body">
                            <p class="service_price"><?= number_format($service['price'], 2, ',', ' ') ?> €</p>
                            <p class="service_description"><?= htmlspecialchars($service['description']) ?></p>
                        </div>
                        <div class="service_footer">
                            <button class="btn_select_service" type="button" onclick="selectService(<?= $service['id'] ?>)">
                                <?= ($selectedServiceId === $service['id']) ? 'Sélectionné ✓' : 'Sélectionner' ?>
                            </button>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <?php if ($selectedService): ?>
                <div class="service_selected_info">
                    <div class="selected_content">
                        <span class="check_icon">✓</span>
                        <div class="selected_text">
                            <strong>Prestation sélectionnée :</strong>
                            <?= htmlspecialchars($selectedService['name']) ?> -
                            <?= number_format($selectedService['price'], 2, ',', ' ') ?> €
                            (<?= $selectedService['duration_minutes'] ?> min)
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
        <!-------------------------Calendrier------------------------------>

        <?php if ($selectedService): ?>
            <section class="calendar">
                <div class="prestation_title">
                    <h3>Choix de l'horaire</h3><span></span>
                </div>
                <div class="calendar_container">
                    <div class="date_display" role="group" aria-label="Navigation du calendrier" aria-controls="slots_list">
                        <a href="" id="prev_arrow" type="button" aria-label="Date précédente" aria-controls="display_date"><img src="<?= BASE_URL ?>/public/image/left_arrow.png" alt="flèche gauche pour une date antérieure"></a>
                        <div id="display_1">
                            <h3 id="display_date" aria-live="polite" aria-atomic="true"></h3>
                        </div>
                        <a href="" id="next_arrow" type="button" aria-label="Date suivante" aria-controls="display_date"><img src="<?= BASE_URL ?>/public/image/right_arrow.png" alt="flèche droite pour une date postérieure"></a>
                    </div>
                    <div class="slots_display">
                        <ul role="list" aria-labelledby="calendar_title"></ul>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="no_service_selected" role="region" aria-labelledby="no_service_msg">
                <p id="no_service_msg">Veuillez sélectionner une prestation pour accéder au calendrier</p>
            </section>
        <?php endif; ?>
    </main>
    <!------------------------------FOOTER------------------------------->
    <footer>
        <?php include __DIR__ . '/components/footer.php'; ?>
    </footer>
    <!------------------------------SCRIPT------------------------------->
    <script src="<?= BASE_URL ?>/public/script/script.js"></script>
</body>

</html>