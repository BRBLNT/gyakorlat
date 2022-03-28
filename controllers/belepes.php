<?php
    if(isset($_POST['email']))
    {
        require_once('../settings/settings.php');
        //kotelezo
        if
        (
            empty($_POST['jelszo']) ||
            empty($_POST['email']) 
        )
        {
            $_SESSION['hiba'] = "Kötelező mezők!";
            header('location: '.$_SERVER['HTTP_REFERER'] );

            return false;
        }

        //sql injekció védelem
        foreach($_POST as $index=>$érték)
        {
            $$index = $mysql->real_escape_string($érték);

        }

        //jelszo.hash
        $jelszo = hash('sha256',$jelszo.$zaj);

        $sql = "SELECT * FROM felhasznalok WHERE email = '{$email}' AND jelszo = '{$jelszo}' ";

        $select = $mysql->query($sql);
        if($mysql->error)
        {
            print $mysql->error;
            return;
        }

        //vizsgáljuk van-e találata a selectnek num_rows tagváltozó
        if($select->num_rows)
        {
            $_SESSION['felhasznalo'] = $select->fetch_assoc();


            //emlekezzram funkcio
            if(isset($_POST['emlekezzram']))
            {
                $rememeber_token = hash('sha256',uniqid());

                $sql = "UPDATE felhasznalok SET remeber_token = {$rememeber_token} WHERE id = {$_SESSION['felhasznalo']['id']}";

                if($mysql->query($sql))
                {
                    //cookie süti létrehozása
                    //setcookie('suti neve','suti tartalma','lejarati ido', 'eleresi utvonal');
                }
            }
            //print "<pre>";
            //print_r($_SESSION['felhasznalo']);
            //print "</pre>";
            $_SESSION['uzenet'] = "Sikeres belépés!";
            header('location: /gyakorlat ');
            return true;
        }
        else
        {
            //biztonság 
            //$_SEsSION['hibasbelepescount']++;
            $_SESSION['hiba'] = "Sikertelen belépés!";
            header('location: '.$_SERVER['HTTP_REFERER'] );
            return false;
        }
    }
?>