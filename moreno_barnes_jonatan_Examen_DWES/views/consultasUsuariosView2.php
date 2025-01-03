<body>
<a href="index.php?controlador=index&accion=inicio">Menu  </a><button></button>
<ul>
    <li> <a href="index.php?controlador=index&accion=inicio">Inicio</a>  </li>
    <li><a href="index.php?controlador=index&accion=listarCitas">Reservar</a></li>
    <li><a href="index.php?controlador=index&accion=consultaReservas">Consulta</a></li>
</ul>

	<h1>Listado Citas</h1>
        <table>
            <tr><th>Codigo </th><th>Fecha </th><th>Hora</th></tr>
            <?php ?>
            <tr><td>No existen citas </td></tr>
    </table>
			


			



			</br>

		<?php
		endforeach;
		?>


	

	<?php
	?>


</body>