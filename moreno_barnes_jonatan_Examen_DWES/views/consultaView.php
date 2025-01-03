<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Examen </title>
</head>
<body>
<a href="index.php?controlador=index&accion=inicio">Menu  </a><button></button>
<ul>
    <li> <a href="index.php?controlador=index&accion=inicio">Inicio</a>  </li>
    <li><a href="index.php?controlador=index&accion=listarCitas">Reservar</a></li>
    <li><a href="index.php?controlador=index&accion=consultaReservas">Consulta</a></li>
</ul>

<h1>Consulta Reservas</h1>

<form method="get" action="index.php?controlador=index&accion=consultaReservas">
<input type="hidden" name="controlador" value="index">
<input type="hidden" name="accion" value="consultaReservas">

<?php echo isset( $errores[ "nif" ] ) ? "*":"" ?>
<label for="nif" >NIF</label>
<input type="text" name="nif" >
<br>

<?php echo isset( $errores[ "telefono" ] ) ? "*":"" ?>
<label for="telefono" >Telefono</label>
<input type="text" name="telefono" >
</br>



<input type="submit" name="submit" value="Aceptar">
<input type="submit" name="submit" value="Cancelar">
</form>

<?php 
if( isset( $errores ) ):
foreach( $errores as $key => $error ):
?>
</br> 
<?php 
echo $error;
endforeach; 
endif;
?>


</body>
</html>