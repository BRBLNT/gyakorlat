<?php if(isset($_SESSION['felhasznalo'])):?>
	<div class='alert alert-info'>Már belépett</div>
<?php 
return;
endif;
?>
<div id='uzenet'></div>
<form id="regisztraciosform">

	

	<!--
		 action="controllers/regisztracio.php" method="post" id miatt nem szükséges
	-->

	 
	<!-- // if(isset($_SESSION['hiba'])): //blokkositas : - os   /*  echo $_SESSION['hiba'] print $_SESSION['hiba'] */

		<div class='alert alert-danger'>
			
			=$_SESSION['hiba']
		</div> 
	-->
	

	<!-- 
		Vezetéknév - text
		Keresztnév - text
		E-mail - email
		Jelszó - Jelszó újra - password
		Születési idő - date
		Neme - radio
		Legmagasabb iskola - select
		Hírlevél - checkbox
		Leírás - textarea
		GDPR - checkbox
		Mentés - button
	 -->

	 <div class="form-group">
		 	<label for="">Vezetéknév</label>
			<input type="text" class="form-control" name="vezeteknev" placeholder="Vezetéknév" id="">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Keresztnév</label>
			<input type="text" class="form-control" name="keresztnev" placeholder="Keresztnév" id="">
	 </div>
	 <div class="form-group">
		 	<label for="">E-mail*</label>
			<input type="email" class="form-control" name="email" placeholder="E-mail" id="">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Jelszó*</label>
			<input type="password" class="form-control" name="jelszo" placeholder="Jelszó" id="">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Jelszó újra*</label>
			<input type="password" class="form-control" name="jelszo_ujra" placeholder="Jelszó újra" id="">
	 </div>
	 
	 <div class="form-group">
		 	<label for="">Születési idő*</label>
			<input type="date" class="form-control" name="szuletesi_ido" placeholder="Születési idő" id="" required>
	 </div>
	 <div class="form-group">
		 	<label>Neme</label>
			<input type="radio" class="form-control" name="neme" id="noinput" value="Nő" checked> <label for="noinput">Nő</label>
			<input type="radio" class="form-control" name="neme" id="ferfiinput" value="Férfi"> <label for="ferfiinput">Férfi</label>
	 </div>
	 <div class="form-group">
		 	<label for="">Legmagasabb iskola</label>
			<select name="legmagasabb_iskola" id="" class="form-control">
				<option value="">--- Választás ---</option>
				<option value="Általános">Általános</option>
				<option value="Középfokú">Középfokú</option>
				<option value="Felsőfokú">Felsőfokú</option>
			</select>
	 </div>
	 <div class="form-group">
	 	<div class="form-check">
			<input type="checkbox" class="form-check-input" name="hirlevel" value="1" id="">
			<label for="" class="form-check-label">Hírlevél</label>
	 	</div>
	 </div>
	 <div class="form-group">
		 	<label for="">Leírás</label>
			<textarea name="leiras" class="form-control" placeholder="Leírás"></textarea>
	 </div>
	 <div class="form-group">
		 	<label for="">GDPR*</label>
			<input type="checkbox" class="form-control" name="GDPR" value="1">
	 </div>

	 <div class="input-group mb-3">
  	 <div class="input-group-prepend">
    	<span class="input-group-text" id="inputGroupFileAddon01">Profilkép</span>
  	 </div>
  		<div class="custom-file">
    		<input name="avatar" type="file" accept="image/*" onchange="loadFile(event)" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    		<label class="custom-file-label" for="inputGroupFile01">Kép kiválasztása</label>
  		</div>
	</div>

	<img id="output" class="img-fluid d-sm-flex">
	
	<br>
	 <div class="form-group">
		 <button type="submit" class="btn btn-primary">Mentés</button>
	 </div>
	 
</form>
<!--Asszinkron működés-->
<script>
	$(function(){
		$('#regisztraciosform').submit(function(event){
			var thisform = this;
			$.ajax({
				'url': 'controllers/regisztracio.php',
				'method': 'post',
				'dataType': 'JSON',
				contentType: false, 
				processData: false,
        		//'data': $('#regisztraciosform').serialize()
				data: new FormData(thisform)
			}).done(function(adat){
				console.log(adat);
				$('#uzenet').removeClass();
				$('#uzenet').text(adat.uzenet);
				$('#uzenet').addClass(adat.class);

				if(adat.hasOwnProperty('success'))
				{
					$('#regisztraciosform').remove();
				}
			})
			event.preventDefault();
		});
	});
</script>
<script>
	var loadFile = function(event) {
    	var output = document.getElementById('output');
    	output.src = URL.createObjectURL(event.target.files[0]);
    	output.onload = function() {
      		URL.revokeObjectURL(output.src) 
    	}
  	};
</script>