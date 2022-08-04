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
    if (isset($_POST["newsletter"])) {
        $sth = $conn->prepare("INSERT INTO register_newsletter (Mail) VALUES (:email)");
        $sth->bindParam(":email", $_POST['newsletter']);
        $sth->execute();
    }
} catch(PDOException $e) {
}


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The bern website">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monda&family=Poppins:wght@400;500&family=Qwigley&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Document</title>
</head>
<body>
    <main>
        <header>
            <div id="header-menu">
                <div class="logo">
                <span>Bern</span><img src="media/flag.webp" height="160" width="160" alt="petit logo suisse">
                </div>
                <div id="links">
                    <a href="#imgstart">Alpes</a><a href="#imgmiddle">Sports</a><a href=#imgend>Nourritures</a>
                </div>
                <div id="icons">
                    <a aria-label="Bouton contact" href="https://www.amazon.fr/t%C3%A9l%C3%A9phonie-t%C3%A9l%C3%A9phone-portable-smartphone/b?ie=UTF8&node=13910711">
                        <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                            <desc>Bouton contact</desc>
                            <path d="M23.2232 16.2471C23.0767 16.1004 22.9028 15.984 22.7113 15.9046C22.5198 15.8252 22.3145 15.7843 22.1072 15.7843C21.8999 15.7843 21.6946 15.8252 21.5031 15.9046C21.3116 15.984 21.1377 16.1004 20.9912 16.2471L18.4751 18.7631C17.3086 18.4159 15.1318 17.6267 13.7522 16.2471C12.3726 14.8676 11.5834 12.6909 11.2361 11.5245L13.7522 9.00843C13.8989 8.86197 14.0153 8.68802 14.0947 8.49653C14.1742 8.30505 14.215 8.09978 14.215 7.89248C14.215 7.68518 14.1742 7.47991 14.0947 7.28842C14.0153 7.09694 13.8989 6.92299 13.7522 6.77653L7.43822 0.462798C7.29176 0.31609 7.1178 0.199699 6.9263 0.120287C6.73481 0.0408752 6.52953 0 6.32222 0C6.11491 0 5.90964 0.0408752 5.71814 0.120287C5.52665 0.199699 5.35269 0.31609 5.20623 0.462798L0.925342 4.74351C0.325513 5.34331 -0.0122862 6.16725 0.000341815 7.00856C0.0366473 9.25624 0.631741 17.0632 6.78472 23.2159C12.9377 29.3686 20.745 29.9621 22.9943 30H23.0385C23.872 30 24.6596 29.6717 25.2563 29.075L29.5372 24.7943C29.6839 24.6479 29.8003 24.4739 29.8797 24.2824C29.9591 24.0909 30 23.8857 30 23.6784C30 23.4711 29.9591 23.2658 29.8797 23.0743C29.8003 22.8828 29.6839 22.7089 29.5372 22.5624L23.2232 16.2471ZM23.0227 26.8416C21.0528 26.8084 14.3126 26.2796 9.01672 20.9824C3.7035 15.6694 3.18891 8.90583 3.15734 6.97541L6.32222 3.81065L10.4042 7.89248L8.36322 9.93339C8.17769 10.1188 8.04127 10.3475 7.96631 10.5988C7.89135 10.8501 7.8802 11.1162 7.93387 11.3729C7.97175 11.5544 8.89833 15.8588 11.5186 18.479C14.1389 21.0992 18.4435 22.0258 18.625 22.0636C18.8816 22.1188 19.1479 22.1086 19.3995 22.0338C19.6511 21.9591 19.8798 21.8222 20.0646 21.6359L22.1072 19.595L26.1892 23.6768L23.0227 26.8416V26.8416Z" fill=""/>
                        </svg>
                    </a>
                    <a aria-label="Bouton map" href="https://www.google.com/maps/place/Berne,+Suisse/@46.9547658,7.3248302,12z/data=!3m1!4b1!4m5!3m4!1s0x478e39c0d43a1b77:0xcb555ffe0457659a!8m2!3d46.9479739!4d7.4474468?hl=fr">
                        <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                            <desc>Bouton map</desc>
                            <path d="M29.1705 5.17575L20.1705 0.176178C19.9621 0.0603205 19.7323 0 19.4993 0C19.2662 0 19.0364 0.0603205 18.828 0.176178L10.5 4.80412L2.1705 0.176178C1.94176 0.0491846 1.68759 -0.0107308 1.43213 0.00212294C1.17668 0.0149767 0.928429 0.100173 0.710954 0.249619C0.493478 0.399066 0.314001 0.607801 0.189569 0.855998C0.0651365 1.1042 -0.000119025 1.38362 1.62977e-07 1.66772V23.3325C1.62977e-07 23.9641 0.321 24.5408 0.8295 24.8241L9.8295 29.8236C10.0379 29.9395 10.2677 29.9998 10.5007 29.9998C10.7338 29.9998 10.9636 29.9395 11.172 29.8236L19.5 25.1957L27.8295 29.822C28.0576 29.9502 28.3116 30.0109 28.567 29.9984C28.8223 29.9858 29.0705 29.9004 29.2875 29.7503C29.73 29.4453 30 28.9104 30 28.3321V6.66729C30 6.03568 29.679 5.45906 29.1705 5.17575V5.17575ZM12 7.6972L18 4.36415V22.3026L12 25.6357V7.6972ZM3 4.36415L9 7.6972V25.6357L3 22.3026V4.36415ZM27 25.6357L21 22.3026V4.36415L27 7.6972V25.6357Z" fill=""/>
                        </svg>
                    </a>
                </div>
                <div id="flexburger">
                    <div id="burgermenudiv">
                        <svg id="burgersvg" width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line class="line2" x1="1" y1="11" x2="28" y2="11" stroke="black" stroke-width="2" stroke-linecap="round"/>
                            <path class="line2" d="M1 11L7.06218 7.5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                            <path class="line2" d="M1 11L7.06218 14.5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                            <line class="line3" x1="1" y1="21" x2="28" y2="21" stroke="black" stroke-width="2" stroke-linecap="round"/>
                            <line class="line1" x1="1" y1="1" x2="28" y2="1" stroke="black" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <div id="burgermenu">
                            <div id="linksburger">
                                <div id="icons">
                                    <a aria-label="Bouton contact" href="https://www.amazon.fr/t%C3%A9l%C3%A9phonie-t%C3%A9l%C3%A9phone-portable-smartphone/b?ie=UTF8&node=13910711">
                                        <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                            <desc>Bouton contact</desc>
                                            <path d="M23.2232 16.2471C23.0767 16.1004 22.9028 15.984 22.7113 15.9046C22.5198 15.8252 22.3145 15.7843 22.1072 15.7843C21.8999 15.7843 21.6946 15.8252 21.5031 15.9046C21.3116 15.984 21.1377 16.1004 20.9912 16.2471L18.4751 18.7631C17.3086 18.4159 15.1318 17.6267 13.7522 16.2471C12.3726 14.8676 11.5834 12.6909 11.2361 11.5245L13.7522 9.00843C13.8989 8.86197 14.0153 8.68802 14.0947 8.49653C14.1742 8.30505 14.215 8.09978 14.215 7.89248C14.215 7.68518 14.1742 7.47991 14.0947 7.28842C14.0153 7.09694 13.8989 6.92299 13.7522 6.77653L7.43822 0.462798C7.29176 0.31609 7.1178 0.199699 6.9263 0.120287C6.73481 0.0408752 6.52953 0 6.32222 0C6.11491 0 5.90964 0.0408752 5.71814 0.120287C5.52665 0.199699 5.35269 0.31609 5.20623 0.462798L0.925342 4.74351C0.325513 5.34331 -0.0122862 6.16725 0.000341815 7.00856C0.0366473 9.25624 0.631741 17.0632 6.78472 23.2159C12.9377 29.3686 20.745 29.9621 22.9943 30H23.0385C23.872 30 24.6596 29.6717 25.2563 29.075L29.5372 24.7943C29.6839 24.6479 29.8003 24.4739 29.8797 24.2824C29.9591 24.0909 30 23.8857 30 23.6784C30 23.4711 29.9591 23.2658 29.8797 23.0743C29.8003 22.8828 29.6839 22.7089 29.5372 22.5624L23.2232 16.2471ZM23.0227 26.8416C21.0528 26.8084 14.3126 26.2796 9.01672 20.9824C3.7035 15.6694 3.18891 8.90583 3.15734 6.97541L6.32222 3.81065L10.4042 7.89248L8.36322 9.93339C8.17769 10.1188 8.04127 10.3475 7.96631 10.5988C7.89135 10.8501 7.8802 11.1162 7.93387 11.3729C7.97175 11.5544 8.89833 15.8588 11.5186 18.479C14.1389 21.0992 18.4435 22.0258 18.625 22.0636C18.8816 22.1188 19.1479 22.1086 19.3995 22.0338C19.6511 21.9591 19.8798 21.8222 20.0646 21.6359L22.1072 19.595L26.1892 23.6768L23.0227 26.8416V26.8416Z" fill=""/>
                                        </svg>
                                    </a>
                                    <a aria-label="Bouton map" href="https://www.google.com/maps/place/Berne,+Suisse/@46.9547658,7.3248302,12z/data=!3m1!4b1!4m5!3m4!1s0x478e39c0d43a1b77:0xcb555ffe0457659a!8m2!3d46.9479739!4d7.4474468?hl=fr">
                                        <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                            <desc>Bouton map</desc>
                                            <path d="M29.1705 5.17575L20.1705 0.176178C19.9621 0.0603205 19.7323 0 19.4993 0C19.2662 0 19.0364 0.0603205 18.828 0.176178L10.5 4.80412L2.1705 0.176178C1.94176 0.0491846 1.68759 -0.0107308 1.43213 0.00212294C1.17668 0.0149767 0.928429 0.100173 0.710954 0.249619C0.493478 0.399066 0.314001 0.607801 0.189569 0.855998C0.0651365 1.1042 -0.000119025 1.38362 1.62977e-07 1.66772V23.3325C1.62977e-07 23.9641 0.321 24.5408 0.8295 24.8241L9.8295 29.8236C10.0379 29.9395 10.2677 29.9998 10.5007 29.9998C10.7338 29.9998 10.9636 29.9395 11.172 29.8236L19.5 25.1957L27.8295 29.822C28.0576 29.9502 28.3116 30.0109 28.567 29.9984C28.8223 29.9858 29.0705 29.9004 29.2875 29.7503C29.73 29.4453 30 28.9104 30 28.3321V6.66729C30 6.03568 29.679 5.45906 29.1705 5.17575V5.17575ZM12 7.6972L18 4.36415V22.3026L12 25.6357V7.6972ZM3 4.36415L9 7.6972V25.6357L3 22.3026V4.36415ZM27 25.6357L21 22.3026V4.36415L27 7.6972V25.6357Z" fill=""/>
                                        </svg>
                                    </a>
                                </div>
                                <a id="firstlink" href="#imgstart">Alpes</a><a id="secondlink" href="#imgmiddle">Sports</a><a id="thirdlink" href=#imgend>Nourritures</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div id="background-fix">
                <div id="berne-background">
                    <h1>Bienvenue à Berne</h1>
                </div>
            </div>
        </header>
        <div id="container">
            <div class="important-text">
                <p id="text1">
                Depuis 1191, Berne a évolué jusqu’à<br> devenir ce qu’elle est aujourd’hui.</p>
                <p id="text2">
                Beaucoup de touristes se rendent<br> à Berne pour son patrimoine<br> médiéval urbain inscrit à<br> l’UNESCO.</p>
                <div class="buttondiv">
                    <div class="button-content">
                        <a class="see-more" href="#">En savoir plus</a>
                        <a href="#" aria-label="bouton en savoir plus"><span class="btncircle"></span></a>
                    </div>
                </div>
                
            </div>
            <div id="img-div">
                <div class="img-content-1">
                        <div class="shape" id="shape1">
                            <div id="topshape">
                                <h2>Alpes bernoises</h2>
                                <p>À 20 km au nord des Alpes bernoises, Berne est la 5e plus grande ville de Suisse et aussi la ville fédérale du pays.</p>
                            </div>
                            <a class="divbutton" href="#">
                                <div id="bottomshape">
                                    <p>Découvrez les Alpes<br> bernoises</p><span class="btncircle buttonfloat"></span>
                                </div>
                                
                            </a>
                        </div>
                        <div class="img-start-div">
                        <img class="img-show" id="imgstart" src="media/mountain.webp" width="1920" height="1279" alt="image de montagne">
                    </div>
                </div>
                <div class="img-content-2">
                    <div class="shape" id="shape2">
                        <div id="topshape">
                            <h2>Envie de sport?</h2>
                            <p>Vous en avez pour tous les goûts ! Affamé de vélos, nage, randonnées et des sports à sensation forte !</p>

                        </div>
                        <a class="divbutton" href="#">
                            <div id="bottomshape">
                                <p>Découvrez nos meilleures<br> sports</p><span class="btncircle buttonfloat centerbutton"></span>
                            </div>
                        </a>
                    </div>
                    <div class="img-center-div">
                        <img class="img-show" id="imgmiddle" src="media/velo.webp" width="4608" height="3456" alt="image de vélo">
                    </div>
                </div>
                <div class="img-content-3">
                    
                        <div class="shape" id="shape3">
                            <div id="topshape">
                                <h2>Une petite faim?</h2>
                                <p>Découvrez les spécialités locales tel que l’assiette bernoise ou différents chocolats made in Berne</p>
                            </div>
                        <a class="divbutton" href="#">
                            <div id="bottomshape">
                                <p>Découvrez nos spécialités<br> culinaires</p><span class="btncircle buttonfloat"></span>
                            </div>
                            
                        </a>
                        </div>
                        <div class="img-end-div">
                        <img class="img-show" id="imgend" src="media/chocolat.webp" width="4608" height="3072" alt="image de chocolat">
                    </div>
                </div>
            </div>
            <div id="banner">
                <div id="banner-background">
                </div>
                <img src="media/logoberne 1.png" height="168" width="132" alt="logo de berne">
                <div id="banner-content">
                    <h3>Les meilleurs endroits<br> 
                        à visiter !</h3>
                    <div class="buttondiv">
                        <div class="button-content">
                            <a class="see-more" href="#">En savoir plus</a>
                            <a href="#" aria-label="bouton en savoir plus"><span class="btncircle"></span></a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div id="btfbern">
                <div id="bfttop">
                    <h4>#beautifullberne</h4>
                    <p>Visionnez les plus belles photos de<br> Berne en visitant notre galerie!</p>
                </div>
                    <div class="buttondiv mobilebtn">
                        <div class="button-content">
                            <a class="see-more" href="#">En savoir plus</a>
                            <a href="#" aria-label="bouton en savoir plus"><span class="btncircle"></span></a>
                        </div>
                </div>
                <div id="imgbatiment">
            </div>
        </div>
        <footer>
            <div id="footerheader">
                <div class="logo">
                    <span>Bern</span><img src="media/flag.webp" height="160" width="160" alt="petit logo suisse">
                </div>
                <div class="newsletterbutton">
                    <div>
                        <p>S'inscrire à la newsletter</p><span class="btncircle"></span>
                    </div>
                </div>
                <div id="iconlink">
                    <a aria-label="icone" href="#"><svg width="35" height="35" viewBox="0 0 35 35" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.31758 1.45996C4.07272 1.45996 1.45996 4.07271 1.45996 7.31756V27.6823C1.45996 30.9272 4.07272 33.5399 7.31758 33.5399H18.3551V20.9987H15.0388V16.4834H18.3551V12.6258C18.3551 9.59505 20.3145 6.81231 24.8283 6.81231C26.6558 6.81231 28.0072 6.98775 28.0072 6.98775L27.9009 11.2043C27.9009 11.2043 26.5227 11.1912 25.0187 11.1912C23.391 11.1912 23.13 11.9412 23.13 13.1862V16.4834H28.0302L27.8167 20.9987H23.13V33.54H27.6823C30.9272 33.54 33.54 30.9272 33.54 27.6824V7.3176C33.54 4.07274 30.9272 1.45999 27.6823 1.45999L7.31758 1.45996Z" fill=""/>
                        </svg></a>
                    <a aria-label="icone" href="#"><svg width="35" height="35" viewBox="0 0 35 35" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8864 1.55475C12.597 1.476 13.1424 1.4585 17.4999 1.4585C21.8574 1.4585 22.4028 1.47745 24.112 1.55475C25.8212 1.63204 26.9878 1.90475 28.0087 2.29995C29.0776 2.70391 30.0474 3.33537 30.8495 4.15204C31.6662 4.95266 32.2962 5.921 32.6987 6.99141C33.0953 8.01225 33.3666 9.17891 33.4453 10.8852C33.5241 12.5987 33.5416 13.1441 33.5416 17.5002C33.5416 21.8577 33.5226 22.4031 33.4453 24.1137C33.368 25.82 33.0953 26.9866 32.6987 28.0075C32.2962 29.078 31.6651 30.048 30.8495 30.8497C30.0474 31.6664 29.0776 32.2964 28.0087 32.6989C26.9878 33.0956 25.8212 33.3668 24.1149 33.4456C22.4028 33.5243 21.8574 33.5418 17.4999 33.5418C13.1424 33.5418 12.597 33.5229 10.8864 33.4456C9.18013 33.3683 8.01346 33.0956 6.99263 32.6989C5.92209 32.2964 4.95216 31.6653 4.15034 30.8497C3.33422 30.0486 2.70267 29.0792 2.29971 28.0089C1.9045 26.9881 1.63325 25.8214 1.5545 24.1152C1.47575 22.4016 1.45825 21.8562 1.45825 17.5002C1.45825 13.1427 1.47721 12.5972 1.5545 10.8881C1.63179 9.17891 1.9045 8.01225 2.29971 6.99141C2.70326 5.92111 3.3353 4.95166 4.15179 4.15058C4.95248 3.33464 5.92144 2.7031 6.99117 2.29995C8.012 1.90475 9.17867 1.6335 10.8849 1.55475H10.8864ZM23.9822 4.44225C22.2905 4.36495 21.783 4.34891 17.4999 4.34891C13.2168 4.34891 12.7093 4.36495 11.0176 4.44225C9.45283 4.5137 8.60409 4.77475 8.03825 4.99495C7.29013 5.28662 6.75492 5.63225 6.19346 6.1937C5.66123 6.71149 5.25164 7.34182 4.99471 8.0385C4.7745 8.60433 4.51346 9.45308 4.442 11.0179C4.36471 12.7095 4.34867 13.217 4.34867 17.5002C4.34867 21.7833 4.36471 22.2908 4.442 23.9825C4.51346 25.5472 4.7745 26.396 4.99471 26.9618C5.25138 27.6575 5.66117 28.2889 6.19346 28.8066C6.71117 29.3389 7.34263 29.7487 8.03825 30.0054C8.60409 30.2256 9.45283 30.4866 11.0176 30.5581C12.7093 30.6354 13.2153 30.6514 17.4999 30.6514C21.7845 30.6514 22.2905 30.6354 23.9822 30.5581C25.547 30.4866 26.3958 30.2256 26.9616 30.0054C27.7097 29.7137 28.2449 29.3681 28.8064 28.8066C29.3387 28.2889 29.7485 27.6575 30.0051 26.9618C30.2253 26.396 30.4864 25.5472 30.5578 23.9825C30.6351 22.2908 30.6512 21.7833 30.6512 17.5002C30.6512 13.217 30.6351 12.7095 30.5578 11.0179C30.4864 9.45308 30.2253 8.60433 30.0051 8.0385C29.7135 7.29037 29.3678 6.75516 28.8064 6.1937C28.2886 5.66152 27.6582 5.25193 26.9616 4.99495C26.3958 4.77475 25.547 4.5137 23.9822 4.44225V4.44225ZM15.451 22.4454C16.5953 22.9217 17.8694 22.986 19.0559 22.6273C20.2423 22.2685 21.2674 21.509 21.956 20.4784C22.6447 19.4479 22.9542 18.2102 22.8317 16.9768C22.7091 15.7434 22.1622 14.5907 21.2843 13.7158C20.7246 13.1565 20.0479 12.7282 19.3029 12.4618C18.5579 12.1954 17.763 12.0976 16.9756 12.1752C16.1882 12.2529 15.4278 12.5042 14.7492 12.911C14.0706 13.3178 13.4906 13.87 13.051 14.5279C12.6114 15.1857 12.3231 15.9329 12.2069 16.7155C12.0907 17.4982 12.1495 18.2968 12.379 19.054C12.6086 19.8112 13.0031 20.5081 13.5343 21.0945C14.0655 21.681 14.7201 22.1423 15.451 22.4454ZM11.6695 11.6697C12.4352 10.9041 13.3441 10.2967 14.3445 9.88236C15.3449 9.46798 16.4171 9.25471 17.4999 9.25471C18.5827 9.25471 19.6549 9.46798 20.6553 9.88236C21.6557 10.2967 22.5647 10.9041 23.3303 11.6697C24.096 12.4354 24.7034 13.3444 25.1177 14.3448C25.5321 15.3451 25.7454 16.4174 25.7454 17.5002C25.7454 18.583 25.5321 19.6552 25.1177 20.6556C24.7034 21.6559 24.096 22.5649 23.3303 23.3306C21.784 24.8769 19.6867 25.7456 17.4999 25.7456C15.3131 25.7456 13.2158 24.8769 11.6695 23.3306C10.1232 21.7843 9.25446 19.687 9.25446 17.5002C9.25446 15.3133 10.1232 13.2161 11.6695 11.6697V11.6697ZM27.5741 10.4827C27.7638 10.3037 27.9157 10.0884 28.0208 9.84971C28.1258 9.61097 28.1819 9.35358 28.1857 9.09277C28.1895 8.83196 28.141 8.57304 28.0429 8.33134C27.9449 8.08964 27.7993 7.87007 27.6149 7.68564C27.4304 7.5012 27.2109 7.35564 26.9692 7.25758C26.7275 7.15953 26.4685 7.11096 26.2077 7.11476C25.9469 7.11856 25.6895 7.17466 25.4508 7.27972C25.212 7.38478 24.9968 7.53668 24.8178 7.72641C24.4697 8.09541 24.2792 8.58555 24.2866 9.09277C24.294 9.59999 24.4987 10.0844 24.8574 10.4431C25.2161 10.8018 25.7005 11.0065 26.2077 11.0139C26.7149 11.0213 27.2051 10.8308 27.5741 10.4827V10.4827Z" fill=""/>
                        </svg></a>
                    <a aria-label="icone" href="#"><svg width="35" height="35" viewBox="0 0 35 35" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.1933 11.5267C27.4136 11.8748 26.5712 12.1115 25.6662 12.2368C26.613 11.6799 27.2604 10.8654 27.6085 9.79324C26.7035 10.3223 25.7706 10.6774 24.8099 10.8584C23.9605 9.93944 22.8954 9.47996 21.6144 9.47996C20.403 9.47996 19.3692 9.90811 18.5129 10.7644C17.6566 11.6207 17.2285 12.6545 17.2285 13.8659C17.2285 14.2697 17.2633 14.6039 17.3329 14.8684C15.5367 14.7709 13.852 14.3184 12.2786 13.5108C10.7052 12.7033 9.36857 11.6242 8.26861 10.2736C7.86482 10.9698 7.66293 11.7077 7.66293 12.4875C7.66293 14.0748 8.29645 15.2931 9.5635 16.1424C8.90909 16.1285 8.21291 15.9475 7.47496 15.5994V15.6412C7.47496 16.6854 7.82305 17.6148 8.51923 18.4294C9.21541 19.2439 10.0717 19.7486 11.0881 19.9436C10.6844 20.0549 10.3293 20.1106 10.023 20.1106C9.84198 20.1106 9.57047 20.0828 9.20845 20.0271C9.50085 20.9043 10.0195 21.6283 10.7644 22.1992C11.5093 22.77 12.3552 23.0624 13.302 23.0764C11.6869 24.3295 9.86982 24.9561 7.8509 24.9561C7.48888 24.9561 7.14079 24.9352 6.80663 24.8934C8.86732 26.2022 11.109 26.8566 13.5317 26.8566C15.0912 26.8566 16.5532 26.6095 17.9177 26.1152C19.2822 25.6209 20.4518 24.9595 21.4264 24.1311C22.4011 23.3026 23.24 22.3489 23.9431 21.2698C24.6463 20.1907 25.1684 19.0629 25.5095 17.8863C25.8506 16.7098 26.0212 15.5367 26.0212 14.3671C26.0212 14.1165 26.0143 13.9286 26.0003 13.8032C26.8775 13.1767 27.6085 12.4178 28.1933 11.5267ZM33.54 7.47496V27.525C33.54 29.1819 32.9517 30.5986 31.7751 31.7751C30.5986 32.9517 29.1819 33.54 27.525 33.54H7.47496C5.81805 33.54 4.40132 32.9517 3.22478 31.7751C2.04823 30.5986 1.45996 29.1819 1.45996 27.525V7.47496C1.45996 5.81805 2.04823 4.40132 3.22478 3.22478C4.40132 2.04823 5.81805 1.45996 7.47496 1.45996H27.525C29.1819 1.45996 30.5986 2.04823 31.7751 3.22478C32.9517 4.40132 33.54 5.81805 33.54 7.47496Z" fill=""/>
                        </svg>
                        </a>
                </div>
            </div>
            <div id="footerreplace">
                <p>NewsLetter</p>
                <form method="post" novalidate>
                    <input type="email" name="newsletter" class="inputmail" id="inputemail" placeholder="Entrez votre mail">
                    <span class="errormsg"></span>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <div id="footerlinks">
                <div class="separate-bar" id="plusfooter">
                    <p class="linktitle">Plus</p>
                    <a href="#container">Histoire de Berne</a>
                    <a href="#banner">Visites</a>
                    <a href="#btfbern">Galerie photos</a>
                </div>
                <div class="separate-bar" id="menufooter">
                    <p class="linktitle">Menu</p>
                    <a href="#">Activités</a>
                    <a href="#">Infos utiles</a>
                    <a href="#">Environnement</a>
                </div>
                <div class="separate-bar" id="decfooter">
                    <p class="linktitle">Découvertes</p>
                    <a href="#imgstart">Alpes bernoises</a>
                    <a href="#imgmiddle">Sports</a>
                    <a href="#imgend">Specialités culinaires</a>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>