<?php if (count($exitos) > 0): ?>
	<div class="exito">
		<?php
		foreach ($exitos as $exito) { //Muestra en pantalla el mensaje de éxito. Solo pueden ser 2: Si se ha subido el tutorial o si se ha registrado correctamente.
			echo $exito;
			echo "<br>";
		}
		?>
	</div>
<?php endif ?>
