<?php

namespace App\Model;

use App\Utils\Bdd;
use App\Utils\Utilitaire;

class User
{
    private int $idUser;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $telephone;
    private string $signupDate;
    private string $connexionDate;
    private bool $active;
    private int $idRoles;


    //bdd

    private \PDO $connexion;

    public function __construct()
    {
        $this->connexion = (new Bdd())->connectBDD();
    }
    public function getConnexion(): \PDO
    {
        return $this->connexion;
    }
    //getters et Setters
    public function getIdUser(): int
    {
        return $this->idUser;
    }
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }
    public function getIdRoles(): int
    {
        return $this->idRoles;
    }
    public function setIdRoles(int $idRoles): void
    {
        $this->idRoles = $idRoles;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }
    public function getSignupDate(): string
    {
        return $this->signupDate;
    }
    public function setSignupDate(string $signupDate): void
    {
        $this->signupDate = $signupDate;
    }
    public function getConnexionDate(): string
    {
        return $this->connexionDate;
    }
    public function setConnexionDate(string $connexionDate): void
    {
        $this->connexionDate = $connexionDate;
    }
    public function isActive(): bool
    {
        return $this->active;
    }
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }
    //méthodes
    public function hashPassword(): void
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    //Méthodes (requetes sql)
    public function saveUser(): User
    {
        try {
            // Sanitize uniquement ici
            $firstname = Utilitaire::sanitize($this->firstname);
            $lastname  = Utilitaire::sanitize($this->lastname);
            $email     = Utilitaire::sanitize($this->email);
            $password  = $this->password; // déjà hashé si hashPassword() appelé avant
            $telephone = Utilitaire::sanitize($this->telephone);
            $signupDate = date("Y-m-d H:i:s");
            $connexionDate = date("Y-m-d H:i:s");
            $active = 1;

            $request = "INSERT INTO users(firstname, lastname, email, password, telephone, signup_date, connexion_date, active) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $req = $this->connexion->prepare($request);
            $req->bindParam(1, $firstname);
            $req->bindParam(2, $lastname);
            $req->bindParam(3, $email);
            $req->bindParam(4, $password);
            $req->bindParam(5, $telephone);
            $req->bindParam(6, $signupDate);
            $req->bindParam(7, $connexionDate);
            $req->bindParam(8, $active, \PDO::PARAM_BOOL);

            $req->execute();

            $this->idUser = (int)$this->connexion->lastInsertId();
            $this->setIdUser($this->idUser);

            return $this;
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage());
        }
    }

    public function isUserByEmailExist(): bool
    {
        try {
            $email = Utilitaire::sanitize($this->email);
            $request = "SELECT u.id FROM users AS u WHERE u.email = ?";
            $req = $this->connexion->prepare($request);
            $req->bindParam(1, $email);
            $req->execute();

            $result = $req->fetch(\PDO::FETCH_ASSOC);
            return !empty($result);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function findUserByEmail(): ?User
    {
        try {
            $email = Utilitaire::sanitize($this->email);
            $request = "SELECT u.id AS idUser, u.firstname, u.lastname,
             u.password, u.email, u.active, u.id_roles AS idRoles 
                        FROM users AS u WHERE u.email = ?";
            $req = $this->connexion->prepare($request);
            $req->bindParam(1, $email);
            $req->execute();

            $req->setFetchMode(\PDO::FETCH_CLASS, User::class);
            $user = $req->fetch();

            return $user ?: null;
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
        }
    }
}