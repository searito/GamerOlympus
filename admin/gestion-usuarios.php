<?php  
	require('../section/heading.php');
	require('menu.php');

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
	$permisos = $sesion->Derechos();

	$model = new CRUD;
	$model->select = '*';
	$model->from = 'users';
	$model->Read();
	$rows = $model->rows;
?>

<a href="create-user.php" id="add">Agregar Usuario</a>
<br><br>

<table class="table table-striped table-hover">
	<tr style="text-align:center; background-color:#CEE3F6;">
		<th >Usuario</th>
		<th>Nombre Completo</th>
		<th>Rol</th>
		<th>D.U.I.</th>
		<th>Teléfono Fijo</th>
		<th>Teléfono Celular</th>
		<th>Dirección</th>
		<th>Departamento</th>
		<th>Ciudad</th>
		<th width="100">Acciones</th>
	</tr>

	<?php 
		foreach ($rows as $print) {

			$nivel = $print['level'];
			if ($nivel == 0) {
				$nivel = "Administrador";
			}else{
				$nivel = "Cliente";
			}
	?>
			<tr>
				<td><?php echo $print['user']; ?></td>
				<td><?php echo $print['name']; ?></td>
				<td><?php echo $nivel; ?></td>
				<td><?php echo $print['dui']; ?></td>
				<td><?php echo $print['tel1']; ?></td>
				<td><?php echo $print['tel2']; ?></td>
				<td><?php echo $print['address']; ?></td>
				<td><?php echo $print['depto']; ?></td>
				<td><?php echo $print['city']; ?></td>
				<td>
					<center>
						<a href="update-user.php?id=<?php echo $print['id'] ?>" class="update">Modificar Datos</a>
						<a href="delete-user.php?id=<?php echo $print['id'] ?>" class="delete">Eliminar Usuario</a>
					</center>
				</td>
			</tr>
	<?php
		}
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