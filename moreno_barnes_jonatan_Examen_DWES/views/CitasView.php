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
            <?php
		foreach ($citas as $cita): ?>
        <tr><td><?php echo $cita['cita_id']. ' ' ?></td><td><?php echo $cita['fecha']. ' '?></td><td><?php echo $cita['hora'] . ' '?>  <a href="index.php?controlador=index&accion=editarCitas&codigo=<?php echo $cita['cita_id']?>">Editar</a></td></tr>
        
        
        
        
        
        
        
    
    <?php
		endforeach;
		?>
        </table>


	

	<?php
	?>


</body>

</html>