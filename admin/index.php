<?php
session_start();
    if (!isset($_SESSION['id'])){
        header("Location: /login");
        exit;
    }

?>




<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="script.js" defer></script>
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <main>
            <div class="confirm-flex">
                <div class="confirm-background">
                    <div class="confirm">
                        <p>Êtes vous sûr de vouloir faire ça ?</p>
                        <div class="button-confirm">
                            <button type="button" class="yes">Oui</button>
                            <button type="button" class="no">Non</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content1">
                <div id="top">
                    <p>User database</p>
                    <div id="top2">
                        <input type="text" class="search" placeholder="search">
                        <a class="export" href="csv.php">Export CSV</a>
                        <a href="/admin/logout.php"><svg id="logout" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 5.83301H43.75C45.2971 5.83301 46.7808 6.44759 47.8748 7.54155C48.9688 8.63551 49.5834 10.1192 49.5834 11.6663V17.4997H43.75V11.6663H17.5V58.333H43.75V52.4997H49.5834V58.333C49.5834 59.8801 48.9688 61.3638 47.8748 62.4578C46.7808 63.5518 45.2971 64.1663 43.75 64.1663H17.5C15.9529 64.1663 14.4692 63.5518 13.3752 62.4578C12.2813 61.3638 11.6667 59.8801 11.6667 58.333V11.6663C11.6667 10.1192 12.2813 8.63551 13.3752 7.54155C14.4692 6.44759 15.9529 5.83301 17.5 5.83301Z" fill="black"/>
                                <path d="M46.9292 45.4712L51.0417 49.5837L65.625 35.0003L51.0417 20.417L46.9292 24.5295L54.4542 32.0837H26.25V37.917H54.4542L46.9292 45.4712Z" fill="black"/>
                        </svg>
                        </a>
                    </div>
                </div>
            <div id="content">
                    <table class="customTable">
                        <thead>
                        <tr>
                            <th>Adresse email : </th>
                            <th>Date d'inscription : </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                <div class="voir_plus-flex">
                <button type="button" class="voir_plus">Voir plus</button>
                </div>
                <template id="productrow">
                        <tr>
                            <td class="emailtd"></td>
                            <td></td>
                            <td><div class="in-td"><img src="/media/bi_trash-fill.png" alt="delete" height="40" width="40" /></div></td>
                        </tr>
                    </template>
            </div>
        </main>

    </body>
</html>
