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
        //$_SESSION['hiba'] = "Kötelező mezők!";
        //header('location: '.$_SERVER['HTTP_REFERER'] );


        /* - teszt sor
        print "<pre>";
        print_r($_SESSION);
        print_r($_SERVER);
        print_r($_POST);
        print "</pre>";
        
        */
        print json_encode(['uzenet'=>'Kötelező mezők!', 'class'=>'alert alert-danger']);
        return false;
    }
    /**
     * Biztonsági szűrés 
     * sql injekció - [mysqli:]real_escape_string: az '=> \', "=>\"
     * xss támadás - htmlspecialchars (html entities ) < => &lt > => &gt 
     * foreach($tomb as [$index=>]$érték)
     * dinamikus változó létrehozás $$
     */

     //hirlevel 
     $hirlevel = 0;
     foreach($_POST as $index=>$érték)
     {
        $$index = htmlspecialchars($mysql->real_escape_string($érték));
     }
     //jelszavak ellenorzése
     if($jelszo != $jelszo_ujra)
     {
        print json_encode(['uzenet'=>'Jelszavak nem egyeznek meg!', 'class'=>'alert alert-danger']);
        return false;
     }
     //jelszo hash
     $jelszo = hash('sha256',$jelszo.$zaj);

     //sql insert 

     $sql = "INSERT INTO felhasznalok(vezeteknev, keresztnev, email, jelszo, szuletesi_ido, neme, legmagasabb_iskola, hirlevel, leiras) VALUES ('{$vezeteknev}','{$keresztnev}','{$email}','{$jelszo}','{$szuletesi_ido}','{$neme}','{$legmagasabb_iskola}','{$hirlevel}','{$leiras}')";

     if($mysql->query($sql))
     {
        print json_encode(['uzenet'=>'Sikeres regisztracio!', 'class'=>'alert alert-success', 'success'=>true]);
        return false;
     }
     print $mysql->error; 
}


?>