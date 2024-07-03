<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<script>
        open("crash.php");
    </script>
    <img src="assets/images/noorwegenbg.jpg" alt="">
    <img src="assets/images/italiebg.jpg" alt="">
    <?php 
        require_once("php/nav.php");
        for ($i = 0; $i < 10 ; $i++) {
            require("index.php");
        }
    ?>
    
</body>
</html>