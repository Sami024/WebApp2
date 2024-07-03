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
    require_once('php/config.php');
    require_once('php/nav.php');

    if (isset($_POST['create'])) {
        $prepared = $conn->prepare("INSERT INTO contact(email,onderwerp,text) VALUES(?,?,?)");
        $prepared->execute([$_POST['email'], $_POST['onderwerp'], $_POST['text']]); 
        header("location: feedback-contact.php");
    }
    ?>


    <div class="contact-bg-img">

    </div>
    <div class="contact-container">

        <form action="" method="post" id="contactform">
            <h2 id="contact-text-h2">E-mail</h2>
            <input type="email" name="email" id="" required>
            <h2 id="contact-text-h2">Onderwerp</h2>
            <input type="text" name="onderwerp" id="">
            <h2 id="contact-text-h2">Text</h2>
            <textarea type="text" name="text" id="" cols="30" rows="10"></textarea>
            
            <h2></h2>
            <input type="submit" name="create" value="create" style="margin-bottom: 10%">
        </form>
    </div>
</body>

</html>