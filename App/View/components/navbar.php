<!-- components/navbar.php -->

<nav aria-label="navigation principale">
    <div class="logo">
        <a href="<?= BASE_URL ?>/">
            <img id="logo" src="<?= BASE_URL ?>/public/image/logoHD.png" alt="Logo Violette Gilavert Reflexologie">
        </a>

    </div>
    <div class="burger">
        <a id="burger_menu_trigger" href="#">
            <img id="burger_menu" src="<?= BASE_URL ?>/public/image/burger_menu.png" alt="Logo menu burger">
        </a>
    </div>
    <ul id="mobile_menu" class="main_nav" aria-hidden="true">
        <span id="close_menu">
            <img id="close_icon" src="<?= BASE_URL ?>/public/image/close_menu.png" alt="icone pour Fermer le menu">
        </span>
        <li>MON PARCOURS</li>
        <li>RÉFLEXOLOGIE</li>
        <li>PRESTATIONS</li>
        <li>TARIFS</li>
        <li>CONTACT</li>
        <li><a href="<?= BASE_URL ?>/book" class="active">SPÉCIALISATIONS</a></li>

        <?php if (isset($_SESSION['connected'])): ?>
            <?php if (!empty($_SESSION['id_roles']) && (int)$_SESSION['id_roles'] === 2): ?>
                <li><a href="<?= BASE_URL ?>/admin">ADMIN</a></li>
            <?php endif; ?>
            <li id="custom">Bonjour <br> <?= htmlspecialchars($_SESSION['user_name']) ?> !</li>
            <li><a id="sign_out" href="<?= BASE_URL ?>/deconnexion">Se déconnecter</a></li>
        <?php else: ?>
            <li class="user-link">
                <a href="<?= BASE_URL ?>/connexion">
                    <img id="user_logo" src="<?= BASE_URL ?>/public/image/user.png" alt="icône utilisateur">
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>