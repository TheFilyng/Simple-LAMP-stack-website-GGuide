<?php
	//Cierra la sesión php cuando un usuario cierra sesión y redirige a la pantalla de inicio.
	session_start();
	unset($_SESSION); 
	session_destroy();
	session_write_close();
	header('Location: index.php');
	die; 
?>