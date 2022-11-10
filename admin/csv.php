<?php

require '/var/www/html/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/admin/");
$dotenv->load();
define('SERVER', $_ENV['HOST']);
define('DATABASE', $_ENV['BDD']);
define('USERNAME', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWD']);

$conn = "";
try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);
    $sth = $conn->prepare("SELECT * FROM register_newsletter");
    $sth->execute();
    $emails = $sth->fetchALl(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
}

//Ouvrir un fichier en mode écriture ('w')
$fp = fopen('php://output', 'w');

//Boucle à travers le pointeur de fichier et une ligne
foreach ( $emails as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="filename.csv"');
exit();