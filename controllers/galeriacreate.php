<?php
    //session_start();
    //(isset($_SESSION['felhasznalo']))
    {
        require_once('../settings/settings.php');

        if(isset($_POST['galeria_neve']))
        {
            if(empty($_POST['galeria_neve']))
            {
                return print json_encode(['uzenet'=>'Kötelező a galéria neve', 'class'=>'alert alert-danger']);
            }
    
            $publikus_galeria = 0;
            foreach($_POST as $kulcs=>$ertek)
            {
                $$kulcs = htmlspecialchars($mysql->real_escape_string($ertek));
            }

            $sql = "INSERT INTO galeriak(felhasznalo_id, galeria_neve, publikus) VALUES ('{$_SESSION['felhasznalo']['id']}', '{$galeria_neve}', '{$publikus_galeria}')";

            if($mysql->query($sql))
            {
                return print json_encode(['uzenet'=>'Sikeres létrehozás', 'class'=>'alert alert-success', 'success'=>true, 'galeria_neve'=>$galeria_neve, 'galeria_id'=>$mysql->insert_id]);
            } else {
                print $mysql->error;
            }
        }
    }
//képfeltöltés
    if (isset($_POST['galeria_id']))
    {
        print '<pre>';
            print_r($_FILES);
        print '</pre>';
    }
?>