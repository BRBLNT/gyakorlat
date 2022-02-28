<?php require_once('settings/settings.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <script src="js/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    
    <main>
        <div class="container">
            <?php 
    
            //include (hiba esetén warning)
            //include_once

            //require (fatal error / parse error)
            //require_once
            include('elements/menu.php');
            /**
             * Tömbök 
             * 
             * Szuperglobális tömbök
             * 
             * $_GET, $_POST, $_COOKIE, $_SESSION, $_SERVER, $_FILES
             * 
             * $_GET['index']
             * $tomb[5]
             * 
             * $tomb = array{};
             * $tomb = [];
             * 
             * isset - boolean
             * 
             */
               

            if(isset($_GET['oldal']))
            {
                //forrás állomány létezik-e
                //print_r($_GET);
                //konketenáció = .

                $url = 'view/'.$_GET['oldal'].'.php';
                if(file_exists($url))
                {
                    include($url);
                }
                else 
                {
                    include('view/error/404.php');
                }
            }
            else
            {
                include('view/fooldal.php');
            }

            

            ?>
        </div>
    </main>
</body>
</html>