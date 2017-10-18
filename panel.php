<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>subiendo Imagen</title>
</head>
<body>
	<h1>Subir Imagen</h1>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" name="registrarImagen" enctype="multipart/form-data">
		<fieldset>
			<legend>Subir Imagen</legend>

			<label for="">Nombre</label>
			<input type="text" name="txtnombre" value="" placeholder="">
			<label for="">Imagen</label>
			<input type="file" name="flsimagen" value="" placeholder="">

			<input type="submit" name="enviar" value="Enviar">
		</fieldset>
	</form>
</body>
</html>

<?php
	require('func/functions.php');

	$conectar = new Conexion();
	$conectando = $conectar->Conectar();

	if (isset($_POST['enviar'])) {
		$archivo = $_FILES['flsimagen'] ['tmp_name'];
		$destino = "img/". $_FILES['flsimagen'] ['name'];
		move_uploaded_file($archivo, $destino);

		mysql_connect("localhost", "root", "");
		mysql_select_db("gamer_olympus");
		mysql_query("INSERT INTO games VALUES 'Shadow Of The Colossus', 'Team ICO', '2005', 'AcciÃ³n - Aventura', 'Teen', ('$_POST[txtnombre]', '$destino'), '14.99', '22', '2'");
	}else{
		echo "Error";
	}
?>