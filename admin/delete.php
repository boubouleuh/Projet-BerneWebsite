<?php
    require '/var/www/html/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/admin/");
    $dotenv->load();
    define('SERVER', $_ENV['HOST']);
    define('DATABASE', $_ENV['BDD']);
    define('USERNAME', $_ENV['USER']);
    define('PASSWORD', $_ENV['PASSWD']);

    $conn = "";
    $delete = htmlspecialchars($_POST["delete"]);
    echo $delete;
try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);

    $sth = $conn->prepare("DELETE FROM register_newsletter WHERE ID=:id");
    $sth -> bindParam(":id",$delete, PDO::PARAM_INT);
    $sth->execute();
} catch(PDOException $e) {
    echo "Connection failed: "
        . $e->getMessage();
}
