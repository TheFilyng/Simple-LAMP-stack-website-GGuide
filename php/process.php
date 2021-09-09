<?php
	
	//Inicializamos las variables que van a contener la información enviada por el formulario de login
	$username = ""; 
	$password = "";

	//Cuenta de errores.
	//Los errores que se validan clientside solamente se validan y se cuentan, no se añaden al array de errores.
	//Los errores que SOLAMENTE se validan por el servidor SÍ se añaden al array de errores, de ahí errors.php los muestra en pantalla (encima del formulario)
	$errorClienteCount = 0;
	$errors = array();

	if (isset($_POST['login'])){ //Si se ha pulsado el submit con nombre "login" se comienza a procesar el formulario

		$username = $_POST['user']; //Guardamos el nombre de usuario
		$password = $_POST['pass']; //Guardamos la contraseña

		if(empty($username)){
			$errorClienteCount += 1; //Si el campo de usuario es vacio sumamos el error
		}
		if(empty($password)){
			$errorClienteCount += 1; //Si el campo de contraseña es vacio sumamos el error
		}
		if($errorClienteCount == 0){ //Solo si no hay errores se valida el formulario
			
			//Conectamos con la base de datos mysql
			$mysqli = mysqli_connect('localhost', 'root', "", 'login');
			$mysqli->set_charset("utf8");

			//Hacemos un query para obtener si hay un usuario con esos datos o no.
			$result = mysqli_query($mysqli, "SELECT * from usuarios where username = '$username' and password = '$password'");

			$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //Lo convertimos a array
			if(is_null($row)){		
				/*Si es null significa que no ha encontrado un usuario con esos datos, por lo que 
				se añade al array de errores (que son los errores serverside) que no se ha podido iniciar sesión*/
				array_push($errors, "Fallo al iniciar sesion"); 
			}
			else{ //Si no es null se inicia la sesión php, se guarda en la variable SESSION el nombre de usuario y se redirige al inicio
				if(($row['username'] == $username) && ($row['password'] == $password)){
					session_start();
					$_SESSION["username"] = $username;
					header('Location: index.php');
				}
			}
		}	
	}
?>