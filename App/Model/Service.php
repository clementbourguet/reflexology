<?php

namespace App\Model;

use App\Utils\Bdd;
use PDO;
use PDOException;
class Service
{
    private \PDO $connexion;

    public function __construct()
    {
        try {
            $this->connexion = (new Bdd())->connectBDD();
        } catch (PDOException $e) {
            error_log("Erreur de connexion BDD dans Service : " . $e->getMessage());
            throw new \RuntimeException("Impossible de se connecter à la base de données", 0, $e);
        }
    }

    public function getAllServices(): array
    {
        try {
            $sql = "SELECT id, name, description, duration_minutes, price, active FROM services";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des services : " . $e->getMessage());
            return [];
        }
    }

    public function getServiceById(int $id): ?array
    {
        $sql = "SELECT id, name, description, duration_minutes, price, active 
                FROM services 
                WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public function addService(array $data): void
    {
        $sql = "INSERT INTO services (name, description, duration_minutes, price, active) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connexion->prepare($sql);

        $stmt->bindParam(1, $data['name'], \PDO::PARAM_STR);
        $stmt->bindParam(2, $data['description'], \PDO::PARAM_STR);
        $stmt->bindParam(3, $data['duration_minutes'], \PDO::PARAM_INT);
        $stmt->bindParam(4, $data['price']);
        $active = $data['active'] ?? true;
        $stmt->bindParam(5, $active, \PDO::PARAM_BOOL);

        $stmt->execute();
    }

    public function updateService(int $id, array $data): void
    {
        $sql = "UPDATE services 
                SET name = ?, description = ?, duration_minutes = ?, price = ?, active = ? 
                WHERE id = ?";
        $stmt = $this->connexion->prepare($sql);

        $stmt->bindParam(1, $data['name'], \PDO::PARAM_STR);
        $stmt->bindParam(2, $data['description'], \PDO::PARAM_STR);
        $stmt->bindParam(3, $data['duration_minutes'], \PDO::PARAM_INT);
        $stmt->bindParam(4, $data['price']);
        $active = $data['active'] ?? true;
        $stmt->bindParam(5, $active, \PDO::PARAM_BOOL);
        $stmt->bindParam(6, $id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function deleteService(int $id): bool
    {
        try {
            $sql = "DELETE FROM services WHERE id = ?";
            $stmt = $this->connexion->prepare($sql);
            return $stmt->execute([$id]); // Passer directement le paramètre
        } catch (\PDOException $e) {
            error_log("Erreur lors de la suppression du service : " . $e->getMessage());
            return false;
        }
    }
}