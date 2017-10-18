<?php  
	require('../section/heading.php');
	require('menu.php');

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();

	$conectar = new Conexion();
	$conectando = $conectar->AlternativeConection();

	$sql = ("SELECT games.id AS 'id', games.`name`AS 'nombre', games.development AS 'desarollador', games.esrb AS 'clasificacion', games.genre AS 'genero', games.img AS 'imagen',
				games.price AS 'precio', games.stock AS 'unidades', games.`year` AS 'year', consoles.`name` AS 'consola' FROM games 
				INNER JOIN consoles ON(games.id_console = consoles.id) WHERE games.id = ".$_GET['codegame']);

	$proceso = mysql_query($sql) or die(mysql_error());
?>

<div class="container">
	<h3 class="text-primary">Información Detallada Del Juego</h3>

	<div class="jumbotron">
		<?php  
			while ($print = mysql_fetch_assoc($proceso)) {
		?>
			<table class="table">
				<tr>
					<td colspan="2" rowspan="10" width="40%">
						<img src="<?php echo $print['imagen']; ?>" class="img-thumbnail" width="300" title="<?php echo $print['nombre']; ?>">
					</td>
				</tr>

				<tr>
					<td>
						<label for="nombre" class="text-primary">Nombre:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['nombre']; ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="desarrollador" class="text-primary">Desarrollador:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['desarollador']; ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="genero" class="text-primary">Género:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['genero']; ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="esrb" class="text-primary">Clasificación ESRB:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['clasificacion']; ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="year" class="text-primary">Año De Lanzamiento:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['year']; ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="consola" class="text-primary">Consola:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['consola']; ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="precio" class="text-primary">Precio Diario:&nbsp;&nbsp;&nbsp;</label>
						<b>$ <?php echo number_format($print['precio'],2); ?></b>
					</td>
				</tr>

				<tr>
					<td>
						<label for="unidades" class="text-primary">Unidades:&nbsp;&nbsp;&nbsp;</label>
						<b><?php echo $print['unidades']; ?></b>
					</td>
				</tr>
				
				<tr>
					<td>
						<label for="acciones" class="text-primary">Acciones:&nbsp;&nbsp;&nbsp;</label>
						<a href="../shop/shopcar.php?codegame=<?php echo $print['id']; ?>" class="shopcar">Agregar Al Carrito</a>
					</td>
				</tr>
			</table>
		<?php
			}
		?>

		<button id="back">
			Regresar
		</button>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		var btnback = $("#back");
		btnback.button({
			icons:{
				primary:"ui-icon-seek-prev"
			},
			text: true
		});

		$("#back").click(function() {
			window.location=('index.php');
		});

		var btnshop = $(".shopcar");
		btnshop.button({
			icons:{
				primary:"ui-icon-cart"
			},
			text: false
		});
	});
</script>