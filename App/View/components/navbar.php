<!-- components/navbar.php -->
<?php
// Récupère l'URL actuelle
$current_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Retire le BASE_URL si nécessaire pour la comparaison
$current_path = str_replace(rtrim(BASE_URL, '/'), '', $current_path);
?>

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
    <div>
        <ul id="mobile_menu" class="main_nav" aria-hidden="true">
            <span id="close_menu">
                <img id="close_icon" src="<?= BASE_URL ?>/public/image/close_menu.png" alt="icone pour Fermer le menu">
            </span>
            <li><a href="<?= BASE_URL ?>/mon_parcours" 
                   class="<?= (strpos($current_path, '/mon_parcours') !== false) ? 'active' : '' ?>">
                MON PARCOURS
            </a></li>
            <li><a href="<?= BASE_URL ?>/reflexologie" 
                   class="<?= (strpos($current_path, '/reflexologie') !== false) ? 'active' : '' ?>">
                RÉFLEXOLOGIE
            </a></li>
            <li><a href="<?= BASE_URL ?>/prestations" 
                   class="<?= (strpos($current_path, '/prestations') !== false) ? 'active' : '' ?>">
                PRESTATIONS
            </a></li>
            <li><a href="<?= BASE_URL ?>/tarifs" 
                   class="<?= (strpos($current_path, '/tarifs') !== false) ? 'active' : '' ?>">
                TARIFS
            </a></li>
            <li><a href="<?= BASE_URL ?>/contact" 
                   class="<?= (strpos($current_path, '/contact') !== false) ? 'active' : '' ?>">
                CONTACT
            </a></li>
            <li><a href="<?= BASE_URL ?>/book" 
                   class="<?= (strpos($current_path, '/book') !== false) ? 'active' : '' ?>">
                SPÉCIALISATIONS
            </a></li>

            <?php if (isset($_SESSION['connected'])): ?>
                <li id="custom">Bonjour <br> <?= htmlspecialchars($_SESSION['user_name']) ?> !</li>
                <?php if (!empty($_SESSION['id_roles']) && (int)$_SESSION['id_roles'] === 2): ?>
                    <li><a href="<?= BASE_URL ?>/admin" 
                           class="<?= (strpos($current_path, '/admin') !== false) ? 'active' : '' ?>">
                        ADMIN
                    </a></li>
                <?php endif; ?>
                <li><a id="sign_out" href="<?= BASE_URL ?>/deconnexion">Se déconnecter</a></li>
            <?php else: ?>
                <li class="user-link">
                    <a href="<?= BASE_URL ?>/connexion">
                        <img id="user_logo" src="<?= BASE_URL ?>/public/image/user.png" alt="icône utilisateur">
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>