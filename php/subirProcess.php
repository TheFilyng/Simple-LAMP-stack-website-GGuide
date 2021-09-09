<?php	

	//Inicializamos las variables que van a contener la información enviada por el formulario de subida
	$username = "";
	$titulo = "";
	$nombre = "";
	$genero = "";
	$tipo = "";
	$texto = "";

	//Cuenta de errores.
	//Solo hay errores clientside, por lo que se validan pero solo se hace una cuenta de ellos ya que no habrá que mostrar ningún mensaje por parte del servidor, el javascript se encargará de mostrarlos.
	$errorClienteCount = 0;
	//Similar a los errores serverside, aquí se almacenan los mensajes de exito del formulario.
	$exitos = array();

	//Obtenemos los datos
	if (isset($_POST['subirTuto'])){

		//Obtenemos los datos del formulario
		$titulo = $_POST['title'];
		$nombre = $_POST['nombreJuego'];
		$genero = $_POST['genero'];
		$tipo = $_POST['tipo'];
		$texto = htmlspecialchars($_POST['descripcion']);

		//Control de errores
		if(empty($titulo)){
			$errorClienteCount += 1;
		}
		if(empty($nombre)){
			$errorClienteCount += 1;
		}
		if(empty($genero)){
			$errorClienteCount += 1;
		}
		if(empty($tipo)){
			$errorClienteCount += 1;
		}
		if(empty($texto)){
			$errorClienteCount += 1;
		}
		if($errorClienteCount == 0){
			//Si no hay errores, creamos el nuevo tutorial con nuestra estructura XML
			$xml = simplexml_load_file("../xml/tutoriales.xml");
			$tutorial = $xml->addChild('tutorial');
			$tutorial->addChild('titulo', $titulo);
			$tutorial->addChild('nombreJuego', $nombre);
			$tutorial->addChild('genero', $genero);
			$tutorial->addChild('tipoTutorial', $tipo);
			$tutorial->addChild('usuario', $_SESSION["username"]);
			$tutorial->addChild('descripcion', $texto);
			//Lo añadimos a nuestro archivo xml
			$xml->asXML('../xml/tutoriales.xml');
			//Añadimos el mensaje de éxito para que se muestre en pantalla
			array_push($exitos, "El tutorial se ha subido satisfactoriamente"); 
		}
	}
?>