<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link 
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" 
      rel="stylesheet"
     />
     <link 
      href="../css/style.css"
      rel="stylesheet"
     />
    <title>Projet Web Mapping</title>
</head>
<body>
    <!-- en-tête -->
    <?php 
        include('../components/Header.php')
    ?>

    <!-- corps -->

    <main class="main">
        <div class="consulting-content">
            <div class="consulting-content__title">
                <p>Consulter - Sujet PHP</p>
            </div>
                <b>Introduction</b> 
                
                <br></br>

                Le Ministère de la Culture souhaite mettre en place un site web permettant de cartographier les
                données culturelles des communes en Ile-de-France. Avec l’accroissement de la population dans la
                région et les Jeux Olympiques 2024 qui arriveront en France, le ministère souhaite mettre en place un
                site permettant de savoir par exemple quelles sont les communes qui sont éloignées des centres de
                loisir. 
                
                <br></br>
            
                <b>Objectifs</b> 
                
                <br></br>
            
                Ce site permettra de remplir plusieurs objectifs selon des critères fixés par le Ministère de la Culture.
                Une interface graphique permettant d'accéder à trois menus à savoir : 
                
                <br></br>

                - Recherche</br>
                - Consulter</br>
                - à propos</br>
                </br>
                Néanmoins, un quatrième onglet pourra être ajouté permettant aux utilisateurs de s’identifier en
                créant un compte qui permettrait d'accéder à certaines fonctionnalités.
                
                <br></br>

                <b>Une carte interactive permettant de remplir un certain nombre d’usages</b>
                
                <br></br>

                La carte interactive devrait permettre de rechercher et d’afficher les données suivantes :<br></br>
                • Afficher et zoomer sur les communes qui ont plus de 5 cinémas,</br>
                • Afficher et zoomer sur les communes ayant moins de deux cinémas ...</br>
                • Afficher les communes ayant plus de 20 hôtels 4*</br>
                • Afficher les communes ayant moins de 15 hôtels 3* et moins de 5 cinémas
                
                <br></br>

                <b>Assurer une qualité ergonomique optimale du site.

                </b></br>
                </br>

                Le site doit avoir un style CSS bien défini et son usage devrait être ergonomique et simple.
                
                <br></br>
                
                <b>Les données à disposition</b>
                
                <br></br>
                
                Pour cela, des données vous seront fournies afin de les insérer dans la base de données.
                
                <br></br>
                
                Il s’agit de :<br></br>
                • communes-ile-de-france.shp</br>
                • les_salles_de_cinemas_en_ile-de-france.shp</br>
                • les_hotels_classes_en_ile-de-France.shp</br>
                
                <br></br>
                
                Livraison du projet
                Le projet doit être envoyé au plus tard le 16 juillet 2023 sous format .zip comprenant le
                nom_prenom de l’élève.
                Aussi, il est préférable de joindre un document avec les étapes de développement de votre projet.
            </div>
        </div>
    </div>
</main>

<script src="../js/menu-dropdown.js"></script>

</body>
</html>