<?php
$dbName = $_POST['dbName'];
$dbHost = $_POST['dbHost'];
$dbUsername = $_POST['dbUsername'];
$dbPassword = $_POST['dbPassword'];
$dbEngine = $_POST['dbEngine'];

try {
    $db = new PDO("mysql:host=$dbHost", $dbUsername, $dbPassword);
    $db->exec("CREATE DATABASE `$dbName`;
               CREATE USER '$dbUsername'@'localhost' IDENTIFIED BY '$dbPassword';
               GRANT ALL ON `$dbName`.* TO '$dbUsername'@'localhost';
               FLUSH PRIVILEGES;")
        or die(print_r($db->errorInfo(), true));

} catch (PDOException $e) {
    // ToDo jeżeli baza istniej przejdz dalej
    header('Location: ..\scripts\dbExist.php');
}