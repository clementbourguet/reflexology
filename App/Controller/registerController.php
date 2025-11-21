<?php

namespace App\Controller;

use App\Model\User;

class RegisterController
{
    public function register()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $email = $_POST['email'] ?? '';
            $telephone = $_POST['telephone'] ?? '';
            $password = $_POST['password'] ?? '';
            $passwordConfirm = $_POST['password_confirm'] ?? '';

            // Validation
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                $error = "Tous les champs obligatoires doivent être remplis.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email invalide.";
            } elseif ($password !== $passwordConfirm) {
                $error = "Les mots de passe ne correspondent pas.";
            } else {
                $user = new User();
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setTelephone($telephone);
                $user->setPassword($password);
                $user->hashPassword();

                if ($user->isUserByEmailExist()) {
                    $error = "Un compte existe déjà avec cet email.";
                } else {
                    // Enregistrement dans la BDD
                    $user->saveUser();

                    // Message de confirmation via session
                    $_SESSION['success_message'] = "Inscription confirmée ! Vous pouvez maintenant vous connecter.";

                    // Redirection vers la page de connexion
                    header("Location: " . BASE_URL . "/connexion");
                    exit;
                }
            }
        }

        // Inclure la vue
        include __DIR__ . '/../View/viewRegister.php';
    }

    public function error404()
    {
        include __DIR__ . '/../View/viewError404.php';
    }
}
