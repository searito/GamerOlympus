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

	if (isset($_SESSION['carrito'])) {
		if (isset($_GET['codegame'])) {
			$arreglo = $_SESSION['carrito'];
			$encontro = false;
			$numero = 0;

			for ($i=0; $i < count($arreglo); $i++) { 
				if ($arreglo[$i]['Id'] == $_GET['codegame']) {
					$encontro = true;
					$numero = $i;
				}
			}

			if ($encontro == true) {
				$arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
				$_SESSION['carrito'] = $arreglo;
			}else{
				$nombre = "";
				$precio = 0;
				$imagen = "";
				$re = mysql_query("SELECT * FROM games WHERE id =". $_GET['codegame']);

				while ($row = mysql_fetch_array($re)) {
					$nombre = $row['name'];
					$precio = $row['price'];
					$imagen = $row['img'];
				}

				$datosNuevos = array('Id' => $_GET['codegame'],
								 	   'Nombre' => $nombre,
								 	   'Precio' => $precio,
								 	   'Imagen' => $imagen,
								 	   'Cantidad' => 1);

				array_push($arreglo, $datosNuevos);
				$_SESSION['carrito'] = $arreglo;
		}
	}

	}else{
		if (isset($_GET['codegame'])) {
			$nombre = "";
			$precio = 0;
			$imagen = "";
			$re = mysql_query("SELECT * FROM games WHERE id =". $_GET['codegame']);

			while ($row = mysql_fetch_array($re)) {
				$nombre = $row['name'];
				$precio = $row['price'];
				$imagen = $row['img'];
			}

			$arreglo[] = array('Id' => $_GET['codegame'],
							 'Nombre' => $nombre,
							 'Precio' => $precio,
							 'Imagen' => $imagen,
							 'Cantidad' => 1);

			$_SESSION['carrito'] = $arreglo;
		}
	}
?>

<script type="text/javascript" src="../js/complement.js"></script>

<div class="jumbotron">
	<div class="container">
		<?php  
			$total= 0;
			if (isset($_SESSION['carrito'])) {
				$datos = $_SESSION['carrito'];
				$total = 0;

				for ($i=0; $i < count($datos); $i++) { 
				?>
					<div class="col-md-3">
						<div class="panel panel-primary">
							<div class="panel-heading"><center><?php echo $datos[$i]['Nombre']; ?></center></div>
							<div class="panel-body">
								<center><img src="<?php echo $datos[$i]['Imagen']; ?>" class="img-circle img-thumbnail" width="150" title="<?php echo $datos[$i]['Nombre']; ?>"></center> <br>
								<b>Precio Diario: </b> $<?php echo number_format($datos[$i]['Precio'], 2); ?><br>
								<b>Número De Dias: </b>
								<input class="spinner" size="5" value="<?php echo $datos[$i]['Cantidad']; ?>"
									data-precio="<?php echo $datos[$i]['Precio']; ?>"
									data-id ="<?php echo $datos[$i]['Id']; ?>"><br>
								<!--b>Fecha Devolución </b> <input type="text" class="date"-->
								<label for="subt" class="subtotal">Sub-Total: </label> 
								$<?php echo number_format($datos[$i]['Precio'] * $datos[$i]['Cantidad'], 2);?><br>
								<center><a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']; ?>">Quitar Juego</a></center>
							</div>
						</div>
					</div>
				<?php
					$total = ($datos[$i]['Precio'] * $datos[$i]['Cantidad']) + $total;
				}
			}else{
				echo "<h2><center>No Has Agregado Ningún Producto<center></h2>";
			}
			echo "<h2 id='total'> Total: $".number_format($total, 2)."</h2>";

			echo "<a href='alquilando.php' class='alquilando'>Procesar Pedido</a>";

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

		var spinner = $(".spinner").spinner();	

		var btnalquilando = $(".alquilando");
		btnalquilando.button({
			icons:{
				primary:"ui-icon-check"
			},
			text: true
		});

		var btnquit = $(".eliminar");
		btnquit.button({
			icons:{
				primary:"ui-icon-circle-close"
			},
			text: true
		});



		/*$(".date").datepicker();*/
	});
</script>