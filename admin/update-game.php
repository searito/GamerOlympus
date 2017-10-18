<?php  
	require('../section/heading.php');

	$conectar = new Conexion();
	$conectando = $conectar->Conectar();

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();
	$mensaje = null;

	require('menu.php');

	if (isset($_REQUEST['id'])) {
		$id = htmlspecialchars($_REQUEST['id']);

		$model = new CRUD;
		$model->select = "*";
		$model->from = "games";
		$model->condition = "id = $id";
		$model->Read();
		$filas = $model->rows;

		foreach ($filas as $print) {
			$name = $print['name'];
			$development = $print['development'];
			$year = $print['year'];
			$genre = $print['genre'];
			$esrb = $print['esrb'];
			$price = $print['price'];
			$stock = $print['stock'];
		}
	}

	if (isset($_POST['update'])) {
		$id = htmlspecialchars($_POST['id']);
		$name = htmlspecialchars($_POST['name']);
		$development = htmlspecialchars($_POST['development']);
		$year = htmlspecialchars($_POST['year']);
		$genre = htmlspecialchars($_POST['genre']);
		$esrb = htmlspecialchars($_POST['esrb']);
		$price = htmlspecialchars($_POST['price']);
		$stock = htmlspecialchars($_POST['stock']);

		$model = new CRUD;
		$model->update = "games";
		$model->set = "name='$name', development='$development', year='$year', genre='$genre', esrb='$esrb', price='$price', stock='$stock'";
		$model->condition = "id='$id'";
		$model->Update();
		$mensaje = $model->mensaje;
		echo "<script>alert('¡Registro Modificado Éxitosamente!');window.location=('manage-games.php');</script>";
	}
?>

<h3 class="text-primary"><p>Modificar Datos Del Juego <?php echo $name; ?></p></h3>
<hr>
<div class="jumbotron">
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" role="form">

				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nombre: </label><code>(*)</code>
						<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
					</div>

					<div class="form-group">
						<label for="name">Casa Desarrolladora: </label><code>(*)</code>
						<input type="text" name="development" class="form-control" value="<?php echo $development; ?>" required>
					</div>

					<div class="form-group">
						<label for="name">Año </label><code>(*)</code>
						<input type="text" name="year" class="form-control" value="<?php echo $year;?>" required>
					</div>
				</div>

				<div class="col-md-1">
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Género: </label><code>(*)</code>
						<input type="text" name="genre" class="form-control" value="<?php echo $genre; ?>" required>
					</div>

					<div class="form-group">
						<label for="name">ESRB: </label><code>(*)</code>
						<input type="text" name="esrb" class="form-control" value="<?php echo $esrb; ?>" required>
					</div>

					<div class="form-group">
						<label for="name">Precio Diario: </label><code>(*)</code>
						<input type="text" name="price" class="form-control" value="<?php echo $price; ?>" required>
					</div>
				</div>

				<div class="col-md-1">
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Unidades: </label><code>(*)</code>
						<input type="text" name="stock" class="form-control" value="<?php echo $stock; ?>" required>
					</div>

					<div class="form-group">
						<input type="hidden" name="update">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
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
		var Btn1 = $("#back");
		Btn1.button({
			icons:{
				primary:"ui-icon-circle-triangle-w"
			},
			text: true
		});
	});
</script>