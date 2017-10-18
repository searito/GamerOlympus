<?php  
	session_start();

	require('../func/functions.php');

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();

	$conectar = new Conexion();
	$conectando = $conectar->AlternativeConection();

	$arreglo = $_SESSION['carrito'];
	$numeroventa = 0;
	$re = mysql_query("SELECT * FROM process ORDER BY numeror DESC LIMIT 1") or die (mysql_error());

	while ($print = mysql_fetch_array($re)) {
		$numeroventa = $print['numeror'];
	}

	if ($numeroventa == 0) {
		$numeroventa = 1;
	}else{
		$numeroventa++;
	}

	for ($i=0; $i < count($arreglo); $i++) { 
		mysql_query("INSERT INTO process (numeror, juego, precio, cant_dias, subtotal) VALUES(
					 ".$numeroventa.",
					 '".$arreglo[$i]['Nombre']."',
					 '".$arreglo[$i]['Precio']."',
					 '".$arreglo[$i]['Cantidad']."',
					 '".($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'])."'
			)") or die(mysql_error());
	}

	unset($_SESSION['carrito']);

	header('location: history.php');

	
?>