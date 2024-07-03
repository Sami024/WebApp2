<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,200;0,400;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Sami.css">
    <link rel="stylesheet" href="css/Senna.css">
</head>
<body>
    <?php
        require_once('php/config.php');
        require_once('php/nav.php');
        
        if($_SESSION['isAdmin'] != 1) {
            header("location: index.php");
        }

        if (isset($_POST['create'])) {
            $prepared = $conn->prepare("INSERT INTO `reizen`
                (
                    `land`,
                    `preis`,
                    `vertrekDatum`,
                    `terugkomstDatum`,
                    `isAdvert`,
                    `plaats`,
                    `beschrijving`,
                    `wc`,
                    `slaapkamers`,
                    `oppervlakte_woning`,
                    `handicap_vriendelijk`
                ) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                    
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
                $handicap
            ]);
            header("Location: admin-panel.php");
        }

    ?>
    <div class="break"></div>
    <form class="" method="post">
        <div class="advertentie edit-advertentie">
            <div class="adBanner">
            </div>
            <div class="titelRow">
                <h3><input type="text" name="land" class="w50 h3-input" id="" class="h3-input" placeholder="Land"> - <input type="text" name="plaats" class="w50 h3-input" id="" placeholder="Plaats"></h3>
                <h3><input type="number" name="prijs" id="" min="50" class="h3-input" style="text-align: right;" placeholder="€ Prijs"></h3>
            </div>
            <div class="titelRow">
            <h3><input type="date" name="vertrekDatum" id="" class="h3-input" placeholder="vertrek datum"></h3>
            <h3><input type="date" name="terugkomstDatum" id="" class="h3-input"></h3>
            </div>
            <p>
                <textarea name="beschrijving" id="" cols="30" rows="10" placeholder="Beschrijving"></textarea>
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
                        <input class="edit-input" type="number" name="wc" id="" max="10" min="0">
                    </td>
                    <td>
                        <input class="edit-input" type="number" name="slaapkamers" id=""  max="10" min="0">
                    </td>
                    <td>
                        <input class="edit-input" type="number" name="oppervlakte" id=""  min="0">
                    </td>
                    <td>
                        <input class="edit-input" type="checkbox" name="handicapvriendelijk" id="">
                    </td>
                    <td>
                        <input class="edit-input" type="checkbox" name="wifi" id="">
                    </td>
                    <td>
                        <input class="edit-input" type="checkbox" name="isAdvert" id="">
                    </td>
                </tr>
                
            </table>
            <div class="submit-row">
                <input type="submit" class="firstSubmit" name="create" value="create">
            </div>
                
        </div>
    </form>
</body>

</html> 