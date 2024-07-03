<?php
global$conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/Sami.css">
    <link rel="stylesheet" href="css/Senna.css">
</head>
<body>
    <script src="js/main.js"></script>
    <?php 
        require('php/config.php');
        require_once('php/nav.php');
        if (isset($_POST['reset'])) {
            if (isset($_SESSION['inlogid'])) {
                $prepare = $conn->prepare("UPDATE accounts SET password = ? WHERE id = ?");
                $prepare->execute([$_POST['password'],$_SESSION['inlogid']]);
                header("location: mijn-reizen.php");
            }
        }
    ?>
    <form action="" method="post" id="loginForm">
        <h2>Wachtwoord</h2>
        <input type="password" name="password" id="password" required>
        <h2>Herhaal wachtwoord</h2>
        <input type="password" name="password2" id="password2" required>
        <input type="submit" name="reset" value="Reset wachtwoord" onclick="return resetPassword()">
    </form>
</body>
</html>