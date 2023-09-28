<?php
    // Détruire la session ou réinitialiser les variables de session
    session_start();
    session_destroy(); // ou session_unset() pour réinitialiser les variables de session

    // Rediriger vers la page d'accueil ou une autre page après la déconnexion
    header('Location: /olympic-games_php-project/index.php');
    exit();
?>
