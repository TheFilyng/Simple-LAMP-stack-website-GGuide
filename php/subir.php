<?php 
//Se carga el fichero que procesa el formulario en primera instancia.
//También se inicia antes la sesión php ya que el proceso de subir el formulario requiere obtener el nombre de usuario de la sesión.
session_start();
include("subirProcess.php");
?>
<html>
	<head>
		<title>Subir Tutorial</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	</head>
	<?php
		include("menu.php"); //Cargamos el menú. En este caso no hace falta hacer un session_start ya que el process.php la realiza.
	?>
	<body>
		<div class="contenido">
			<div class="subir">
				<?php include("exito.php") //Cargamos el script de éxito. Se mostrará un mensaje de exito si se completa correctamente el registro ?>  
				<form id="subirForm" action="subir.php" method="POST" class="form_validation"> <!--Creamos el formulario -->
					<div class="error"></div><!-- Este div error es 
					en el que se cargan los errores clientside (también se verificane en el servidor) que el javascript se encarga de poner.  -->
					<h2 class="form_title">Título del tutorial</h2>
					<!--Todos los inputs tienen los atributos necesarios para hacer la validación clientside. data-error es el atributo de donde
					el script form_validation.js obtiene la string de error que mostrar en la web. -->
					<input data-error="Hay que especificar un titulo para el tutorial" type="text" id="title" name="title" required="true" autofocus placeholder="Ej: Nivel 1"><br>
					<h2 class="form_title">Nombre del juego</h2>
					<input data-error="Hay que especificar el nombre del juego" type="text" id="nombreJuego" name="nombreJuego" required="true" autofocus placeholder="Ej: Tetris"><br>	
					<h2 class="form_title">Género</h2>
					<input data-error="Hay que especificar un género" type="text" id="genero" name="genero" required="true" autofocus placeholder="Ej: Puzzle"><br>	
					<h2 class="form_title">Tipo de tutorial</h2>
					<input data-error="Hay que especificar el tipo de tutorial" type="text" id="tipo" name="tipo" required="true" autofocus placeholder="Ej: Misión"><br>
					<h2 class="form_title">Escribe tu tutorial</h2>
					<textarea data-error="Debes escribir el tutorial" rows="5" cols="80" id="descripcion" name="descripcion" form="subirForm" required="true" autofocus></textarea>	
					<input type="hidden" name="subirTuto">
					<button type="submit" id="subirTuto" name="subirTuto">Subir tutorial</button><br>	
					</p>
				</form>
			</div>
		</div>
		<script src="../javascript/form_validation.js"></script> <!-- Cargamos el script de validación clientside una vez ya realizado el formulario -->
	</body>
</html>