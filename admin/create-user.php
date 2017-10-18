<?php  
	require('../section/heading.php');

	$conectar = new Conexion();
	$conectando = $conectar->Conectar();

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();
	$mensaje = null;

	require('menu.php');

	if (isset($_POST['create'])) {
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

		if (strlen($name)>60 || strlen($user)>60 || strlen($password)>60 || strlen($dui)>13 || strlen($tel1)>10 || strlen($tel2)>10 || strlen($address)>60 || strlen($depto)>60 || strlen($city)>60) {	
			$mensaje = "";
			echo "<script>alert('Error');</script>";
		}else{
			$model = new CRUD;
			$model->insertInto = 'users';
			$model->insertColumns = 'name, user, password, level, dui, tel1, tel2, address, depto, city';
			$model->insertValues = "'$name','$user', '$password', '$level', '$dui', '$tel1', '$tel2', '$address', '$depto', '$city'";
			$model->Create();
			$mensaje = $model->mensaje;

			echo "<script>alert('¡Registro Almacenado Éxitosamente!'); window.location=('gestion-usuarios.php');</script>";
		}
	}
?>
	<h3 class="text-primary"><p>Agregar Un Usuario Nuevo</p></h3>
	<hr>

	<div class="jumbotron">
		<div class="container">
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
				<div class="col-md-3">
					<div class="form-group">
						<label for="name">Nombre: </label><code>(*)</code>
						<input type="text" name="name" class="form-control" id="foconombre" value="Valentine, Jill" required>
					</div>

					<div class="form-group">
						<label for="usuario">Usuario:</label><code>(*)</code>
						<input type="text" name="user" class="form-control" id="focouser" value="Jilly" required>
					</div>

					<div class="form-group">
						<label for="password">Contraseña:</label><code>(*)</code>
						<input type="password" name="password" class="form-control" id="focopass" value="*********" required>
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
						<input type="text" name="dui" class="form-control" id="focodui" value="05752326-7" required>
					</div>

					<div class="form-group">
						<label for="tel1">Teléfono Fijo</label><code>(*)</code>
						<input type="text" name="tel1" class="form-control" id="focotel1" value="2660-0876" required>
					</div>

					<div class="form-group">
						<label for="tel2">Teléfono Celúlar</label><code>(*)</code>
						<input type="text" name="tel2" class="form-control" id="focotel2" value="7410-1132" required>
					</div>
				</div>

				<div class="col-md-1">
					
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="address">Dirección</label><code>(*)</code>
						<input type="text" name="address" class="form-control" id="focoadd" value="Rose Avenue, #22" required>
					</div>

					<div class="form-group">
						<label for="depto">Departamento</label><code>(*)</code>
						<input type="text" name="depto"class="form-control" id="focodepto" value="Olympus" required>
					</div>

					<div class="form-group">
						<label for="city">Municipio</label><code>(*)</code>
						<input type="text" name="city"class="form-control" id="fococity" value="Racoon City" required>
						<input type="hidden" name="create">
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
		var foconombre = $("#foconombre");
		foconombre.focus(function(){
			var foconombre = $("#foconombre");
			foconombre.attr('value', '');
		});

		foconombre.blur(function(){
			var blurnombre = $("#foconombre");
			blurnombre.attr('value', 'Valentine, Jill');
		});

		var focouser = $("#focouser");
		focouser.focus(function(){
			var focouser = $("#focouser");
			focouser.attr('value', '');
		});

		focouser.blur(function(){
			var bluruser = $("#focouser");
			bluruser.attr('value', 'Jilly');
		});

		var focopass = $("#focopass");
		focopass.focus(function(){
			var focopass = $("#focopass");
			focopass.attr('value', '');
		});

		focopass.blur(function(){
			var blurpass = $("#focopass");
			blurpass.attr('value', '**********');
		});

		var focodui = $("#focodui");
		focodui.focus(function(){
			var focodui = $("#focodui");
			focodui.attr('value', '');
		});

		focodui.blur(function(){
			var focodui = $("#focodui");
			focodui.attr('value', '12345678-9');
		});

		var focotel1 = $("#focotel1");
		focotel1.focus(function(){
			var focotel1 = $("#focotel1");
			focotel1.attr('value', '');
		});

		focotel1.blur(function(){
			var focotel1 = $("#focotel1");
			focotel1.attr('value', '2283-2509');
		});

		var focotel2 = $("#focotel2");
		focotel2.focus(function(){
			var focotel2 = $("#focotel2");
			focotel2.attr('value', '');
		});

		focotel2.blur(function(){
			var focotel2 = $("#focotel2");
			focotel2.attr('value', '7865-3342');
		});

		var focoadd = $("#focoadd");
		focoadd.focus(function(){
			var focoadd = $("#focoadd");
			focoadd.attr('value', '');
		});

		focoadd.blur(function(){
			var focoadd = $("#focoadd");
			focoadd.attr('value', 'Main Avenue, #22');
		});

		var focodepto = $("#focodepto");
		focodepto.focus(function(){
			var focodepto = $("#focodepto");
			focodepto.attr('value', '');
		});

		focodepto.blur(function(){
			var focodepto = $("#focodepto");
			focodepto.attr('value', 'Olympus');
		});

		var fococity = $("#fococity");
		fococity.focus(function(){
			var fococity = $("#fococity");
			fococity.attr('value', '');
		});

		fococity.blur(function(){
			var fococity = $("#fococity");
			fococity.attr('value', 'Racoon City');
		});

		var btnback = $(".back");
		btnback.button({
			icons:{
				primary:"ui-icon-seek-prev"
			},
			text: true
		});
	});
</script>