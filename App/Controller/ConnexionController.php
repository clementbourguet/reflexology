<?php

namespace App\Controller;

use App\Model\User;

class ConnexionController
{
    public function connexion()
    {
        $error = '';

        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Instanciation du modèle User
            $userModel = new User();
            $userModel->setEmail($email);
            $user = $userModel->findUserByEmail();

            // Vérifier si l'utilisateur existe, mot de passe correct et actif
            if ($user && $user->verifyPassword($password) && $user->isActive()) {

                // Initialiser la session
                $_SESSION['connected'] = true;
                $_SESSION['user_id'] = $user->getIdUser();
                $_SESSION['user_name'] = $user->getFirstname();
                $_SESSION['id_roles'] = $user->getIdRoles();

                // Mettre à jour la date de dernière connexion
                $stmt = $userModel->getConnexion()->prepare(
                    "UPDATE users SET connexion_date = NOW() WHERE id = ?"
                );
                $stmt->execute([$user->getIdUser()]);

                // Redirection vers la page d'accueil
                header("Location: " . BASE_URL . "/");
                exit;
            } else {
                // Message d'erreur si login incorrect
                $error = "Email ou mot de passe incorrect";
            }
        }

        // Inclure la vue connexion
        include "App/View/viewConnexion.php";
    }

    public function error404()
    {
        include "App/View/viewError404.php";
    }
}