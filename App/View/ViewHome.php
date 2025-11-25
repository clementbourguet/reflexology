<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="réflexologue région toulousaine, L'Union. Praticienne certifiée. Méthode Sonia Fischmann.
     Réservez votre séance de réflexologie combinée en ligne. Consultations du lundi au vendredi.">
    <title>Violette Gilavert Reflexologie Toulouse</title>
    <link rel="stylesheet" href="./public/style/variables.css">
    <link rel="stylesheet" href="./public/style/reset.css">
    <link rel="stylesheet" href="./public/style/fonts.css">
    <link rel="stylesheet" href="./public/style/style.css">
    <link rel="stylesheet" href="./public/style/queries.css">
    <!--favicon-->
    <link rel="icon" type="image/png" href="./public/image/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./public/image/favicon/favicon.svg" />
    <link rel="shortcut icon" href="./public/image/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="./public/image/favicon/site.webmanifest" />
</head>

<body>
    <!--HEADER-->
    <header class="container">
        <?php include __DIR__ . '/components/navbar.php'; ?>
    </header>

    <!--main-->

    <main>
        <div class="hero_section">
            <h1>RÉFLEXOLOGUE EI</h1>
            <h2>Méthode Sonia FISHMANN <sup>&reg;</sup></h2>
            <h3>RÉFLEXOLOGIE <br> COMBINÉE</h3>
            <div class="pink_line"></div>
        </div>
        <div class="flowers">
            <img id="light_flower" src="<?= BASE_URL ?>/public/image/light_flower.webp"
                alt="image de fleur de faible opacité" aria-hidden="true">
            <img id="light_flower_2" src="<?= BASE_URL ?>/public/image/light_flower.webp"
                alt="image de fleur de faible opacité" aria-hidden="true">
        </div>
        <section class="buttons">
            <a class="btn_reserver" href="<?= BASE_URL ?>/book" aria-label="Réserver une séance de réflexologie">
                RÉSERVER UNE SÉANCE
            </a>
            <a class="savoir_plus" href="#" aria-label="En savoir plus sur la réflexologie">EN SAVOIR PLUS</a>
            <img id="arrow" src="<?= BASE_URL ?>/public/image/arrow.png" alt="Flèche vers le bas"
                aria-label="Descendre vers la section suivante">
        </section>

        <section class="articles">
            <article>
                <img id="flower_round" src="./public/image/flower_round.png" alt="image de fleur dans un rond">
                <h3>LA RÉFLEXOLOGIE:</h3>
                <p>La <strong>réflexologie</strong> est une technique de soin pratiquées sur des <em>"zones
                        réflexes"</em> qui consiste à
                    effectuer des pressions sur des points précis de ces zones, de manière à agir sur différentes
                    parties du corps, afin d'optimiser les effets du <em>bien-etre</em> et améliorer la qualité de vie
                    du
                    quotidien.</p></br>
                <a href="#" aria-label="En savoir plus sur le déroulement d'une séance">
                    <p>En savoir plus...</p>
                </a>

            </article>
            <div class="pink_line"></div>
            <article>
                <img id="flower_round" src="./public/image/flower_round.png" alt="image de fleur dans un rond">
                <h3>DÉROULEMENT D’UNE SÉANCE:</h3>

                <p>Les séances se déroulent en 60 minutes,
                    J’accueille et j’élabore mon <em>recueil d’informations</em>, je prend note devant mon bénéficiaire
                    en lui
                    posant des questions.
                    Vous venez pour une raison particulière?
                    J’évalue les tensions physiques et / ou émotionnelles avec l’échelle numérique (EN de 0 à 10).
                    Connaissez-vous la réflexologie?
                    J’explique la réflexologie et la méthode <strong>Sonia Fischmann®</strong>
                    <a href="https://eir-formation.com/" id="fischmann" target="_blank">
                        https://eir-formation.com/
                    </a> en expliquant le ressenti
                    “petite
                    aiguille” du détecteur manuel, j’adopte une communication positive.
                    Je note les priorités sur mon recueil d’information et le secondaire pour les séances suivantes...
                </p></br>
                <a href="#" aria-label="En savoir plus sur le déroulement d'une séance">
                    <p>En savoir plus...</p>
                </a>
            </article>
        </section>
    </main>
    <footer>
        <?php include __DIR__ . '/components/footer.php'; ?>
    </footer>
    <script src="<?= BASE_URL ?>/public/script/script.js"></script>
</body>

</html>