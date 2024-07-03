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

        $resultSet = $conn->prepare("SELECT * FROM reizen WHERE id = ? ");
        $resultSet->execute([$_GET['id']]);
        $resultSet = $conn->query(
        "SELECT *
        FROM accounts
        INNER JOIN boekingen
        ON accounts.id = boekingen.account_id
        INNER JOIN reizen
        ON boekingen.reis_id = reizen.id
        WHERE reizen.id = " . $_GET['id'] . ";"
        );
        ?>
        <table>
            <tr>
                <th>id</th>
                <th>plek</th>
                <th>begin-datum</th>
                <th>eind-datum</th>
                <th>email(van boeker)</th>
                <th>annuleren</th>
            </tr>
            <?php
            while ($result = $resultSet->fetch()) {
                echo
                ' 
                <tr>
                    <td>' . $result['boekid'] . '</td>
                    <td>' . $result['land'] . ', ' . $result['plaats'] . '</td>
                    <td>' . $result['vertrekDatum'] . '</td>
                    <td>' . $result['terugkomstDatum'] . '</td>
                    <td>' . $result['email'] . '</td>
                    <td><a class="admin-boekingen-annuleer-link" href="admin-annuleer.php?id=' . $result['boekid'] . '">Annuleren</a></td>
                </tr>
           ';
            }
            ?>

        </table>
    </div>
</body>

</html>