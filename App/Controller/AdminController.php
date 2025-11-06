<?php

namespace App\Controller;

use App\Model\Service;

class AdminController
{

    public function dashboard(): void
    {
        $serviceModel = new Service();
        $services = $serviceModel->getAllServices();

        $selectedService = null;
        if (!empty($_GET['id'])) {
            $selectedService = $serviceModel->getServiceById((int) $_GET['id']);
        }

        include "App/View/adminDashboard.php";
    }

    public function addService(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name'             => $_POST['name'] ?? '',
                'description'      => $_POST['description'] ?? '',
                'duration_minutes' => (int) ($_POST['duration_minutes'] ?? 0),
                'price'            => (float) ($_POST['price'] ?? 0),
                'active'           => isset($_POST['active']) ? 1 : 0,
            ];
            $serviceModel = new Service();
            $serviceModel->addService($data);

            header("Location: " . BASE_URL . "/admin");
            exit;
        }
        header("Location: " . BASE_URL . "/admin");
        exit;
    }

    public function editService(int $id): void
    {
        $serviceModel = new Service();
        $service = $serviceModel->getServiceById($id);

        if (!$service) {
            include "App/View/viewError404.php";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name'             => $_POST['name'] ?? $service['name'],
                'description'      => $_POST['description'] ?? $service['description'],
                'duration_minutes' => (int) ($_POST['duration_minutes'] ?? $service['duration_minutes']),
                'price'            => (float) ($_POST['price'] ?? $service['price']),
                'active'           => isset($_POST['active']) ? 1 : 0,
            ];

            $serviceModel->updateService($id, $data);

            header("Location: " . BASE_URL . "/admin?id=" . $id);
            exit;
        }

        header("Location: " . BASE_URL . "/admin");
        exit;
    }

    public function deleteService(int $id): void
    {
        $serviceModel = new Service();
        $service = $serviceModel->getServiceById($id);

        if (!$service) {
            include "App/View/viewError404.php";
            return;
        }

        $serviceModel->deleteService($id);

        header("Location: " . BASE_URL . "/admin");
        exit;
    }
}