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
    <div class="break"></div>
    <?php
        require_once('php/config.php');
        require_once('php/nav.php');
        
        if($_SESSION['isAdmin'] != 1) {
            header("location: index.php");
        }

        if (isset($_POST['update'])) {
            $prepared = $conn->prepare("UPDATE `reizen` SET 
                    `land` = ?,
                    `preis` = ?,
                    `vertrekDatum` = ?,
                    `terugkomstDatum` = ?,
                    `isAdvert` = ?,
                    `plaats` = ?,
                    `beschrijving`= ?,
                    `wc`= ?,
                    `slaapkamers`= ?,
                    `oppervlakte_woning`= ?,
                    `handicap_vriendelijk`= ?
                    WHERE 
                    id = ?");
            if (isset($_POST['isAdvert'])) {
                $isAdvert = 1;
            } else {
                $isAdvert = 0;
            }
            if (isset($_POST['handicapvriendelijk'])) {
                $handicap = 1;
            } else {
                $handicap = 0;
            }

            $prepared->execute([
                $_POST['land'],
                $_POST['prijs'],
                $_POST['vertrekDatum'],
                $_POST['terugkomstDatum'],
                $isAdvert,
                $_POST['plaats'],
                $_POST['beschrijving'],
                $_POST['wc'],
                $_POST['slaapkamers'],
                $_POST['oppervlakte'],
                $handicap,
                $_GET['id']
            ]);
        }

        if (isset($_POST['delete'])) {
            $prepared = $conn->prepare("DELETE FROM reizen WHERE id = ?");
            $prepared->execute([$_GET['id']]);
            header("Location: admin-panel.php");
        }

        $resultset = $conn->prepare("SELECT * FROM reizen WHERE id = ?");
        $resultset->execute([$_GET['id']]);
        $result = $resultset->fetch();

    ?>
    <form class="" method="post">
        <div class="advertentie edit-advertentie">
            <div class="adBanner">
            </div>
            <div class="titelRow">
                <h3><input type="text" name="land" class="w50 h3-input" id="" class="h3-input" <?php echo 'value="'.$result['land'].'"'?> placeholder="Land"> - <input type="text" name="plaats" class="w50 h3-input" id="" <?php echo 'value="'.$result['plaats'].'"'?>></h3>
                <h3><input type="number" name="prijs" id="" min="50" class="h3-input" style="text-align: right;" <?php echo 'value="'.$result['preis'].'"'?>></h3>
            </div>
            <div class="titelRow">
            <h3><input type="date" name="vertrekDatum" id="" class="h3-input" <?php echo 'value="'.$result['vertrekDatum'].'"'?>></h3>
            <h3><input type="date" name="terugkomstDatum" id="" class="h3-input" <?php echo 'value="'.$result['terugkomstDatum'].'"'?>></h3>
            </div>
            <p>
                <textarea name="beschrijving" id="" cols="30" rows="10"><?php echo $result['beschrijving']?></textarea>
            </p>
            <table class="edit-list">
                <tr>
                    <th class="label">wc's</th>
                    <th class="label">Aantal slaapkamers</th>
                    <th class="label">Oppervlakte verblijf</th>
                    <th class="label">Handicap vriendelijk</th>
                    <th class="label">Wifi</th>
                    <th class="label">Is advertentie</th>
                </tr>
                <tr>
                    <td>
                        <input class="edit-input" type="number" name="wc" id="" <?php echo 'value="'.$result['wc'].'"'?> max="10" min="0">
                    </td>
                    <td>
                        <input class="edit-input" type="number" name="slaapkamers" id="" <?php echo 'value="'.$result['slaapkamers'].'"'?> max="10" min="0">
                    </td>
                    <td>
                        <input class="edit-input" type="number" name="oppervlakte" id="" <?php echo 'value="'.$result['oppervlakte_woning'].'"'?> min="0">
                    </td>
                    <td>
                        <input class="edit-input" type="checkbox" name="handicapvriendelijk" id=""<?php if ($result['handicap_vriendelijk']) {echo "checked";} ?>>
                    </td>
                    <td>
                        <input class="edit-input" type="checkbox" name="wifi" id="">
                    </td>
                    <td>
                        <input class="edit-input" type="checkbox" name="isAdvert" id="" <?php if ($result['isAdvert']) {echo "checked";} ?>>
                    </td>
                </tr>
                
            </table>
            <div class="submit-row">
                <input type="submit" class="firstSubmit" name="update" value="update">
                <input type="submit" class="secondSubmit" name="delete" value="delete">
            </div>
                
        </div>
    </form>
</body>

</html> 