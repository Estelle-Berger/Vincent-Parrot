<?php
session_start();

function check_auth() {
    $inactive = 3600; // 60 minutes

    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['last_activity'])) {
            $session_life = time() - $_SESSION['last_activity'];
            if ($session_life > $inactive) {
                // Si la session est expirée, la détruire et rediriger vers la page d'accueil
                session_unset();
                session_destroy();
                header("Location: ./index.php");
                exit();
            }
        }
        // Mettre à jour le temps de la dernière activité
        $_SESSION['last_activity'] = time();
    } else {
        // Si l'utilisateur n'est pas authentifié, rediriger vers la page d'accueil
        header("Location: ./password_employe.php");
        exit();
    }
}