<?php

require '/var/www/html/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/admin/");
$dotenv->load();
define('SERVER', $_ENV['HOST']);
define('DATABASE', $_ENV['BDD']);
define('USERNAME', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWD']);

$conn = "";
if (isset($_POST['limit'])){
    $a = $_POST['limit'];
}else{
    $a=0;
}

try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
    $sth = $conn->prepare("SELECT * FROM register_newsletter ORDER BY mail LIMIT 10 OFFSET :limit ");
    $sth -> bindParam(":limit",$a, PDO::PARAM_INT);
    $sth->execute();
    $emails = $sth->fetchALl();

    echo json_encode($emails);


} catch(PDOException $e) {
    echo "Connection failed: "
        . $e->getMessage();
}