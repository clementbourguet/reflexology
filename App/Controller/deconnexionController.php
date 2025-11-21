<?php

namespace App\Controller;

class DeconnexionController
{
    public function logout()
    {
        session_destroy();
        header("Location: " . \BASE_URL . "/");
        exit;
    }
}
