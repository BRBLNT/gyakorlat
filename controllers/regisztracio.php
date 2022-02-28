<?php

if(isset($_POST['vezeteknev']))
{
    require_once('../settings/settings.php');
    $vezeteknev = $_POST['vezeteknev'];

    if(
        empty($_POST['email']) ||
        empty($_POST['jelszo']) ||
        empty($_POST['jelszo_ujra']) ||
        empty($_POST['szuletesi_ido']) ||
        !isset($_POST['GDPR'])
    )
    {
        $_SESSION['hiba'] = "Kötelező mezők!";
        header('location: '.$_SERVER['HTTP_REFERER'] );


        /* - teszt sor
        print "<pre>";
        print_r($_SESSION);
        print_r($_SERVER);
        print_r($_POST);
        print "</pre>";
        return false;
        */
    }
}


?>