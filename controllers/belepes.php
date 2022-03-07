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
    }
?>