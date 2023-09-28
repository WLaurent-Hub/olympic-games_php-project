<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <link  href="./connect_style.css" rel="stylesheet"/>
    <title>Projet Web Mapping</title>
</head>

<body>
    <!-- en-tête -->
    <?php
        include('../components/header.php') 
    ?>

    <!-- corps -->
    <main class="card-inscription">
        <div class="container-inscription">
            <form class="form-inscription" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h2>Inscription</h2>
                <div class="form-inscription__group">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="new-username" required>
                </div>
                <div class="form-inscription__group">
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="new-password" required>
                </div>
                <button class="form-inscription__submit" type="submit">Se connecter</button>
                <p>Vous avez déjà un compte ? <a href="connect_user.php">Se connecter</a></p>
            </form>
            <?php  
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Récupérer les valeurs du formulaire
                    $newUsername = $_POST['new-username'];
                    $newPassword = $_POST['new-password'];
                    // Connexion à la base de données PostgreSQL

                    include('../database/connection.php');

                    // Vérifier si l'utilisateur existe déjà dans la base de données
                    $sql = "SELECT * FROM utilisateurs WHERE username = '$newUsername'";
                    $result = pg_query($dbconn2, $sql);
                    if ($result && pg_num_rows($result) > 0) {
                        // L'utilisateur existe déjà
                        echo "<p style='color:red'>Cet utilisateur existe déjà.</br> Veuillez choisir un autre nom d\'utilisateur.</p>";
                    } else {
                        // Insérer le nouvel utilisateur dans la base de données
                        $sql = "INSERT INTO utilisateurs (username, password) VALUES ('$newUsername', '$newPassword')";
                        $insertResult = pg_query($dbconn2, $sql);
                        if ($insertResult) {
                            // L'utilisateur a été inscrit avec succès
                            echo "<p style='color:green'>Inscription réussie!</br>Vous allez être redirigé</p>";
                            echo "<script>setTimeout(function() { window.location.href = 'connect_user.php'; }, 2000);</script>";
                        } else {
                            // Erreur lors de l'inscription
                            echo "<p style='color:red'>Une erreur est survenue lors de l\'inscription. Veuillez réessayer.</p>";
                        }
                    }
                    // Fermer la connexion à la base de données
                    pg_close($dbconn2);
                }
            ?>
        </div>
    </main>

<script src="../js/menu-dropdown.js"></script>

</body>
</html>