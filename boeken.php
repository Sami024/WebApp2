<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Senna.css">
    <link rel="stylesheet" href="css/Sami.css">
</head>
<body>
    <?php
        require_once("php/config.php");
        require_once("php/nav.php");
 
        if (isset($_POST['boeken'])) {
            $prepare = $conn->prepare("INSERT INTO boekingen(account_id, reis_id, betaald) values(?,?,0)");
            $prepare->execute([$_SESSION['inlogid'],$_GET['id']]);
            header("location: index.php");
        }

        $resultset = $conn->prepare("SELECT * FROM reizen WHERE id = ?");
        $resultset->execute([$_GET['id']]);
        $result = $resultset->fetch();
        

    ?>
    <div class="reis-pagina-container">
        <h3>Boeking voor: </h3>
        <?php echo "<p>".$result['land']." - ".$result['plaats']."</p>" ?>
        <br>
        <br>
        <h3>Datums: </h3>
        <?php echo "<p>Vertrekken: ".$result['vertrekDatum']." <br>Terugkomst: ".$result['terugkomstDatum']."</p>" ?>
        <br>
        <br>
        <h3>Naam boeker: </h3>
        <?php echo "<p>".$_SESSION['username']."</p>" ?>
        <br>
        <br>
        <form action="" method="POST">
            <input class="admin-button-edit" name="boeken" type="submit" value="Boeken">
        </form>
    </div>
</body>
</html>