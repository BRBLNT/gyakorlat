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
     $sql = "UPDATE felhasznalok SET vezeteknev = '{$vezeteknev}', keresztnev ='{$keresztnev}', email = '{$email}', szuletesi_ido = '{$szuletesi_ido}', neme = '{$neme}', legmagasabb_iskola = '{$legmagasabb_iskola}', hirlevel = '{$hirlevel}', leiras = '{$leiras}' WHERE id = '{$felhasznalo_id}'";


     if(!empty($jelszo) || !empty($jelszo_ujra)) {

        if($jelszo != $jelszo_ujra)
        {
            print json_encode(['uzenet'=>'Jelszavak nem egyeznek meg!', 'class'=>'alert alert-danger']);
            return false;
        }
        //jelszo hash
        $jelszo = hash('sha256',$jelszo.$zaj);

        $sql = "UPDATE felhasznalok SET vezeteknev = '{$vezeteknev}', keresztnev ='{$keresztnev}', email = '{$email}', jelszo = '{$jelszo}', szuletesi_ido = '{$szuletesi_ido}', neme = '{$neme}', legmagasabb_iskola = '{$legmagasabb_iskola}', hirlevel = '{$hirlevel}', leiras = '{$leiras}' WHERE id = '{$felhasznalo_id}'";
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