<?php
    $sql = "SELECT * FROM galeriak";
    $query = $mysql->query($sql);
?>

<div class="card">
    <div class="card-header">Galéria hozzáadása</div>
    <div class="card-header">
        <form id="galeriacreate">
            <div class="form-group">
                <label for="">Galéria neve</label>
                <input type="text" name="galeria_neve" class="form-control" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" value="1" name="publikus" class="form-check-input" id="publikus_galeria">
                    <label for="publikus_galeria" class="form-check-label">Publikus</label>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Galéria létrehozása</button>
            </div>
        </form>
    </div>
    <div class="card-header">
        <h3>Kepek</h3>
        <form action="galeria_kepek_up">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Galéria kiválasztása</label>
                    <select name="galeria_id" class="form_control" required>
                        <option value="">--- Galéria választása ---</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">   
                    <label for="">Képek feltöltése</label>
                    <input type="file" name="galeria_kep[]" multiple required class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" value="1" name="publikus" class="form-check-input" id="publikus_kepek">
                        <label for="publikus_kepek" class="form-check-label">Publikus</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-success w-100 btn-lg">Kepek feltoltese</button>
                </div>
            </div>
        </div>
        </form>

</div>

    </div>




<script>
    $(function(){
        $('#galeriacreate').on('submit', function(e){
            $.ajax({
				url: 'controllers/galeriacreate.php',
				method: 'post',
				dataType: 'JSON',
        		data: $('#galeriacreate').serialize()
			}).done(function(adat){
				console.log(adat);
				$('#ajax-uzenet').removeClass();
				$('#ajax-uzenet').append(adat.uzenet);
				$('#ajax-uzenet').addClass(adat.class);

				if(adat.hasOwnProperty('success'))
				{
					$('#galeriacreate').remove();
				}
			})
            e.preventDefault();
        });
        $('#galeria_kepek_up').submit(function(event){
			var thisform = this;
			$.ajax({
				'url': 'controllers/galeriacreate.php',
				'method': 'post',
				'dataType': 'JSON',
				contentType: false, 
				processData: false,
        		//'data': $('#regisztraciosform').serialize()
				data: new FormData(thisform)
			}).done(function(adat){
				console.log(adat);
                $('#ajax-uzenet').removeClass();
				$('#ajax-uzenet').append(adat.uzenet);
				$('#ajax-uzenet').addClass(adat.class);

				if(adat.hasOwnProperty('success'))
				{
					$('#galeria_kepek_up').remove();
				}
			})
			event.preventDefault();
		});
    });
</script>
