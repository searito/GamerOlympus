<?php  
	require('../section/heading.php');
	require('menu.php');
	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();

	$model = new CRUD;
	$model->select = '*';
	$model->from = 'consoles';
	$model->Read();
	$rows = $model->rows;
	
	if (isset($_POST['create'])) {
		$archivo = $_FILES['flsimagen']['tmp_name'];
		$destino = "../img/Games/". $_FILES['flsimagen']['name'];
		move_uploaded_file($archivo, $destino);

		$name = htmlspecialchars($_POST['name']);
		$development = htmlspecialchars($_POST['development']);
		$year = htmlspecialchars($_POST['year']);
		$genre = htmlspecialchars($_POST['genre']);
		$esrb = htmlspecialchars($_POST['esrb']);
		$price = htmlspecialchars($_POST['price']);
		$stock = htmlspecialchars($_POST['stock']);
		$id_console = htmlspecialchars($_POST['console']);
		$img = $destino;

		if (strlen($name)>60 || strlen($development)>60 || strlen($year)>4 || strlen($genre)>60 || strlen($esrb)>60 || strlen($stock)>3) {
			$mensaje = "";
			echo "<script>alert('Error');</script>";
		}else{
			$model = new CRUD;
			$model->insertInto = 'games';
			$model->insertColumns = 'name, development, year, genre, esrb, img, price, stock, id_console';
			$model->insertValues = "'$name','$development', '$year', '$genre', '$esrb', '$img', '$price', '$stock', '$id_console'";
			$model->Create();
			$mensaje = $model->mensaje;

			echo "<script>alert('¡Registro Almacenado Éxitosamente!'); window.location=('manage-games.php');</script>";
		}
	}

?>

	<h3 class="text-primary"><p>¡Agrega Un Nuevo Juego!</p></h3>

	<div class="jumbotron">
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" role="form">

				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nombre: </label><code>(*)</code>
						<input type="text" name="name" class="form-control" id="foconombre" value="Donkey Kong Country" required>
					</div>

					<div class="form-group">
						<label for="name">Casa Desarrolladora: </label><code>(*)</code>
						<input type="text" name="development" class="form-control" id="focodev" value="Rare Ware" required>
					</div>

					<div class="form-group">
						<label for="name">Año </label><code>(*)</code>
						<input type="text" name="year" class="form-control" id="focoyear" value="1993" required>
					</div>
				</div>

				<div class="col-md-1">
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Género: </label><code>(*)</code>
						<input type="text" name="genre" class="form-control" id="focogen" value="Plataforma" required>
					</div>

					<div class="form-group">
						<label for="name">ESRB: </label><code>(*)</code>
						<input type="text" name="esrb" class="form-control" id="focoesrb" value="KA" required>
					</div>

					<div class="form-group">
						<label for="name">Precio Diario: </label><code>(*)</code>
						<input type="text" name="price" class="form-control" id="focoprice" value="10.00" required>
					</div>
				</div>

				<div class="col-md-1">
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Unidades: </label><code>(*)</code>
						<input type="text" name="stock" class="form-control" id="focostock" value="15" required>
					</div>

					<div class="form-group">
						<label for="name">Consola: </label><code>(*)</code>
						<select name="console" id="console" class="form-control">
							<option value="">Selecciona</option>
							<?php 
								foreach ($rows as $filas) {
									echo "<option value='".$filas['id']."'>".$filas['name']."</option>";
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="name">Imagen: </label><code>(*)</code>
						<input type="file" name="flsimagen" required>
						<input type="hidden" name="create">
					</div>
				</div>

				<button type="submit" name="enviar" value="Guardar" class="btn btn-success" style="margin-left:40%;">
					<b>Almacenar Datos <span class="glyphicon glyphicon-floppy-save"></span></b>
				</button>
			</form>
		</div>
			<a href="manage-games.php" id="back">Regresar</a>
	</div>
</div>

<script>
	$(document).ready(function() {
		var foconombre = $("#foconombre");
		foconombre.focus(function(){
			var foconombre = $("#foconombre");
			foconombre.attr('value', '');
		});

		foconombre.blur(function(){
			var blurnombre = $("#foconombre");
			blurnombre.attr('value', 'Donkey Kong Country');
		});

		var focodev = $("#focodev");
		focodev.focus(function(){
			var focodev = $("#focodev");
			focodev.attr('value', '');
		});

		focodev.blur(function(){
			var focodev = $("#focodev");
			focodev.attr('value', 'Rare Ware');
		});

		var focoyear = $("#focoyear");
		focoyear.focus(function(){
			var focoyear = $("#focoyear");
			focoyear.attr('value', '');
		});

		focoyear.blur(function(){
			var focoyear = $("#focoyear");
			focoyear.attr('value', '1993');
		});

		var focogen = $("#focogen");
		focogen.focus(function(){
			var focogen = $("#focogen");
			focogen.attr('value', '');
		});

		focogen.blur(function(){
			var focogen = $("#focogen");
			focogen.attr('value', 'Plataforma');
		});

		var focoesrb = $("#focoesrb");
		focoesrb.focus(function(){
			var focoesrb = $("#focoesrb");
			focoesrb.attr('value', '');
		});

		focoesrb.blur(function(){
			var focoesrb = $("#focoesrb");
			focoesrb.attr('value', 'KA');
		});

		var focoprice = $("#focoprice");
		focoprice.focus(function(){
			var focoprice = $("#focoprice");
			focoprice.attr('value', '');
		});

		focoprice.blur(function(){
			var focoprice = $("#focoprice");
			focoprice.attr('value', '10.00');
		});

		var focostock = $("#focostock");
		focostock.focus(function(){
			var focostock = $("#focostock");
			focostock.attr('value', '');
		});

		focostock.blur(function(){
			var focostock = $("#focostock");
			focostock.attr('value', '10');
		});

		var btnback = $("#back");
		btnback.button({
			icons:{
				primary:"ui-icon-seek-prev"
			},
			text: true
		});
	});
</script>