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

    if (isset($_POST['recensie_posten'])) {
        $prepare = $conn->prepare("INSERT INTO recensies(recensie, reis_id, account_id, sterren) values(?,?,?,?)");
        $prepare->execute([$_POST['recensie'], $_GET['id'], $_SESSION['inlogid'], $_POST['sterren']]);
        header("location: index.php");
    }

    $resultset = $conn->prepare("SELECT * FROM reizen WHERE id = ?");
    $resultset->execute([$_GET['id']]);
    $result = $resultset->fetch();


    ?>
    <form action="" method="POST" class="reis-pagina-container">
        <h3>recensie maken voor voor: </h3>
        <?php echo "<p>" . $result['land'] . " - " . $result['plaats'] . "</p>" ?>
        <br>
        <br>
        <h3>recensie: </h3>
        <textarea name="recensie" id="" cols="30" rows="10" maxlength="150"></textarea>
        <h3>aantal sterren (1-5): </h3>
        <input style="color: var(--Black)"  class="admin-button-edit" name="sterren" type="number" min="1" max="5" value="1">
        <br>
        <br>
        <h3>Naam recensie schrijver: </h3>
        <?php echo "<p>" . $_SESSION['username'] . "</p>" ?>
        <br>
        <br>

        <input style="color: var(--Black)" class="admin-button-edit" name="recensie_posten" type="submit" value="recensie">
    </form>
</body>

</html>