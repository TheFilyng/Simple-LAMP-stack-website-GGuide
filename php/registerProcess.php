<?php	

	//Inicializamos las variables que van a contener la información enviada por el formulario de registro
	$username = "";
	$password = "";

	//Cuenta de errores.
	//Los errores que se validan clientside solamente se validan y se cuentan, no se añaden al array de errores.
	//Los errores que SOLAMENTE se validan por el servidor SÍ se añaden al array de errores, de ahí errors.php los muestra en pantalla (encima del formulario)
	$errorClienteCount = 0;
	$errors = array();
	//Similar a los errores serverside, aquí se almacenan los mensajes de exito del formulario.
	$exitos = array();

	//Conectamos con la base de datos mysql
	$db = mysqli_connect('localhost', 'root', "", 'login');
	$db->set_charset("utf8");

	//Obtenemos los datos
	if (isset($_POST['registro'])){
		$username = mysqli_real_escape_string($db, $_POST['user']);
		$password = mysqli_real_escape_string($db, $_POST['pass']);

		//Control de errores
		if(empty($username)){
			$errorClienteCount += 1;
		}
		if(strlen($password) < 4){
			$errorClienteCount += 1;
		}
		if($errorClienteCount == 0){
			//Hace un query a la base de datos para ver si ya existe algún usuario con el mismo nombre
			$sql = "SELECT * from usuarios where username = '$username'";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if(is_null($row)){
				//Si es null significa que no ha encontrado un usuario con ese nombre,
				//entonces realizamos el query para insertar el nuevo usuario en la base de datos
				$sql2 = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";
				mysqli_query($db, $sql2);
				array_push($exitos, "Se completó el registro"); //Añadimos el mensaje de exito al array de exitos.
			}
			else{
				//Si no es null significa que ya existe un usuario con el nombre, asi que añade este error al array de errores.
				array_push($errors, "Usuario existente");
			}
			
		}
	}
?>
	