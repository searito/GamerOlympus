<?php  
	require('../section/heading.php');

	$conectar = new Conexion();
	$conectando = $conectar->Conectar();

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();
	$mensaje = null;

	require('menu.php');

	if (isset($_POST['delete'])) {
		$id = htmlspecialchars($_POST['id']);

		if (!is_numeric($id)) {
			echo "<script>alert('¡Error Al Eliminar Palabra!');</script>";
		}else{
			$model = new CRUD;
			$model->deleteFrom = 'games';
			$model->condition = "id = $id";
			$model->Delete();
			$mensaje = $model->mensaje;
			echo "<script>alert('Juego Eliminado Éxitosamente!'); window.location=('manage-games.php');</script>";
		}
	}

?>
<h3 class="text-primary"><p>Eliminar Juego</p></h3>
<hr>

<div class="jumbotron">
	<div class="container">
	<?php if (isset($_GET['id'])): ?>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
			<h3>¿Seguro Deseas Eliminar Este Juego?</h3>

			<input type="hidden" name="delete">
			<input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
			<p>
				<a href="manage-games.php" id="no">No</a>
				<button type="submit" id="si">Si</button>
			</p>
		</form>
	<?php endif; ?>
	</div>
</div>

<script>
	$(document).ready(function() {
		var Btnnel = $("#no");
		Btnnel.button({
			icons:{
				primary:"ui-icon-circle-close"
			},
			text: true
		});

		var Btnsi = $("#si");
		Btnsi.button({
			icons:{
				primary:"ui-icon-circle-check"
			},
			text: true
		});
	});
</script>