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
?>