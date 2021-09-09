<?php if (count($errors) > 0): ?>
		<?php
		foreach ($errors as $error) { //Muestra en pantalla cada uno de los errores y un salto de linea para que no se concatenen.
			echo $error;
			echo "<br>";
		}
		?>
<?php endif ?>
