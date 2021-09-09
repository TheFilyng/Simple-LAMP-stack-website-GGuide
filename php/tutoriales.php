<?php 
		session_start(); //Se inicia la sesión php y el menu
?>
<html>
	<head>
		<title>GGuide</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	</head>
	<?php 
		include("menu.php"); //El menú necesita que la sesión este iniciada para mostrar las opciones para usuarios logeados o solo visitantes
	?>
	<body>
		<div class="contenido">
			<div class="dropdown"> <!--Creamos el menú desplegable de filtro por género-->
				<button class="dropbtn">Filtrar por género</button>
				<div class="dropdown-content">
		    		<a href="?">Todos los tutoriales</a>
		    		<?php
		    			$xml = simplexml_load_file("../xml/tutoriales.xml");
						$data = $xml->tutorial;
						$generos = array();
						foreach ($data as $tuto) {
							//De nuestro fichero xml obtenemos de todos los tutoriales el valor genero
							//y lo añadimos a una lista para evitar repetidos
							if(!(in_array(strtolower((string)$tuto->genero), $generos))){
								array_push($generos, strtolower((string)$tuto->genero));
								//Ponemos en el HTML estos generos, que aparecerán en la lista desplegable
								echo '<a href="?genero='.$tuto->genero.'">'.$tuto->genero.'</a>';
							}	
						}	
		    		?>
	  			</div>
	  		</div> 
	  		<div class="dropdown"> <!--Creamos el menú desplegable de filtro por juego-->
	  			<button class="dropbtn">Filtrar por juego</button>
				<div class="dropdown-content">
		    		<a href="?">Todos los tutoriales</a>
		    		<?php
						$nombres = array();
						foreach ($data as $tuto) {
							//De nuestro fichero xml obtenemos de todos los tutoriales el valor nombreJuego
							//y lo añadimos a una lista para evitar repetidos
							if(!(in_array(strtolower((string)$tuto->nombreJuego), $nombres))){
								array_push($nombres, strtolower((string)$tuto->nombreJuego));
								//Ponemos en el HTML estos nombres, que aparecerán en la lista desplegable
								echo '<a href="?nombre='.$tuto->nombreJuego.'">'.$tuto->nombreJuego.'</a>';
							}	
						}	
		    		?>
	  			</div>
	  		</div>
			<div class="tutos">
				<?php
				//Definimos una función que se encarga de generar el HTML de un nuevo tutorial
				function printearTuto($tuto)
				{
				    echo '<div class="tuto">';
					echo '<div class="tutoContent">';
					echo "<h1>".$tuto->titulo."</h1>";
					echo "<h2>".$tuto->nombreJuego."</h2>";
					echo "<h3>"."Genero: ".$tuto->genero."</h3>";
					echo "<h4>"."Tipo de tutorial: ".$tuto->tipoTutorial."</h4>";
					echo "<h4>"."Subido por: ".$tuto->usuario."</h4>";
					echo "<p>".$tuto->descripcion."</p>";
					echo "</div>";
					echo "</div>";
				}
					foreach ($data as $tuto) {
						//Si obtenemos que se ha seleccionado el filtro por género, por cada tutorial solo mostramos los que
						//tengan el género seleccionado. Si no hay género muestra todos.
						if(!(isset($_GET['nombre'])) && (empty($_GET['genero'] ?? "") || strtolower($tuto->genero) == strtolower($_GET['genero']))) {
							printearTuto($tuto);
						}
						//Si obtenemos que se ha seleccionado el filtro por juego, por cada tutorial solo mostramos los que
						//tengan el juego seleccionado. Si no hay juego muestra todos.
						else if(!(isset($_GET['genero'])) && (empty($_GET['nombre'] ?? "") || strtolower($tuto->nombreJuego) == strtolower($_GET['nombre']))) {
							printearTuto($tuto);
						}
					}		
				?>
			</div>	
		</div>
	</body>
</html>