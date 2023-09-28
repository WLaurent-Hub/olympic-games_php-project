<?php
    require($_SERVER['DOCUMENT_ROOT'] . '/olympic-games_php-project/config.php');

    $dbconn2 = pg_connect("host=" . DATABASE_HOST . " port=" . DATABASE_PORT . " dbname=" . DATABASE_NAME . " user=" . DATABASE_USER . " password=" . DATABASE_PASS);
  
    if (!$dbconn2) {
        echo "An error occurred.\n";
        exit;
    }
?>