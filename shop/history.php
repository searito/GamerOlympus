<?php 
	require('../section/heading.php');

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();

	$conectar = new Conexion();
	$conectando = $conectar->AlternativeConection();

	if ($_SESSION['level'] == 0) {
		require('../admin/menu.php');
	}else{
		require('../section/menu.php');
	}
?>

<div class="jumbotron">
	<div class="container">
		<center><h2 class="text-primary">Historial De Juegos</h2></center><br>
		<table class="table table-hover">
			<th>Nombre Del Juego</th>
			<th>Precio Por Día</th>
			<th>Cantidad De Días</th>
			<th>Sub-Total</th>

			<?php  
				$historial = mysql_query("SELECT * FROM process");
				$numeroventa = 0;

				while ($print = mysql_fetch_array($historial)) {
					if ($numeroventa != $print['numeror']) {
						?>
							<tr>
								<td colspan="4" class="info"><b>Transacción Número: <?php echo $print['numeror']; ?></b></td>
							</tr>
						<?php
					}
					$numeroventa = $print['numeror'];
					?>
						<tr>
							<td><?php echo $print['juego']; ?></td>
							<td><?php echo "$". number_format($print['precio'], 2); ?></td>
							<td><?php echo $print['cant_dias']; ?></td>
							<td><?php echo "$". number_format($print['subtotal'], 2); ?></td>
						</tr>
					<?php
				}
			?>
		</table>

		<?php 
			if ($_SESSION['level'] == 0) {
				echo "<a href='../admin/index.php' class='back'>Volver Al Cátalogo</a>";
			}else{
				echo "<a href='../section/catalogo.php' class='back'>Volver Al Cátalogo</a>";
			}
		?>
	</div>
</div>

<script>
	$(document).ready(function() {
		var btnback = $(".back");
		btnback.button({
			icons:{
				primary:"ui-icon-seek-prev"
			},
			text: true
		});
	});
</script>