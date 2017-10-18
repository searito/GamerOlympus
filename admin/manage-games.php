<?php  
	require('../section/heading.php');
	require('menu.php');
	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();

	$conectar = new Conexion();
	$conectando = $conectar->AlternativeConection();

	$sql = ("SELECT games.id AS 'id', games.`name`AS 'nombre', games.development AS 'desarollador', games.esrb AS 'clasificacion', games.genre AS 'genero', 
			 games.img AS 'imagen', games.price AS 'precio', games.stock AS 'unidades', games.`year` AS 'year', consoles.`name` AS 'consola' FROM games
			 INNER JOIN consoles ON(games.id_console = consoles.id)");

	$proceso = mysql_query($sql) or die(mysql_error());
?>

<a href="add-game.php" id="add">Agregar Juego</a>
<br><br>

<table class="table table-striped table-hover">
	<tr style="text-align:center; background-color:#CEE3F6;">
		<th>Nombre</th>
		<th>Desarrollador</th>
		<th>Año De Lanzamiento</th>
		<th>Género</th>
		<th>ESRB</th>
		<th>Precio Por Día</th>
		<th>Consola</th>
		<th width="100">Acciones</th>
	</tr>

	<?php  
		while($print = mysql_fetch_assoc($proceso)):
	?>
		<tr>
			<td><?php echo $print['nombre']; ?></td>
			<td><?php echo $print['desarollador']; ?></td>
			<td><?php echo $print['year']; ?></td>
			<td><?php echo $print['genero']; ?></td>
			<td><?php echo $print['clasificacion']; ?></td>
			<td><?php echo "$ ".number_format($print['precio'], 2); ?></td>
			<td><?php echo $print['consola']; ?></td>
			<td>
				<center>
					<a href="update-game.php?id=<?php echo $print['id'] ?>" class="update">Modificar Datos</a>
					<a href="delete-game.php?id=<?php echo $print['id'] ?>" class="delete">Eliminar Usuario</a>
				</center>
			</td>
		</tr>
	<?php  
		endwhile;
	?>
</table>

<script>
	$(document).ready(function() {
		var btnUp = $(".update");
		btnUp.button({
			icons:{
				primary:"ui-icon-pencil"
			},
			text: false
		});

		var btnDel = $(".delete");
		btnDel.button({
			icons:{
				primary:"ui-icon-trash"
			},
			text: false
		});	

		var btnAdd = $("#add");
		btnAdd.button({
			icons:{
				primary:"ui-icon-plusthick"
			},
			text: true
		});
	});
</script>