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

if (isset($_POST['pass']) and isset($_POST['id'])){
    foreach( $credentials as $v) {
    if (($_POST['pass'] == $v['password']) and ($_POST['id'] == $v['username'])){
        $_SESSION['id'] = $v['username'];
        header('Location: /admin');
    }
}
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Login</title>
</head>
<body>
    <header>
        <h1>AdminPanel</h1>
    </header>
        <div class="container">

            <div class="formdiv">
                <form method="post" novalidate>
                <label>
                    Identifiant
                    <input type="text" name="id" id="id">
                </label>
                <label>
                    Mot de passe
                    <input type="password" name="pass" id="pass">
                </label>
                    <button type="submit" name="submit">Log in</button>
                </form>
            </div>

        </div>
</body>
</html>