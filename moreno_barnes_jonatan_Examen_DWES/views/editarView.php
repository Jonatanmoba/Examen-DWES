
<a href="index.php?controlador=index&accion=inicio">Menu  </a><button></button>
<ul>
    <li> <a href="index.php?controlador=index&accion=inicio">Inicio</a>  </li>
    <li><a href="index.php?controlador=index&accion=listarCitas">Reservar</a></li>
    <li><a href="index.php?controlador=index&accion=consultaReservas">Consulta</a></li>
</ul>
<h1>Cita</h1>
Cita dia: <?php echo $cita['fecha']?><br>
Hora : <?php echo $cita['hora']?><br>

   

<form method="get" action="index.php?controlador=index&accion=editarCitas&codigo=<?php echo $codigo['codigo']?>">
<input type="hidden" name="controlador" value="index">
<input type="hidden" name="accion" value="editarCitas">

<?php echo isset( $errores[ "nif" ] ) ? "*":"" ?>
<label for="nif" >NIF</label>
<input type="text" name="nif" >
<br>

<?php echo isset( $errores[ "nombre" ] ) ? "*":"" ?>
<label for="nombre" >nombre</label>
<input type="text" name="nombre" >
<br>

<?php echo isset( $errores[ "apellido" ] ) ? "*":"" ?>
<label for="apellido" >Apellido</label>
<input type="text" name="apellido" >
<br>
<?php echo isset( $errores[ "telefono" ] ) ? "*":"" ?>
<label for="telefono" >Telefono</label>
<input type="text" name="telefono" >
<br>
<?php echo isset( $errores[ "email" ] ) ? "*":"" ?>
<label for="email" >Email</label>
<input type="text" name="email" >
</br>



<input type="submit" name="submit" value="Aceptar">
<input type="submit" name="submit" value="Cancelar">
    
   
</form>

<?php
foreach ($errores as $item) {
?>
    <?= $item ?>
    <br>
<?php
}
?>
