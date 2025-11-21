<?php

// Importer les ressources
include "./env.php";
include "./vendor/autoload.php";

session_start();

// Analyse de l'URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Calcul du chemin relatif par rapport à BASE_URL
$relativePath = substr($path, strlen(BASE_URL)); // supprime /reflexology
$relativePath = '/' . ltrim($relativePath, '/'); // assure un / devant
$relativePath = rtrim($relativePath, '/'); // supprime slash final
$relativePath = $relativePath === '' ? '/' : $relativePath; // si vide → '/'

// Import des controllers
use App\Controller\HomeController;
use App\Controller\RegisterController;
use App\Controller\ConnexionController;
use App\Controller\BookController;
use App\Controller\DeconnexionController;
use App\Controller\AdminController;

$homeController = new HomeController();
$registerController = new RegisterController();
$connexionController = new ConnexionController();
$bookController = new BookController();
$deconnexionController = new DeconnexionController();
$adminController = new AdminController();

// Routing
if (!isset($_SESSION["connected"])) {
    // Déconnectés : peuvent accéder à inscription et connexion
    switch ($relativePath) {
        case '/':
            $homeController->home();
            break;
        case '/inscription':
            $registerController->register();
            break;
        case '/connexion':
            $connexionController->connexion();
            break;
        case '/book':
            $bookController->book();
            break;
        default:
            $homeController->error404();
            break;
    }
} else {
    // Connectés : routes pour utilisateurs et admins
    switch (true) {

        case $relativePath === '/':
            $homeController->home();
            break;

        case $relativePath === '/book':
            $bookController->book();
            break;

        case $relativePath === '/deconnexion':
            $deconnexionController->logout();
            break;

        // ADMIN - toutes les fonctions sur une seule page
        case preg_match('#^/admin(/.*)?$#', $relativePath, $matches):
            if ($_SESSION['id_roles'] === 2) {
                // On regarde le sous-chemin après /admin
                $subPath = $matches[1] ?? '';

                if ($subPath === '' || $subPath === '/') {
                    // Dashboard
                    $adminController->dashboard();
                } elseif ($subPath === '/add') {
                    $adminController->addService();
                } elseif (preg_match('#^/edit/(\d+)$#', $subPath, $m)) {
                    $adminController->editService((int)$m[1]);
                } elseif (preg_match('#^/delete/(\d+)$#', $subPath, $m)) {
                    $adminController->deleteService((int)$m[1]);
                } else {
                    $homeController->error404();
                }
            } else {
                $homeController->error404();
            }
            break;

        default:
            $homeController->error404();
            break;
    }
}