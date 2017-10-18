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
		$model->from = "users";
		$model->condition = "id = $id";
		$model->Read();
		$filas = $model->rows;

		foreach ($filas as $print) {
			$user = $print['user'];
			$name = $print['name'];
			$pass = $print['password'];
			$level = $print['level'];
			$dui = $print['dui'];
			$tel1 = $print['tel1'];
			$tel2 = $print['tel2'];
			$address = $print['address'];
			$depto = $print['depto'];
			$city = $print['city'];
		}
	}

	if (isset($_POST['update'])) {
		$id = htmlspecialchars($_POST['id']);
		$name = htmlspecialchars($_POST['name']);
		$user = htmlspecialchars($_POST['user']);
		$password = htmlspecialchars(md5($_POST['password']));
		$level = htmlspecialchars($_POST['level']);
		$dui = htmlspecialchars($_POST['dui']);
		$tel1 = htmlspecialchars($_POST['tel1']);
		$tel2 = htmlspecialchars($_POST['tel2']);
		$address = htmlspecialchars($_POST['address']);
		$depto = htmlspecialchars($_POST['depto']);
		$city = htmlspecialchars($_POST['city']);

		$model = new CRUD;
		$model->update = "users";
		$model->set = "name='$name', user='$user', password='$password', level='$level', dui='$dui', tel1='$tel1', tel2='$tel2', address='$address', depto='$depto', city='$city'";
		$model->condition = "id='$id'";
		$model->Update();
		$mensaje = $model->mensaje;
		echo "<script>alert('¡Registro Modificado Éxitosamente!');window.location=('gestion-usuarios.php');</script>";
	}
?>

<h3 class="text-primary"><p>Modificar Datos De Usuario</p></h3>
	<hr>

	<div class="jumbotron">
		<div class="container">
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nombre: </label><code>(*)</code>
						<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
					</div>

					<div class="form-group">
						<label for="usuario">Usuario:</label><code>(*)</code>
						<input type="text" name="user" class="form-control" value="<?php echo $user; ?>" required>
					</div>

					<div class="form-group">
						<label for="password">Contraseña:</label><code>(*)</code>
						<input type="password" name="password" class="form-control" value="<?php echo $pass; ?>" required>
					</div>

					<div class="form-group">
						<label for="level">Nivel:</label>
						<select name="level" class="form-control">
							<option value="">Selecciona</option>
							<option value="0">Administrador</option>
							<option value="1">Cliente</option>
						</select>
					</div>
				</div>

				<div class="col-md-1">
					
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="dui">D.U.I:</label><code>(*)</code>
						<input type="text" name="dui" class="form-control" value="<?php echo $dui; ?>" required>
					</div>

					<div class="form-group">
						<label for="tel1">Teléfono Fijo</label><code>(*)</code>
						<input type="text" name="tel1" class="form-control" value="<?php echo $tel1; ?>" required>
					</div>

					<div class="form-group">
						<label for="tel2">Teléfono Celúlar</label><code>(*)</code>
						<input type="text" name="tel2" class="form-control" value="<?php echo $tel2; ?>" required>
					</div>
				</div>

				<div class="col-md-1">
					
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="address">Dirección</label><code>(*)</code>
						<input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
					</div>

					<div class="form-group">
						<label for="depto">Departamento</label><code>(*)</code>
						<input type="text" name="depto"class="form-control" value="<?php echo $depto; ?>" required>
					</div>

					<div class="form-group">
						<label for="city">Municipio</label><code>(*)</code>
						<input type="text" name="city"class="form-control" id="fococity" value="<?php echo $city; ?>" required>
						<input type="hidden" name="update">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</div>
				</div>
				
				<div class="jumbotron">
					<center>
						<button type="submit" name="enviar" value="Guardar" class="btn btn-success">
							<b>Almacenar Datos <span class="glyphicon glyphicon-floppy-save"></span></b>
						</button>
					</center>
				</div>
			</form>
			<a href="gestion-usuarios.php" class="back">Regresar</a>
		</div>	
	</div>
</div>

<script>
	$(document).ready(function() {
		var Btn1 = $(".back");
		Btn1.button({
			icons:{
				primary:"ui-icon-circle-triangle-w"
			},
			text: true
		});
	});
</script>