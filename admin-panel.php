<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,200;0,400;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Sami.css">
    <link rel="stylesheet" href="css/Senna.css">
</head>

<body>
    <div class="admin-container">
        <?php
        require_once('php/config.php');
        require_once('php/nav.php');
    ?>

    <a href="admin-add.php" class="addbutton">+</a>

    <div class="admin-container">
        <?php
        $resultSet = $conn->query("SELECT * FROM reizen");
        while ($result = $resultSet->fetch()) {
            echo
            ' 
            <div class="admin-reis-item adbanner" style="background-image: url(assets/images/'.strtolower($result['land']).'bg.jpg)">
                <div class="admin-head-text">
                    <h2 id="admin-land-plaats-text">' . $result['land'] . ', ' . $result['plaats'] . '</h2>
                </div>
                <div class="admin-button-wrapper">
                    <a id="admin-edit-button" href="admin-edit.php?id='.$result['id'].'">Edit</a>
                    <a id="admin-boekingen-button" href="admin-boekingen.php?id='.$result['id'].'">Boekingen</a>
                </div>
            </div>
           ';
        }
        ?>

    </div>
</body>

</html> 