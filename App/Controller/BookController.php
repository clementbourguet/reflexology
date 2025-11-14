<?php

namespace App\Controller;
use App\Model\Service;

class BookController {

    public function book() {
        // Récupérer les services actifs depuis le modèle
        $serviceModel = new Service();
        $services = $serviceModel->getAllServices();

        // Option : ne garder que les services 'active' à true (ajuste selon ton schéma DB)
        $services = array_filter($services, function($s) {
            // certains DB renvoient '1' / '0' ou true/false
            return isset($s['active']) && (int)$s['active'] === 1;
        });

        // Inclure la vue (la vue pourra utiliser $services)
        include "App/View/viewBook.php";
    }

    public function error404() {
        include "App/View/viewError404.php";
    }
}