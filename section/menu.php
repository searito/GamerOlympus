<br><br><br>
<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo " Bienvenid@ <b>" . $_SESSION['user'] . "</b>"; ?></a></li>
					<li><a href="index.php">Home</a></li>
					<li><a href="catalogo.php">Catálogo De Juegos</a></li>
					<li><a href="../shop/shopcar.php">Ver Carrito</a></li>
				<ul class="nav navbar-nav navbar-right">
					<li style="float:right;"><a href='../func/logout.php'><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>
	</nav><!--FIN ENCABEZADO-->