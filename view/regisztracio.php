<form action="" method="post">

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
		 	<label for="">GDPR</label>
			<input type="checkbox" class="form-control" name="GDPR" value="1">
	 </div>
	 
	 <div class="form-group">
		 <button type="submit" class="btn btn-primary">Mentés</button>
	 </div>
	 
</form>