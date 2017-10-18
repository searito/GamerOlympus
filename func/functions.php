<?php  
	class Conexion{
		
		public function Conectar(){
			$usuario = 'root';
			$password = '';
			$host = 'localhost';
			$db = 'gamer_olympus';

			return $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $password);
		}

		public function AlternativeConection(){
			$a = mysql_connect('localhost', 'root', '');
			$b = mysql_select_db('gamer_olympus', $a);
		}
	}

	class CRUD{
		public $insertInto;
		public $insertColumns;
		public $insertValues;
		public $mensaje;

		public $select;
		public $from;
		public $condition;
		public $rows;

		public $update;
		public $set;

		public $deleteFrom;

		public function Create(){
			$model = new Conexion();
			$conexion = $model->Conectar();
			$insertInto = $this->insertInto;
			$insertColumns = $this->insertColumns;
			$insertValues = $this->insertValues;
			$sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
			$consulta = $conexion->prepare($sql);

			if (!$consulta) {
				# $this->mensaje = "Error Al Crear El Registro";
				$this->mensaje = "<div id='err' title='¡Error Al Crear El Registro!'>
									<p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>
									¡Error Al Crear El Registro!
								  </div>";
			}else{
				$consulta->execute();
				# $this->mensaje = "¡Registro Creado Exitosamente!";
				$this->mensaje = "";
			}
		}

		public function Read(){
			$model = new Conexion();
			$conexion = $model->Conectar();
			$select = $this->select;
			$from = $this->from;
			$condition = $this->condition;

			if ($condition != '') {
				$condition = " WHERE " . $condition;
			}

			$sql = "SELECT $select FROM $from $condition";
			$consulta = $conexion->prepare($sql);
			$consulta->execute();

			while ($filas = $consulta->fetch()) {
				$this->rows[] = $filas;
			}
		}

		public function Update(){
			$model = new Conexion();
			$conexion = $model->Conectar();
			$update = $this->update;
			$set = $this->set;
			$condition = $this->condition;

			if ($condition != "") {
				$condition = " WHERE ". $condition;
			}

			$sql = ("UPDATE $update SET $set $condition");
			$consulta = $conexion->prepare($sql);

			if (!$consulta) {
				$this->mensaje = "<div id='err' title='¡Error Al Modificar El Registro!'>
									<p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>
									¡Error Al Modificar El Registro!
								  </div>";
			}else{
				$consulta->execute();
				$this->mensaje = "";
			}
		}

		public function Delete(){
			$model = new Conexion();
			$conexion = $model->Conectar();
			$deleteFrom = $this->deleteFrom;
			$condition = $this->condition;

			if ($condition != "") {
				$condition = " WHERE ".$condition;
			}
			$sql = "DELETE FROM $deleteFrom $condition";
			$consulta = $conexion->prepare($sql);

			if (!$consulta) {
				$this->mensaje = "<div id='err' title='¡Error Al Eliminar El Registro!'>
									<p><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>
									¡Error Al Eliminar El Registro!
								  </div>";
			}else{
				$consulta->execute();
				$this->mensaje = "";
			}
		}
	}

	class Login{
		public $user;
		public $password;
		public $nivel;
		public $mensaje;

		public function Logueo(){
			$model = new Conexion();
			$conexion = $model->Conectar();
			$sql = ("SELECT * FROM users WHERE ");
			$sql .= "user=:user AND password=:password";
			$consulta = $conexion->prepare($sql);
			$consulta->bindParam(':user', $this->user, PDO::PARAM_STR);
			$consulta->bindParam(':password', $this->password, PDO::PARAM_STR);
			# $consulta->bindParam(':level', $this->level, PDO::PARAM_STR);
			$consulta->execute();
			$total = $consulta->rowCount();

			if ($total == 0) {
				$this->mensaje = "";
				echo "<script>alert('¡Error Al Iniciar Sesión!');</script>";
			}else{
				$fila = $consulta->fetch();
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['id'] = $fila['id'];
				$_SESSION['user'] = $fila['user'];
				$_SESSION['level'] = $fila['level'];

				switch ($fila['level']) {
					case '0':
						header('location:admin/index.php');
						break;
					
					case '1':
						header('location:section/index.php');
						break;
				}
			}
		}
	}

	class SesionActiva{
		public function ActiveSesion(){
				if (empty($_SESSION['user'])) {
					session_start();
					session_destroy();
					header('location: ../index.php');
				}else{
					return true;
				}
		}

		public function Derechos(){
			switch ($_SESSION['level']) {
				case '0':
					return true;
					break;
				case '1':
					echo "<script>alert('Tus Permisos No Son Suficientes...');window.location=('../section/index.php');</script>";
					break;
			}
		}
	}
?>