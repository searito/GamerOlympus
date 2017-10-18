<?php  
	require('func/functions.php');

	$mensaje = null;

	if (isset($_POST['login'])) {
		$model = new Login;
		$model->user = htmlspecialchars($_POST['user']);
		$model->password = htmlspecialchars(md5($_POST['password']));
		$model->Logueo();
		$mensaje = $model->mensaje;
	}

	session_start();

	if (empty($_SESSION['user'])) {
		session_destroy();
	}else{
		switch ($_SESSION['level']) {
			case '0':
				echo "<script>window.location=('admin/index.php');</script>";
				break;
			
			case '1':
				echo "<script>window.location=('section/index.php');</script>";
				break;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gamer Olympus</title>

	<link rel="stylesheet" href="css/formato.css">
	<link rel="shortcut icon" href="img/logo2.png" width="16" height="16">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>

	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/jquery-ui.structure.css">
	<link rel="stylesheet" href="css/jquery-ui.theme.css">
</head>
<body>
	
	<h1 class="title_main">Gamer Olympus</h1>

	<div id="loginbox">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-signin">
			<h2 class="form-signin-heading">Para Rentar Un Juego Necesitas Iniciar Sesión</h2>
				<table>
					<tr>
						<td>Usuario</td>
						<td><input type="text" name="user" autofocus></td>
					</tr>
					<tr>
						<td>Contraseña</td>
						<td><input type="password" name="password"></td>
					</tr>
					<input type="hidden" name="login">
					<tr>
						<td colspan="2">
						<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="save">Entrar</button></center></td>
					</tr>
				</table>
		</form>
	</div>

	<div id="ncuenta">
		No Posees Una Cuenta Con Nosotros Ingresa <a class="registerlink" href="section/register.php">Aquí </a>
	</div>
</body>
</html>

<script>
	$(document).ready(function() {
		var BtnSave = $("#save");
		BtnSave.button({
			icons:{
				primary:"ui-icon-key"
			},
			text: true
		});
	});
</script>