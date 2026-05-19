<?php require_once("../dbConnection.php"); ?>
<?php
$presos     = mysqli_query($mysqli, "
    SELECT p.DNI, CONCAT(pe.NOMBRE, ' ', pe.APELLIDOS, ' (', p.DNI, ')') AS NOMBRE_COMPLETO
    FROM preso p JOIN persona pe ON p.DNI = pe.DNI ORDER BY pe.APELLIDOS");
$actividades = mysqli_query($mysqli, "SELECT NOMBRE_ACTIVIDAD FROM actividad ORDER BY NOMBRE_ACTIVIDAD");
?>
<html>
<head><title>Añadir registro</title></head>
<body>
    <h2>Añadir actividad realizada por un preso</h2>
    <p><a href="index.php">← Volver al listado</a></p>
    <form action="addAction.php" method="post">
        <table border="0" cellpadding="5">
            <tr>
                <td>Preso</td>
                <td>
                    <select name="dni_preso" required>
                        <option value="">-- Selecciona un preso --</option>
                        <?php while ($p = mysqli_fetch_assoc($presos)) { ?>
                            <option value="<?php echo $p['DNI']; ?>"><?php echo $p['NOMBRE_COMPLETO']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Actividad</td>
                <td>
                    <select name="nombre_actividad" required>
                        <option value="">-- Selecciona una actividad --</option>
                        <?php while ($a = mysqli_fetch_assoc($actividades)) { ?>
                            <option value="<?php echo $a['NOMBRE_ACTIVIDAD']; ?>"><?php echo $a['NOMBRE_ACTIVIDAD']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr><td>Nº Asistencias</td><td><input type="number" name="num_asistencia" min="0"></td></tr>
            <tr><td>Fecha Inicio</td><td><input type="date" name="fecha_inicio"></td></tr>
            <tr><td>Fecha Fin</td><td><input type="date" name="fecha_fin"></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Añadir"></td></tr>
        </table>
    </form>
</body>
</html>
