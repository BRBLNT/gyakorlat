<?php if(!isset($_SESSION['felhasznalo'])):?>
	<div class='alert alert-danger'>Jogosulatlan hozzáférés</div>
<?php 
return;
endif;

    //felhasznaló törlése
    if(
        isset($_GET['torles']) &&
        is_numeric($_GET['torles'])
        
        )
    {

        $sql = "DELETE FROM felhasznalok WHERE id='{$_GET['torles']}'";
        $mysql->query($sql);
    }

    $sql = "SELECT * FROM felhasznalok";
    $select = $mysql->query($sql);
?>
<div class="card mt-3">
    <div class="card-header">Felhasznalok</div>
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Email</th>
                <th>Szül idő</th>
                <th>Neme</th>
                <th>Iskola</th>
                <th>Hírlevél</th>
                <th>Leírás</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>

            <?php while($adatok = $select->fetch_assoc()):   ?>
            <tr>
                <td> <?=$adatok['id']?> </td>
                <td> <?=$adatok['vezeteknev']?> <?=$adatok['keresztnev']?> </td>
                <td> <?=$adatok['email']?> </td>
                <td> <?=$adatok['szuletesi_ido']?> </td>
                <td> <?=$adatok['neme']?> </td>
                <td> <?=$adatok['legmagasabb_iskola']?> </td>
                <td> <?=$adatok['hirlevel'] ? "igen" : "nem"?> </td>
                <td> <?=$adatok['leiras']?> </td>
                <td>
                    <a href="#" class="btn btn-primary w-100 mb-2">Frissités</a>
                    <a href="?oldal=felhasznalolista&torles=<?=$adatok['id']?>" 
                    
                    onclick="return confirm('Biztosan törli a felhasználót: <?=$adatok['vezeteknev']?> <?=$adatok['keresztnev']?>')"
                    
                    class="btn btn-danger w-100">Törlés</a>
                </th>
            </tr>
            <?php endwhile?>
        </tbody>
    </table>
    </div>
</div>