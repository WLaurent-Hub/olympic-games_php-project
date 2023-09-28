
<!DOCTYPE html>
<html lang="en">
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/olympic-games_php-project/database/connection.php');
    // Si le $_POST n'est pas vide, on exécute les requêtes SQL
    if (isset($_POST['filter-option'])) {
        $option = $_POST['filter-option'];
        // Requête SQL du premier bouton radio
        if ($option === "more-than-5") {
            $query = 
            "SELECT cp, nombre_commerce, ST_AsGeoJSON(commerce_commune.geom) AS geom 
            FROM (SELECT cinema.code_insee AS cp, COUNT(cinema.code_insee) AS nombre_commerce
            FROM les_salles_de_cinemas_en_ile_de_france AS cinema
            GROUP BY cp
            HAVING COUNT(cinema.code_insee) > 5) AS cinema_commerce
            JOIN les_commerces_par_commune_ou_arrondissement_base_permanente_des AS commerce_commune
            ON cinema_commerce.cp = commerce_commune.departement__1;";
        
        // Requête SQL du second bouton radio
        } elseif ($option === "less-than-2") {
            $query = 
            "SELECT cp,nombre_commerce, ST_AsGeoJSON(commerce_commune.geom) AS geom FROM (SELECT cinema.code_insee AS cp, COUNT(cinema.code_insee) AS nombre_commerce
            FROM les_salles_de_cinemas_en_ile_de_france AS cinema
            GROUP BY cp
            HAVING count(cinema.code_insee) < 2) AS cinema_commerce
            JOIN les_commerces_par_commune_ou_arrondissement_base_permanente_des AS commerce_commune
            ON cinema_commerce.cp = commerce_commune.departement__1;";

        // Requête SQL du troisième bouton radio
        } elseif ($option === "more-than-20") {
            $query =
            "SELECT nouveau_codeINSEE AS cp, nombre_commerce, ST_AsGeoJSON(commerce_commune.geom) AS geom FROM (SELECT 
            CASE
                WHEN LEFT(hotel.code_postal::text, 2) = '75' THEN hotel.code_postal + 100
                ELSE hotel.code_postal
            END AS nouveau_codeINSEE,
            COUNT(hotel.code_postal) AS nombre_commerce, hotel.classement
            FROM les_hotels_classes_en_ile_de_france AS hotel
            WHERE hotel.classement LIKE '4%'
            GROUP BY nouveau_codeINSEE, hotel.classement
            Having COUNT(code_postal) > 20) AS hotel_commerce
            JOIN les_commerces_par_commune_ou_arrondissement_base_permanente_des AS commerce_commune
            ON hotel_commerce.nouveau_codeINSEE = commerce_commune.departement__1;";

        // Requête SQL du quatrième bouton radio
        } else if ($option === "less-than-15-cinemas-less-than-5"){
            $query = 
            "SELECT hotel_commerce.nouveau_codeINSEE AS cp, nombre_commerce, count(cinema.code_insee) as nombre_cinema, ST_AsGeoJSON(commerce_commune.geom) as geom from (SELECT 
            CASE
                WHEN LEFT(hotel.code_postal::text, 2) = '75' THEN hotel.code_postal + 100
                ELSE hotel.code_postal
            END AS nouveau_codeINSEE,
            COUNT(hotel.code_postal) AS nombre_commerce, hotel.classement
            FROM les_hotels_classes_en_ile_de_france as hotel
            where hotel.classement like '3%'
            GROUP BY nouveau_codeINSEE, hotel.classement
            Having COUNT(code_postal) < 15) as hotel_commerce
            join les_commerces_par_commune_ou_arrondissement_base_permanente_des as commerce_commune
            on hotel_commerce.nouveau_codeINSEE = commerce_commune.departement__1
            join les_salles_de_cinemas_en_ile_de_france as cinema
            on cinema.code_insee = commerce_commune.departement__1
            group by nouveau_codeINSEE, hotel_commerce.nombre_commerce, commerce_commune.geom
            having count(cinema.code_insee) < 5";
        
        // Requête SQL pour la partie connexion
        } else {
            $query = "$option";
        }
    // Affiche 100 cinéma si pas de sélection sur le bouton radio
    } else {
        $query = "SELECT 
        gid,
        ST_AsGeoJSON(les_salles_de_cinemas_en_ile_de_france.geom)  
        as geom 
        FROM les_salles_de_cinemas_en_ile_de_france 
        LIMIT 100";
    }

   // Construction de la requête SQL en fonction de la valeur sélectionnée

   $result = pg_query($dbconn2, $query);

   if (!$result) {
       echo "An error occurred.\n";
       exit;
   }

   $list_commerce = array();
   while ($row = pg_fetch_assoc($result)) {
       $list_commerce[] = $row;
   }
    ?>
