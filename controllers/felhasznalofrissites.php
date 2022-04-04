<?php

if(isset($_POST['vezeteknev']))
{
    require_once('../settings/settings.php');
    $vezeteknev = $_POST['vezeteknev'];

    if(
        empty($_POST['email']) ||
        empty($_POST['szuletesi_ido']) ||
        !isset($_POST['GDPR'])
    )
    {
    
        print json_encode(['uzenet'=>'Kötelező mezők!', 'class'=>'alert alert-danger']);
        return false;
    }
   
     //hirlevel 
     $hirlevel = 0;
     foreach($_POST as $index=>$érték)
     {
        $$index = htmlspecialchars($mysql->real_escape_string($érték));
     }
     //jelszavak ellenorzése

     //jelszó mentes sql
     $sql = "";


     if(!empty($_POST['jelszo']) || !empty($_POST['jelszo_ujra'])) {

        if($jelszo != $jelszo_ujra)
        {
            print json_encode(['uzenet'=>'Jelszavak nem egyeznek meg!', 'class'=>'alert alert-danger']);
            return false;
        }
        //jelszo hash
        $jelszo = hash('sha256',$jelszo.$zaj);

        $sql = "";
     }

        


     //sql update  2 sql szkrip jelszo és jelszó nelkül

     if($mysql->query($sql))
     {
        print json_encode(['uzenet'=>'Sikeres frissités!', 'class'=>'alert alert-success', 'success'=>true]);
        return false;
     }
     print $mysql->error; 
}


?>