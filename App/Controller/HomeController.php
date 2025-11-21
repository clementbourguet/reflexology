<?php

namespace App\Controller;

class HomeController {

    public function home() {
        // Logique pour afficher la page d'accueil
        $name = $_GET["name"] ?? "";
        include "App/View/viewHome.php";
    }
    public function error404() {
        // Logique pour afficher une erreur 404
        include "App/View/viewError404.php";
    }

}