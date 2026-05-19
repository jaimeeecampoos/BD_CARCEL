<?php require_once("../dbConnection.php"); ?>
<?php
$nombre = mysqli_real_escape_string($mysqli, $_GET['nombre']);
$result = mysqli_query($mysqli, "SELECT * FROM actividad WHERE NOMBRE_ACTIVIDAD = '$nombre'");
$row    = mysqli_fetch_assoc($result);
?>
<html>
<head><title>Editar Actividad</title></head>
<body>
    <h2>Editar actividad</h2>
    <p><a href="index.php">← Volver al listado</a></p>
    <form method="post" action="editAction.php">
        <input type="hidden" name="nombre_actividad_original" value="<?php echo $row['NOMBRE_ACTIVIDAD']; ?>">
        <table border="0" cellpadding="5">
            <tr><td>Nombre Actividad</td><td><input type="text" name="nombre_actividad" value="<?php echo $row['NOMBRE_ACTIVIDAD']; ?>" maxlength="50" required></td></tr>
            <tr><td>Horario</td><td><input type="text" name="horario" value="<?php echo $row['HORARIO']; ?>" maxlength="50"></td></tr>
            <tr><td>Lugar</td><td><input type="text" name="lugar" value="<?php echo $row['LUGAR']; ?>" maxlength="50"></td></tr>
            <tr><td>Nº Participantes</td><td><input type="number" name="num_participantes" value="<?php echo $row['NUM_PARTICIPANTES']; ?>" min="0"></td></tr>
            <tr><td></td><td><input type="submit" name="update" value="Actualizar"></td></tr>
        </table>
    </form>
</body>
</html>
