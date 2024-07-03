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
    <link rel="stylesheet" href="css/land-foto.css">
</head>

<body>
    <?php
    require('php/config.php');
    require_once('php/nav.php');
    $resultSet = $conn->prepare("SELECT * FROM reizen WHERE id = ?");
    $resultSet->execute([$_GET['id']]);
    $result = $resultSet->fetch();

    if (isset($_POST['winkelmand'])) {
        if (isset($_SESSION['mandje'])) {
            $_SESSION['mandje'] = $_SESSION['mandje'] . $_GET['id'] . ";";
        } else {
            $_SESSION['mandje'] = $_GET['id'] . ";";
        }
    }

    if ($result['handicap_vriendelijk'] == 0) {
        $handicapresult = "nee";
    } else {
        $handicapresult = "ja";
    }
    echo '
    <div class="reis-pagina-container">
    <div class="';
    echo ' ' . strtolower($result['land']);
    echo '"></div>
    <div class="reis-info">
    <div class="naam-prijs-balk">
    <h1 id="naam-plek">' . $result['land'] . ', ' . $result['plaats'] . '</h1>
    <h1 id="prijs">€' . $result['preis'] . '</h1>
    </div>
        <h2>Reis Planning: ' . $result['vertrekDatum'] . ' tot ' . $result['terugkomstDatum'] . '</h2>
        <ul>
            <h2 id="head-lijst">Informatie.</h2>
            <li>wc: ' . $result['wc'] . '.</li>
            <li>slaapkamers: ' . $result['slaapkamers'] . '.</li>
            <li>handikap vriendelijk: ' . $handicapresult . '.</li>
            <li>oppervlakte woning: ' . $result['oppervlakte_woning'] . 'm².</li>
        </ul>
        <ul>
            <h2 id="head-lijst">Beschrijving.</h2>
            <p>' . $result['beschrijving'] . '</p>
        </ul>
   
    
    ';
    echo '<div class="break"></div>';
    if (isset($_SESSION['inlogid'])) {
        echo ' <div class="reis-pagina-link-container">
        <form action="" method="POST" class="winkelmand">
            <input type="submit" value=" " name="winkelmand">
            </form>
            <form action="recensies.php?id=' . $_GET['id'] . '" method="POST" class="ster">
            <input type="submit" value=" " name="ster">
            </form>
            </div>
        </div>
        ';
    } else {
        echo '
            <p>Login om te boeken. Of om een recensie te plaatsen.</p>
            </div>
            ';
    }



    echo "</div>
        <div class='reis-pagina-container'>";
    ?>
    <div>
        <?php
        $resultSet = $conn->prepare('SELECT *
    FROM recensies
    INNER JOIN accounts
    ON recensies.account_id = accounts.id WHERE recensies.reis_id = ?');
        $resultSet->execute([$_GET['id']]);
        echo '<h2 id="head-lijst">Recensies.</h2>';
        if ($result = $resultSet->fetch()) {
            echo '
        <ul>
        <li>';
            for ($i = 1; $i <= $result['sterren']; $i++) {
                echo '★';
            }
            echo '  ' . $result['email'] . ': ' . $result['recensie'] . '</li>
        </ul> ';
        } else {
            echo "geen recensies";
        }
        while ($result = $resultSet->fetch()) {
            echo '
    <ul>
    
    <li>';
            for ($i = 1; $i <= $result['sterren']; $i++) {
                echo '★';
            }
            echo '  ' . $result['email'] . ': ' . $result['recensie'] . '</li>
    </ul> </div>';
        }


        ?>
    </div>
</body>

</html>