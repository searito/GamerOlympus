<?php  
	require('heading.php');
	require('menu.php');

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();

	$conectar = new Conexion();
	$conectando = $conectar->AlternativeConection();

	$sql = "SELECT games.id AS 'id', games.name AS 'nombre', games.price AS 'precio', games.img AS 'imagen', consoles.name AS 'consola' 
			FROM games INNER JOIN consoles ON games.id_console = consoles.id";

	$sql2 = mysql_query($sql) or die(mysql_error());
?>
	<section>
		<div class="jumbotron">
			<div class="container">
				<?php
					while($print = mysql_fetch_assoc($sql2)):
				?>
					<div class="col-md-3">
						<div class="panel panel-primary">
							<div class="panel-heading"><center><b><?php echo $print['nombre']; ?></b></center></div>
							<div class="panel-body">
								<center>
									<a href="more.php?codegame=<?php echo $print['id']; ?>"><img src="<?php echo $print['imagen']; ?>" class="catalogo" title="<?php echo $print['nombre']; ?>"></a>
									<hr>
									<label>Precio Diario: </label> <?php echo "$ ". number_format($print['precio'], 2); ?><br>
									<label>Consola: </label> <?php echo $print['consola']; ?><br>
									<a href="more.php?codegame=<?php echo $print['id']; ?>" class="more">Más Info</a>
									<a href="../shop/shopcar.php?codegame=<?php echo $print['id']; ?>" class="shopcar">Agregar Al Carrito</a>
								</center>
							</div>
						</div>
					</div>
				<?php
					endwhile;
				?>
			</div>
		</div>
	</section>
</div><!--FIN CONTENEDOR-->

<script>
	$(document).ready(function() {
		var btnmore = $(".more");
		btnmore.button({
			icons:{
				primary: "ui-icon-folder-open"
			},
			text: false
		});

		var btnin = $(".in");
		btnin.button({
			icons:{
				primary: "ui-icon-circle-plus"
			},
			text: false
		});

		var btnout = $(".out");
		btnout.button({
			icons:{
				primary: "ui-icon-circle-minus"
			},
			text: false
		});

		var btndel = $(".del");
		btndel.button({
			icons:{
				primary: "ui-icon-circle-close"
			},
			text: false
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