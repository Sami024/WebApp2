<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Senna.css">
</head>
<body id="resultaat-pagina">
<?php
    require_once("php/config.php");
    require_once("php/nav.php");
    require_once("php/search.php");
?>
<div class="advertentie-wrapper">


<?php
    echo "<div id='".$_GET['land']."'></div>";
    if ($_GET['land'] == "melvin") {
        header("crash.php");
    }

    $prijs1 = 1;
    $prijs2 = 2000;

    if (isset($_GET['vertrekdatum1'])) {
        $_GET['vertrekdatum1'];
        $date1 = $_GET['vertrekdatum1'];
        $date1_2 = $_GET['vertrekdatum1'];
    }
    if (isset($_GET['vertrekdatum2'])) {
        $date1_2 = $_GET['vertrekdatum2'];
    }
    if (isset($_GET['terugkomstdatum1'])) {
        $date2 = $_GET['terugkomstdatum1'];
        $date2_2 = $_GET['terugkomstdatum1'];
    }
    if (isset($_GET['terugkomstdatum2'])) {
        $date2_2 = $_GET['terugkomstdatum2'];
    }
    if (isset($_GET['minprijs'])) {
        $prijs1 = $_GET['minprijs'];
    }
    if (isset($_GET['maxprijs'])) {
        $prijs2 = $_GET['maxprijs'];
    }

    $resultSet = $conn->prepare("SELECT * FROM reizen WHERE (land LIKE ? OR plaats LIKE ?) AND (DATE(vertrekDatum) BETWEEN ? AND ?) AND (DATE(terugkomstDatum) BETWEEN ? AND ?) AND (preis BETWEEN ? AND ? )");
    $resultSet->execute(['%'.$_GET['land'].'%','%'.$_GET['land'].'%',$_GET['vertrekdatum1'],$_GET['vertrekdatum2'],$_GET['terugkomstdatum1'],$_GET['terugkomstdatum2'],$_GET['minprijs'],$_GET['maxprijs']]);
    if (count($resultSet->fetchAll()) < 1) {
        echo "<h2>Geen resultaten gevonden</h2>";
    }
    $resultSet = $conn->prepare("SELECT * FROM reizen WHERE (land LIKE ? OR plaats LIKE ?) AND (DATE(vertrekDatum) BETWEEN ? AND ?) AND (DATE(terugkomstDatum) BETWEEN ? AND ?) AND (preis BETWEEN ? AND ? )");
    $resultSet->execute(['%'.$_GET['land'].'%','%'.$_GET['land'].'%',$_GET['vertrekdatum1'],$_GET['vertrekdatum2'],$_GET['terugkomstdatum1'],$_GET['terugkomstdatum2'],$_GET['minprijs'],$_GET['maxprijs']]);
    while ($result = $resultSet->fetch()) {
        echo '<div class="advertentie">
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
                    <p>'.$result['beschrijving'].'</p>
                    <a href="reis-pagina.php?id='.$result['id'].'">Meer Informatie</a>

                </div>';
    }
?>  

</div>

<script>
    if (document.querySelector("#rick")) {
        document.querySelector("body").innerHTML = '<iframe id="rickroll" width="840" height="630" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1"></iframe>';
        document.querySelector("#rickroll").requestFullscreen();
    }
</script>
</body>
</html>