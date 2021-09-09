<?php 
		session_start(); //Se inicia la sesión php
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
			<div class="inicio">
				<h1>¡Bienvenido a GGuide!</h1>
				<p>Bienvenido a GGuide, aquí encontrarás una lista de tutoriales o pequeñas guias sobre videojuegos
				para ayudarte a avanzar en ese nivel que tantas veces has repetido, o ese enemigo que tantas veces has intentado
				vencer. Nuestra comunidad es la encargada de crear y subir sus propios tutoriales, y tú también puede hacerlo; 
				registrándote, tendrás la posibilidad de subir tus propios tutoriales a la web. Si lo deseas, puedes consutlar todos los 
				tutoriales que hay en el web, sin necesidad de registrarse.</p>
				<img src="../imagenes/godofwar.jpg">
			</div>
			
		</div>
	</body>
</html>