<?php  
	session_start();
	
	require('../func/functions.php');

	$conectar = new Conexion();
	$conectando = $conectar->Conectar();

	$mensaje = null;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Gamer Olympus</title>

	<link rel="stylesheet" href="../css/formato.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="shortcut icon" href="../img/logo2.png" width="16" height="16">

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>

	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/jquery-ui.structure.css">
	<link rel="stylesheet" href="../css/jquery-ui.theme.css">
</head>
<body>
	
	<a href="../index.php"><h1 class="title_main">Gamer Olympus</h1></a>
