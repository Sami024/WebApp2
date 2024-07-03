<?php
$dsn = 'mysql:dbname=webapp2;host=127.0.0.1';
$user = 'root';
$password = '';

session_start();

try {
    $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "<script type='text/javascript'>alert('Foutmelding: ".$e."');</script>";
}
?>