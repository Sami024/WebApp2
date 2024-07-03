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
    <?php 
        require('php/config.php');
        require_once('php/nav.php');

        if (isset($_POST['verwijder'])) {
            $prepared = $conn->prepare("DELETE FROM boekingen WHERE boekid = ?");
            $prepared->execute([$_POST['index']]);
        }
    ?>
    <div class="break" style="height: 100px;">
    </div>
    <?php
        $resultSet = $conn->query(
            "SELECT *
        FROM accounts
        INNER JOIN boekingen
        ON accounts.id = boekingen.account_id
        INNER JOIN reizen
        ON boekingen.reis_id = reizen.id
        WHERE accounts.id = " . $_SESSION['inlogid'] . ";"
        );
        if ($resultSet->fetch()) {
            echo '<h2 class="halfh2">Geboekte reizen</h2>';
        } else {
            echo '<h2 class="halfh2">Er zijn nog geen geboekte reizen.<br>Klik <a href="index.php" style="color: var(--Blue);">hier</a> om reizen te zoeken!</h2>';
        }
    ?>
    
    <div class="admin-container" style="margin-top: 0; width: 80vw;">
        <?php 
        

        $resultSet = $conn->query(
            "SELECT *
        FROM accounts
        INNER JOIN boekingen
        ON accounts.id = boekingen.account_id
        INNER JOIN reizen
        ON boekingen.reis_id = reizen.id
        WHERE accounts.id = " . $_SESSION['inlogid'] . ";"
        );
        while ($result = $resultSet->fetch()) {
            echo
            '
            <div class="advertentie ticket boeking-ticket">
                    <div class="adBanner" style="background-image: url(assets/images/'.strtolower($result['land']).'bg.jpg)">
                    </div>
                    <div class="titelRow">
                        <h3>'.$result['land'].' - '.$result['plaats'].'</h3>
                        <h3>€'.$result['preis'].'</h3>
                    </div>
                    <div class="titelRow">
                        <h3>'.$result['vertrekDatum'].'</h3>
                        <h3>'.$result['terugkomstDatum'].'</h3>
                    </div>
                    <form method="post">
                        <input type="hidden" name="index" value="'.$result['boekid'].'">
                        <a href="reis-pagina.php?id='.$result['id'].'" class="info-link">Meer informatie</a>
                        <input type="submit" value="annuleer" name="verwijder">
                    </form>
                </div>
           ';
        }
        ?>
    </div>
    <div class="sideScreen">
        <div class="information-p">
            <?php
                $resultSet = $conn->query(
                    "SELECT * FROM accounts WHERE id = ".$_SESSION['inlogid'].""
                );
                $result = $resultSet->fetch();
                echo '<h3>Gebruiker: </h3><h3>'.explode("@",$result['email'])[0].'</h3>';
                echo '<h3>E-mail: </h3><h3>'.$result['email'].'</h3>';
                echo '<a href="resetPassword.php" class="resetWachtwoord">Reset Wachtwoord</a>'
            ?>
        </div>
    </div>
</body>

</html>