<?php

// CREATE USER 'admin'@'localhost' IDENTIFIED BY 'perms!pass95';
//
//GRANT ALL PRIVILEGES ON permis.* TO 'admin'@'localhost';
//
//FLUSH PRIVILEGES;

session_start();


require '/var/www/html/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("/var/www/html/admin");
$dotenv->load();

define('SERVER', $_ENV['HOST']);
define('DATABASE', $_ENV['BDD']);
define('USERNAME', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWD']);

$conn = "";

$password = htmlspecialchars($_POST['pass']);
$id = htmlspecialchars($_POST['id']);
try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE, USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_AUTOCOMMIT,FALSE);

    $sth = $conn->prepare(" SELECT username, password FROM admins");
    $sth->execute();
    $credentials = $sth->fetchAll();
} catch(PDOException $e) {
    echo "Connection failed: "
        . $e->getMessage();
}

if (isset($password) and isset($id)){
    foreach( $credentials as $v) {
    if (($password == $v['password']) and ($id == $v['username'])){
        $_SESSION['id'] = $v['username'];
        echo "ok";
    }
}
}

?>