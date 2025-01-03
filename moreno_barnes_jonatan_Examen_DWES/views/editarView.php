
<a href="index.php?controlador=index&accion=inicio">Menu  </a><button></button>
<ul>
    <li> <a href="index.php?controlador=index&accion=inicio">Inicio</a>  </li>
    <li><a href="index.php?controlador=index&accion=listarCitas">Reservar</a></li>
    <li><a href="index.php?controlador=index&accion=consultaReservas">Consulta</a></li>
</ul>
<h1>Cita</h1>
Cita dia: <?php echo $cita['fecha']?><br>
Hora : <?php echo $cita['hora']?><br>

   

<form method="post" action="index.php?controlador=index&accion=editarCitas">

<input type="hidden" name="codigo" value="<?php echo $_SESSION['codigo']?>">

<?php echo isset( $errores[ "dni" ] ) ? "*":"" ?>
<label for="nif" >NIF</label>
<input type="text" name="dni" >
<br>

<?php echo isset( $errores[ "nombre" ] ) ? "*":"" ?>
<label for="nombre" >nombre</label>
<input type="text" name="nombre" >
<br>

<?php echo isset( $errores[ "apellidos" ] ) ? "*":"" ?>
<label for="apellido" >Apellido</label>
<input type="text" name="apellidos" >
<br>
<?php echo isset( $errores[ "telefono" ] ) ? "*":"" ?>
<label for="telefono" >Telefono</label>
<input type="text" name="telefono" >
<br>
<?php echo isset( $errores[ "email" ] ) ? "*":"" ?>
<label for="email" >Email</label>
<input type="text" name="email" >
</br>



<input type="submit" name="submit" value="aceptar">
<input type="submit" name="submit" value="cancelar">
    
   
</form>

<?php
foreach ($errores as $item) {
?>
    <?= $item ?>
    <br>
<?php
}
?>
