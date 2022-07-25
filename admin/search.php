<?php

require '/var/www/html/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/admin/");
$dotenv->load();
define('SERVER', $_ENV['HOST']);
define('DATABASE', $_ENV['BDD']);
define('USERNAME', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWD']);

$conn = "";
$entrie = $_POST["entries"]."%";

try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
    $sth = $conn->prepare("SELECT DISTINCT * FROM register_newsletter WHERE mail LIKE :research ORDER BY mail");
    $sth -> bindParam(":research",$entrie);
    $sth->execute();
    $emails = $sth->fetchALl(PDO::FETCH_ASSOC);
    echo json_encode($emails);

} catch(PDOException $e) {
    echo "Connection failed: "
        . $e->getMessage();
}