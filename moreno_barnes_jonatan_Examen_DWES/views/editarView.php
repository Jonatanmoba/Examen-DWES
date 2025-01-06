
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Examen DWES</title>
</head>
<body>

<a href="index.php?controlador=index&accion=inicio">Menu  </a><button></button>
<ul>
    <li> <a href="index.php?controlador=index&accion=inicio">Inicio</a>  </li>
    <li><a href="index.php?controlador=index&accion=listarCitas">Reservar</a></li>
    <li><a href="index.php?controlador=index&accion=consultaReservas">Consulta</a></li>
</ul>
<br>
<br>

<h1>Cita</h1>
Cita dia: <?php echo $cita['fecha']?><br>
Hora : <?php echo $cita['hora']?><br>

   

<form method="post" action="index.php?controlador=index&accion=editarCitas">

<input type="hidden" name="codigo" value="<?php echo $_REQUEST['codigo']?>">

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




</body>
</html>

