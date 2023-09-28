<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link  href="../css/style.css" rel="stylesheet"/>
    <link href="./connect_style.css" rel="stylesheet"/>
    <title>Projet Web Mapping</title>
</head>

<body>
    <!-- en-tête -->
    <?php include('../components/Header.php'); ?>
    
    <!-- corps -->
    <main class="card-connexion">
        <div class="container-connexion">
            <form class="form-connexion" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <h2>Connexion</h2>
                    <div class="form-connexion__group">
                        <label for="username">Nom d'utilisateur:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-connexion__group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button class="form-connexion__submit" type="submit">Se connecter</button>
                    <p>Vous n'avez pas de compte? <a href="inscription_user.php">S'inscrire</a></p>
            </form>
        </div>
    </main>

    <?php 

        session_start();

        // Récupérer les valeurs du formulaire
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $password = $_POST['password'];

            include('../database/connection.php');

            // Vérification du formulaire de connexion
            $sql = "SELECT * FROM information_schema.tables WHERE table_name = 'utilisateurs' AND table_schema = 'public'";
            $result = pg_query($dbconn2, $sql);

            if ($result && pg_num_rows($result) > 0) {
                // La table "utilisateurs" existe, exécuter la requête de connexion
                $sql = "SELECT * FROM utilisateurs WHERE username = '$username' AND password = '$password'";
                $result = pg_query($dbconn2, $sql);

                if ($result && pg_num_rows($result) > 0) {
                    // L'utilisateur est connecté avec succès
                    $_SESSION['username'] = $username;
                    header("Location: index_connected.php");
                    echo "<script>setTimeout(function() { window.location.href = 'index_connected.php'; }, 100);</script>";
                    exit();
                } else {
                    // L'utilisateur n'a pas été trouvé dans la base de données
                    echo "<p style='color:red; text-align:center'>Identifiants invalides!</br>Veuillez réessayer</p>";
                }
            } else {
                // La table "utilisateurs" n'existe pas dans la base de données
                echo "Erreur : la table 'utilisateurs' n'existe pas.";
            }

            // Fermer la connexion à la base de données
            pg_close($dbconn2);
        }
    ?>
<script src="../js/menu-dropdown.js"></script>

</body>
</html>