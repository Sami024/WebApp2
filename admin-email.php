<?php
global$conn;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
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
        require('php/config.php');
        require_once('php/nav.php');

        $resultSet = $conn->query("SELECT * FROM contact");
        ?>
        <table>
            <tr>
                <th>E-Mail</th>
                <th>Onderwerp</th>
                <th>Text</th>
            </tr>
            <?php
            while ($result = $resultSet->fetch()) {
                echo
                ' 
                <tr>
                    <td>' . $result['email'] . '</td>
                    <td>' . $result['onderwerp'] . '</td>
                    <td>' . $result['text'] . '</td>
                </tr>
           ';
            }
            ?>

        </table>
    </div>
</body>

</html>