<?php 
    session_start();
    $host = 'localhost';
    $user = 'php2022';
    $pass = 'sXVBGOdPUQE5QigL';
    $db   = 'php2022';

    //mysql kapcsolat hívás (obj)

    $mysql = new mysqli($host, $user, $pass, $db);
    // nincs szerepe mivel objektum -  or die('SQL szerver hiba');

    //jelszo só, zaj
    $zaj = 'jimmyakiraly';
    $session_time = 60*60*24*10;

    if(isset($_GET['kilepes']))
    {
        unset($_SESSION['felhasznalo']);
        setcookie('remember',null,time()-10,'/');
        unset($_COOKIE['remember']);
    }

    //cookie frissitése
    if(isset($_COOKIE['remember']) && isset($_SESSION['felhasznalo']))
    {
        setcookie('remember', $_COOKIE['remember'], time()+$session_time, '/');
    }
    //user validálás
    if(
        isset($_COOKIE['remember']) && 
        !empty($_COOKIE['remember']) && 
        !isset($_SESSION['felhasznalo']))
    {
        //sql injekció elleni védelem
        $remember = $mysql->real_escape_string($_COOKIE['remember']);
        $sql = "SELECT * FROM felhasznalok WHERE remember_token = '{$remember}'";
        if($select = $mysql->query($sql))
        {
            if($select->num_rows)
            {
                $_SESSION['felhasznalo'] = $select->fetch_assoc();
            }
        }
        print $mysql->error;
    }

?>