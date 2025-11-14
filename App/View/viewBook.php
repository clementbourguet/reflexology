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

    <main>
        <section class="section_reserver">
            <div class="container_reserver">
                <h1 id="h1_medium">PRENDRE RENDEZ-VOUS</h1>
                <div class="pink_line"></div>
            </div>
            <div class="accordion_list">
                <div class="prestation_title">
                    <h3>Choix de la prestation</h3><span></span>
                </div>
                <ul id="accordion">
                    <li>
                        <label for="first">Réflexologie plantaire<img src="<?= BASE_URL ?>/public/image/accordion_arrow.png" alt=""></label>
                        <input type="checkbox" id="first">
                        <div class="content">
                            <h4 class="h4_accordion">
                                Séance personnalisée - 1H
                            </h4>
                            <p class="p_accordion">
                                Un entretien est prévu en début de séance pour permettre un recueil d'informations
                            </p>
                            <h4 class="h4_accordion">
                                50 Euros
                            </h4>
                            <div class="checkbox_box">
                                <input type="checkbox" id="checkbox_first" name="checkbox_first">
                                <label for="checkbox_first">Choisir</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="second">Réflexologie palmaire<img src="<?= BASE_URL ?>/public/image/accordion_arrow.png" alt=""></label>
                        <input type="checkbox" id="second">
                        <div class="content">
                            <h4 class="h4_accordion">
                                Séance personnalisée - 1H
                            </h4>
                            <p class="p_accordion">
                                Un entretien est prévu en début de séance pour permettre un recueil d'informations
                            </p>
                            <h4 class="h4_accordion">
                                50 Euros
                            </h4>
                            <div class="checkbox_box">
                                <input type="checkbox" id="checkbox_second" name="checkbox_second">
                                <label for="checkbox_second">Choisir</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="third">Réflexologie faciale<img src="<?= BASE_URL ?>/public/image/accordion_arrow.png" alt=""></label>
                        <input type="checkbox" id="third">
                        <div class="content">
                            <h4 class="h4_accordion">
                                Séance personnalisée - 1H
                            </h4>
                            <p class="p_accordion">
                                Un entretien est prévu en début de séance pour permettre un recueil d'informations
                            </p>
                            <h4 class="h4_accordion">
                                50 Euros
                            </h4>
                            <div class="checkbox_box">
                                <input type="checkbox" id="checkbox_third" name="checkbox_third">
                                <label for="checkbox_third">Choisir</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label for="fourth">Réflexologie auriculaire<img src="<?= BASE_URL ?>/public/image/accordion_arrow.png" alt=""></label>
                        <input type="checkbox" id="fourth">
                        <div class="content">
                            <h4 class="h4_accordion">
                                Séance personnalisée - 1H
                            </h4>
                            <p class="p_accordion">
                                Un entretien est prévu en début de séance pour permettre un recueil d'informations
                            </p>
                            <h4 class="h4_accordion">
                                50 Euros
                            </h4>
                            <div class="checkbox_box">
                                <input type="checkbox" id="checkbox_fourth" name="checkbox_fourth">
                                <label for="checkbox_fourth">Choisir</label>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </section>
        <!-------------------------Calendrier------------------------------>

        <section class="calendar">
            <div class="prestation_title">
                <h3>Choix de l'horaire</h3><span></span>
            </div>
            <div class="calendar_container">
                <div class="date_display">
                    <a href="" id="prev_arrow"><img src="<?= BASE_URL ?>/public/image/left_arrow.png" alt="flèche gauche pour une date antérieure"></a>
                    <div id="display_1">
                        <h3 id="display_date"></h3>
                    </div>
                    <a href="" id="next_arrow"><img src="<?= BASE_URL ?>/public/image/right_arrow.png" alt="flèche droite pour une date postérieure"></a>
                </div>
                <div class="slots_display">
                    <ul></ul>
                </div>
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