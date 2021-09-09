<?php include("process.php"); //Se carga el fichero que procesa el formulario en primera instancia.?>
<html>
	<head>
		<title>Iniciar sesion</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	</head>
	<?php 
		include("menu.php"); //Cargamos el menú. En este caso no hace falta hacer un session_start ya que el process.php la realiza.
	?>
	<body>		
		<div class="formulario">
			<form action="login.php" method="POST" class="form_validation"> <!--Creamos el formulario -->
				<div class="error"><?php include("errors.php") ?></div> <!--Incluimos el script de errores por si los hubiera. Este div error también es 
				en el que se cargan los errores clientside que el javascript se encarga de poner. No habrán errores clientside y serveride mostrados al mismo tiempo. -->
				<p> <!--Todos los inputs tienen los atributos necesarios para hacer la validación clientside. data-error es el atributo de donde
				el script form_validation.js obtiene la string de error que mostrar en la web. -->
					<h2 class="form_title">Usuario</h2>
					<input data-error="Hay que especificar usuario" type="text" id="user" name="user" required="true" autofocus placeholder="Usuario"><br>
				</p>
				<p>
					<h2 class="form_title">Contraseña</h2>
					<input data-error="Hay que especificar contraseña" type="password" id="pass" name="pass" required="true" autofocus placeholder="Contraseña"><br>
					
				</p>
				<p>
					<input type="hidden" name="login">
					<button type="submit" name="login">Iniciar sesion</button><br>		
				</p>
				<p class="form_title">
					¿No tienes una cuenta?<br>
					<a class="link" href="register.php">Registrate</a> 
				</p>
			</form>
		</div>
		<script src="../javascript/form_validation.js"></script> <!-- Cargamos el script de validación clientside una vez ya realizado el formulario -->
	</body>
</html>