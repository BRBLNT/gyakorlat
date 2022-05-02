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


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
    
      $(document).ready( function () {
        
        $('.datatable').DataTable();
      } );

    </script>

    <style>

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
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
            if(isset($_SESSION['hiba'])):
            ?>
              <div class="alert alert-danger">
                <?=$_SESSION['hiba']?>
              </div>
            <?php
            unset($_SESSION['hiba']);
            endif;
            if(isset($_SESSION['uzenet'])):
              ?>
              <div class="alert alert-success">
                <?=$_SESSION['uzenet']?>
              </div>
            <?php
            unset($_SESSION['uzenet']);
            endif;
            ?>
            <div id="ajax-uzenet"></div>
            <?php
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
<!--repo: https://github.com/BRBLNT/gyakorlat-->
</html>




