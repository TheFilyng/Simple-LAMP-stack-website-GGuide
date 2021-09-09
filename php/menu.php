<!DOCTYPE html>
<html>
	<head>
		<title>menu</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	</head>
	<body>
		<div class="logo">
			<img src="../imagenes/logo.png" alt="GGuide">
		</div>
		
		<ul class="menu">
			<?php
				//Muestra las siguientes opciones en el menú si la variable SESSION username tiene valor, es decir,
				//que hay un usuario logeado.
				if(isset($_SESSION['username'])){
					echo "<li><a href='index.php'>Inicio</a></li>";
					echo "<li><a href='subir.php'>Subir tutorial</a></li>";
					echo "<li><a href='tutoriales.php'>Tutoriales</a></li>";
					echo "<li><a href='cerrarSesion.php'>Cerrar sesión</a></li>";
					echo "<li><t>Bienvenido/a, ".$_SESSION['username']."</t></li>"; //Mensaje de bienvenida en el menú con el nombre de ese usuario
				}
				//Si no, muestra las opciones para usuarios no logeados
				else{
					echo "<li><a href='index.php'>Inicio</a></li>";
					echo "<li><a href='login.php'>Iniciar sesion</a></li>";
					echo "<li><a href='register.php'>Registrate</a></li>";
					echo "<li><a href='tutoriales.php'>Tutoriales</a></li>";
				}
			?>															
		</ul>
	</body>
</html>