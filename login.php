<?php
global$conn;
?>
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
    <link rel="stylesheet" href="css/Senna.css">
</head>

<body>
    <?php
    require_once('php/config.php');
    require_once('php/nav.php');

    $errorMessage = "";

    if (isset($_POST['login'])) {
        $resultSet = $conn->prepare("SELECT * FROM accounts WHERE email = ?");
        $resultSet->execute([$_POST['email']]);
        if ($result = $resultSet->fetch()) {
            if ($_POST['password'] == $result['password']) {
                $_SESSION['inlogid'] = $result['id'];
                $_SESSION['isAdmin'] = $result['isadmin'];
                $_SESSION['username'] = explode('@',$result['email'])[0];
                header("Location: index.php");
            } else {
                $errorMessage = "Verkeer wachtwoord";
            }
        } else {
            $errorMessage = "Account niet gevonden";
        }
        
    }
    ?>
    <form action="" method="post" id="loginForm">
        <h2>E-mail</h2>
        <input type="text" name="email" id="" required>
        <h2>Password</h2>
        <input type="password" name="password" id="" required>
        <h2></h2>
        <input type="submit" name="login" value="login">
        <?php echo "<h3 id='errorLogin'>".$errorMessage."</h3>"?>
        <a href="make-account.php">Maak account</a>
    </form>
</body style="">
    
</html>