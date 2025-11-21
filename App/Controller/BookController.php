<?php

namespace App\Controller;
use App\Model\Service;

class BookController {

    public function book() {
        // Récupérer les services actifs depuis le modèle
        $serviceModel = new Service();
        $services = $serviceModel->getAllServices();

        // Filtrer uniquement les services actifs
        $services = array_filter($services, function($s) {
            return isset($s['active']) && (int)$s['active'] === 1;
        });

        // Récupérer le service sélectionné s'il existe
        $selectedServiceId = isset($_GET['service']) ? (int)$_GET['service'] : null;
        $selectedService = null;
        
        if ($selectedServiceId) {
            $selectedService = $serviceModel->getServiceById($selectedServiceId);
        }

        // Inclure la vue (la vue pourra utiliser $services, $selectedService et $selectedServiceId)
        include "App/View/viewBook.php";
    }

    public function error404() {
        include "App/View/viewError404.php";
    }
}