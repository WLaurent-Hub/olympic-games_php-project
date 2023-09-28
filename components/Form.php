<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
     <link href="../css/style.css" rel="stylesheet"/>
     <link href="./connect_style.css" rel="stylesheet"/>
     <link rel="stylesheet" 
     href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/11.0.0/material-components-web.min.css">
    <title>Projet Web Mapping</title>
</head>
<main class="main">
        <div class="form-content">
            <div class="form-content__tile">
                <p>Filtrage pour les Jeux Olympiques 2024</p>
                <?php  if (!empty($_SESSION['username'])) {echo '<a href="deconnexion.php">Déconnexion</a>';}?>
            </div>
            <?php
                if (!empty($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo 'Bonjour '.$username.', vous êtes actuellement connecté 🟢​';
                }
                ?>

            <div class="card">
                <div class="card__form" >
                    <div class="card__form--padding">
                    <h2 style="margin-bottom: 50px;">Recherche</h2>
                    <form id="filter-radio" action="" method="POST">
                    <div class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="cinemas-more-than-5" name="filter-option" value="more-than-5">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label for="cinemas-more-than-5">Afficher et zoomer sur les communes avec plus de 5 cinémas</label>
                    </div>

                    <div class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="cinemas-less-than-2" name="filter-option" value="less-than-2">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label for="cinemas-less-than-2">Afficher et zoomer sur les communes avec moins de 2 cinémas</label>
                    </div>

                        <div class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="hotels-more-than-20" name="filter-option" value="more-than-20">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label for="hotels-more-than-20">Afficher et zoomer sur les communes avec plus de 20 hôtels 4*</label>
                        </div>

                        <div class="mdc-form-field">
                        <div class="mdc-radio">
                            <input class="mdc-radio__native-control" type="radio" id="hotels-less-than-15-cinemas-less-than-5" name="filter-option" value="less-than-15-cinemas-less-than-5">
                            <div class="mdc-radio__background">
                                <div class="mdc-radio__outer-circle"></div>
                                <div class="mdc-radio__inner-circle"></div>
                            </div>
                        </div>
                        <label for="hotels-less-than-15-cinemas-less-than-5">Afficher les communes avec moins de 15 hôtels 3* et moins de 5 cinémas</label>
                        </div>

                        <button class="mdc-button mdc-button--raised" type="submit">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Filtrer</span>
                        </button>

                        <?php 
                            if (!empty($_SESSION['username'])) {
                                echo "
                                <button id='display-option-button' class='mdc-button mdc-button--raised' type='submit'>
                                    <span class='mdc-button__ripple'></span>
                                    <span class='mdc-button__label'>Options</span>
                                </button>";
                            }
                        ?>
                    </form>

                     <?php 
                        if (!empty($_SESSION['username'])) {
                            echo "
                            <form style='display:none;' id='filter-text' action='' method='POST'>
                                <p>Entrer votre requête SQL :</p>
                                <div style='width:100%;height:30vh' class='mdc-text-field mdc-text-field--outlined mdc-text-field--textarea mdc-text-field--fullwidth'>
                                    <textarea style='font-size: 12px;' class='mdc-text-field__input' id='text-field-hero-input' name='filter-option'></textarea>
                                    <div class='mdc-notched-outline'>
                                        <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch'>
                                            <label for='text-field-hero-input' class='mdc-floating-label'></label>
                                        </div>
                                        <div class='mdc-notched-outline__trailing'></div>
                                    </div>
                                </div>
                        
                                <button class='mdc-button mdc-button--raised' type='submit'>
                                    <span class='mdc-button__ripple'></span>
                                    <span class='mdc-button__label'>Filtrer</span>
                                </button>

                                <button id='display-option-button-reverse' class='mdc-button mdc-button--raised' type='submit'>
                                    <span class='mdc-button__ripple'></span>
                                    <span class='mdc-button__label'>Options</span>
                                </button>
                            </form>";
                        }
                        ?>
                    </div>
                </div>

                <div class="card__form">
                    <div class="card__form--inner">
                    <?php
                        require($_SERVER['DOCUMENT_ROOT'] . '/olympic-games_php-project/components/Map.php');
                    ?>
                    </div>
                   
                </div>
        </div>
    </div>
</div>
</main>