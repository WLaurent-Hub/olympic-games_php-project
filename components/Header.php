<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<!-- en-tête -->
<section class="wrapper">
    <header class="header">
        <div class="header__left">
            <img class="header__logo" style="width:100px;" src="/olympic-games_php-project/image/logo_gouv.png">
        </div>
        <div class="header__center">
            <h3 style="font-weight: 600;">Portail cartographique</h3>
        </div>
        <div class="header__right">
            <?php
            if (!empty($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "<a class='material-icons-outlined'>person_outline</a>";
                echo "<div style='display:flex;justify-content:center'>".$username."</div>";
            } else {
                echo "
                <a id='menu-drop' class='material-icons-outlined'>apps</a>
                <div class='dropdown' id='dropdown'>
                    <a href='/olympic-games_php-project/index.php'><i class='bx bx-map-alt'></i> Recherche</a>
                    <a href='/olympic-games_php-project/components/Consulting.php'><i class='bx bx-book'></i> Consulter</a>
                    <a href='/olympic-games_php-project/components/Propos.php'><i class='bx bxs-info-square'></i> À propos</a>
                    <a href='/olympic-games_php-project/user_identification/connect_user.php'><i class='bx bxs-user'></i> Connexion</a>
                </div>";
            }
            ?>
        </div>
    </header>
</section>