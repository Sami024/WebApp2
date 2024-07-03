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
    ?>

    <?php
    if (isset($_POST['boeken'])) {
        $var_id = explode(';',$_SESSION['mandje']);
        for ($i = 0; $i < sizeof($var_id) -1; $i++) {
            $prepare = $conn->prepare("INSERT INTO boekingen(account_id, reis_id, betaald) values(?,?,0)");
            $prepare->execute([$_SESSION['inlogid'],$var_id[$i]]);
        }
        $_SESSION['mandje'] = "";
        echo "<div class='break'></div>
        <h2>Gefeliciteerd met de boeking!</h2>";
    }

    if (isset($_POST['verwijder'])) {
        $var_id = explode(';',$_SESSION['mandje']);
        $_SESSION['mandje'] = null;
        $newMandje = "";
        for ($i = 0; $i < sizeof($var_id) -1; $i++) {
            if ($i != $_POST['index']) {
                $newMandje = $newMandje.$var_id[$i].";";
            }   
        }
        $_SESSION['mandje'] = $newMandje;
    }

    if (isset($_SESSION['mandje']) && sizeof(explode(';',$_SESSION['mandje'])) > 1) {
        echo "<div class='break'></div>";
        $var_id = explode(';',$_SESSION['mandje']);
        for ($i = 0; $i < sizeof($var_id) -1; $i++) {
            $prepared = $conn->prepare("SELECT * FROM reizen WHERE id = ?");
            $prepared->execute([$var_id[$i]]);
            $result = $prepared->fetch();
            echo '<div class="advertentie ticket">
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
                        <input type="hidden" name="index" value="'.$i.'">
                        <input type="submit" value="Verwijder" name="verwijder">
                    </form>

                </div>';
        }

        echo "<div class='sideSum'>
        ";
        $sum = 0;
        for ($i = 0; $i < sizeof($var_id) -1; $i++) {
            $prepared = $conn->prepare("SELECT * FROM reizen WHERE id = ?");
            $prepared->execute([$var_id[$i]]);
            $result = $prepared->fetch();
            echo "<div><p>".$result['land']."</p><p>€".$result['preis']."</p></div>";
            $sum += (int)$result['preis'];
        }

        echo "
            <div class='line'></div>
            <div><p>Totaal:</p><p>€".$sum."</p></div>
            <form action='' method='post'>
                <input type='submit' value='Boeken' name='boeken'>
            </form>

        </div>";

    } else if (!isset($_POST['boeken'])) {
        echo "
        <div class='break'></div>
        <h2>Je hebt nog niks in je winkelmand.</h2>
        ";
    }
    ?> 
    
</body>

</html>