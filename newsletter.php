<?php

require '/var/www/html/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/admin/");
$dotenv->load();
define('SERVER', $_ENV['HOST']);
define('DATABASE', $_ENV['BDD']);
define('USERNAME', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWD']);

$conn = "";

$email = htmlspecialchars($_POST['newsletter']);
$pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/";
try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    if (isset($email) && preg_match($pattern, $email)) {
        $sth = $conn->prepare("INSERT INTO register_newsletter (Mail) VALUES (:email)");
        $sth->bindParam(":email", $email);
        $sth->execute();
    }
} catch(PDOException $e) {
}


?>