<a href="index.php?controlador=index&accion=inicio">Menu</a><button></button>
<ul>
    <li><a href="index.php?controlador=index&accion=inicio">Inicio</a></li>
    <li><a href="index.php?controlador=index&accion=listarCitas">Reservar</a></li>
    <li><a href="index.php?controlador=index&accion=consultaReservas">Consulta</a></li>
</ul>

<h1>Cita</h1>
<p>Cita día: <?php echo htmlspecialchars($cita['fecha'] ?? ''); ?><br>
Hora: <?php echo htmlspecialchars($cita['hora'] ?? ''); ?></p>

<form method="post" action="index.php?controlador=index&accion=editarCitas">
    <input type="hidden" name="codigo" value="<?php echo htmlspecialchars($_SESSION['codigo'] ?? ''); ?>">

    <!-- Campo DNI -->
    <label for="dni">DNI</label>
    <input type="text" name="dni" id="dni" value="<?php echo htmlspecialchars($_REQUEST['dni'] ?? ''); ?>">
    <?php echo isset($errores['dni']) ? "<span class='error'>{$errores['dni']}</span>" : ''; ?>
    <br>

    <!-- Campo Nombre -->
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($_REQUEST['nombre'] ?? ''); ?>">
    <?php echo isset($errores['nombre']) ? "<span class='error'>{$errores['nombre']}</span>" : ''; ?>
    <br>

    <!-- Campo Apellidos -->
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($_REQUEST['apellidos'] ?? ''); ?>">
    <?php echo isset($errores['apellidos']) ? "<span class='error'>{$errores['apellidos']}</span>" : ''; ?>
    <br>

    <!-- Campo Teléfono -->
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($_REQUEST['telefono'] ?? ''); ?>">
    <?php echo isset($errores['telefono']) ? "<span class='error'>{$errores['telefono']}</span>" : ''; ?>
    <br>

    <!-- Campo Email -->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($_REQUEST['email'] ?? ''); ?>">
    <?php echo isset($errores['email']) ? "<span class='error'>{$errores['email']}</span>" : ''; ?>
    <br>

    <!-- Botones -->
    <button type="submit" name="submit" value="aceptar">Aceptar</button>
    <button type="submit" name="submit" value="cancelar">Cancelar</button>
</form>

