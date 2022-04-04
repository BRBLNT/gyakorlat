<?php if(!isset($_SESSION['felhasznalo'])):?>
	<div class='alert alert-danger'>Nincs jogosultságod</div>
<?php 
return;
endif;

if(isset($_GET['id']) && is_numeric($_GET['id'])) 
{
    //select sql where id = get
    //select num rows
    //feth assoc


    $sql = "SELECT * FROM felhasznalok WHERE id = '{$_GET['id']}'";

    $select = $mysql->query($sql);
    if($mysql->error)
    {
        print $mysql->error;
        return;
    }
	if($select->num_rows)
    {
		$felasznalo = $select->fetch_assoc();
	}
	else
	{
		print '<div class="alert alert-danger">Hibás id!</div>';
		return;
	}
}
else
{
    print '<div class="alert alert-danger">Hibás kérés!</div>';
    return;
}


?>
<div id='uzenet'></div>
<form id="frissitesform">

	
	<input type="hidden" value="<?=$felasznalo['id']?>" name="felhasznalo_id">
	 <div class="form-group">
		 	<label for="">Vezetéknév</label>
			<input type="text" class="form-control" name="vezeteknev" placeholder="Vezetéknév" id="" value="<?=$felasznalo['vezeteknev']?>">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Keresztnév</label>
			<input type="text" class="form-control" name="keresztnev" placeholder="Keresztnév" id="" value="<?=$felasznalo['keresztnev']?>">
	 </div>
	 <div class="form-group">
		 	<label for="">E-mail*</label>
			<input type="email" class="form-control" name="email" placeholder="E-mail" id="" value="<?=$felasznalo['email']?>">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Jelszó*</label>
			<input type="password" class="form-control" name="jelszo" placeholder="Jelszó" id="">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Jelszó újra*</label>
			<input type="password" class="form-control" name="jelszo_ujra" placeholder="Jelszó újra" id="" >
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Születési idő*</label>
			<input type="date" class="form-control" name="szuletesi_ido" placeholder="Születési idő" id="" required value="<?=$felasznalo['szuletesi_ido']?>">
	 </div>
	 <div class="form-group">
		 	<label>Neme</label>
			<input type="radio" class="form-control" name="neme" id="noinput" value="Nő" checked> <label for="noinput">Nő</label>
			<input type="radio" class="form-control" name="neme" id="ferfiinput" value="Férfi" <?=$felasznalo['neme'] == 'Férfi' ? 'checked' : null ?>> <label for="ferfiinput">Férfi</label>
	 </div>
	 <div class="form-group">
		 	<label for="">Legmagasabb iskola</label>
			<select name="legmagasabb_iskola" id="" class="form-control">
				<option value="">--- Választás ---</option>
				<option value="Általános" <?=$felasznalo['legmagasabb_iskola'] == 'Általános' ? 'selected' : null?>>Általános</option>
				<option value="Középfokú" <?=$felasznalo['legmagasabb_iskola'] == 'Középfokú' ? 'selected' : null?>>Középfokú</option>
				<option value="Felsőfokú" <?=$felasznalo['legmagasabb_iskola'] == 'Felsőfokú' ? 'selected' : null?>>Felsőfokú</option>
			</select>
	 </div>
	 <div class="form-group">
	 	<div class="form-check">
			<input type="checkbox" class="form-check-input" name="hirlevel" value="1" id="">
			<label for="" class="form-check-label" <?=$felasznalo['hirlevel'] == '1' ? 'checked' : null ?>>Hírlevél</label>
	 	</div>
	 </div>
	 <div class="form-group">
		 	<label for="">Leírás</label>
			<textarea name="leiras" class="form-control" placeholder="Leírás"><?=$felasznalo['leiras']?></textarea>
	 </div>
	 <div class="form-group">
		 	<label for="">GDPR*</label>
			<input type="checkbox" class="form-control" name="GDPR" value="1">
	 </div>
	 
	 <div class="form-group">
		 <button type="submit" class="btn btn-primary">Mentés</button>
	 </div>
	 
</form>
<!--Asszinkron működés-->
<script>
	$(function(){
		$('#frissitesform').submit(function(event){
			$.ajax({
				'url': 'controllers/felhasznalofrissites.php',
				'method': 'post',
				'dataType': 'JSON',
        		'data': $('#frissitesform').serialize()
			}).done(function(adat){
				console.log(adat);
				$('#uzenet').removeClass();
				$('#uzenet').text(adat.uzenet);
				$('#uzenet').addClass(adat.class);

				if(adat.hasOwnProperty('success'))
				{
					
				}
			})
			event.preventDefault();
		});
	});
</script>