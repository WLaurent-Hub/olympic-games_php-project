<?php
session_start();
?>
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/11.0.0/material-components-web.min.css">

    <title>Projet Web Mapping</title>
</head>
<body>
    <?php 
        include('../components/Header.php');
        include('../components/Form.php');
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.js"></script>
<script>

    const toggleDisplayElements = (buttonId, element1Id, element2Id) => {
        const button = document.getElementById(buttonId);
        const element1 = document.getElementById(element1Id);
        const element2 = document.getElementById(element2Id);

        button.addEventListener('click', (e) => {
            e.preventDefault();
            element1.style.display = 'none';
            element2.style.display = 'block';
        });
    }

    toggleDisplayElements('display-option-button', 'filter-radio', 'filter-text');
    toggleDisplayElements('display-option-button-reverse', 'filter-text', 'filter-radio');

</script>
</body>
</html>
