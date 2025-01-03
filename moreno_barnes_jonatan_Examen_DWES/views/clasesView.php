<body>

	<h1>Selección Clases Gimnasio</h1>

	<form method="get" action="index.php?controlador=index&action=listarClases">
		<input type="hidden" name="controlador" value="index">
		<input type="hidden" name="accion" value="listarClases">


		<?php

		?>
		<?php
		foreach ($libros as $libro): ?>
			<label for="<?php echo 'libro' . " " . $libro['libro_id'] ?>"><?php echo  $libro['titulo'] . " " . $libro['autor'] . " " . $libro['categoria_id'] ?></label>
			<?php echo $libro['total'] ?>/<?php echo  $libro['cantidad'] ?>


			<input type="radio" name="<?php echo 'libro' . $libro['libro_id'] ?>" value="false" <?php echo $libro['reserva'] == false ? "checked" : "" ?> <?php echo $libro['activo'] == false ? "disabled" : "" ?>>

			<input type="radio" name="<?php echo 'libro' . $libro['libro_id'] ?>" value="true" <?php echo $libro['reserva'] == true ? "checked" : "" ?> <?php echo $libro['activo'] == false ? "disabled" : "" ?>>



			</br>

		<?php
		endforeach;
		?>


		<input type="submit" name="submit" value="Aceptar">
		<input type="submit" name="submit" value="Cancelar">
	</form>

	<?php
	?>

	<a href="index.php">Salir</a>

</body>

</html>