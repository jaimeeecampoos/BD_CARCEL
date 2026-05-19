<?php require_once("../dbConnection.php"); ?>
<?php
$id     = mysqli_real_escape_string($mysqli, $_GET['id']);
$result = mysqli_query($mysqli, "SELECT * FROM realiza WHERE ID = $id");
$row    = mysqli_fetch_assoc($result);
$presos = mysqli_query($mysqli, "
    SELECT p.DNI, CONCAT(pe.NOMBRE, ' ', pe.APELLIDOS, ' (', p.DNI, ')') AS NOMBRE_COMPLETO
    FROM preso p JOIN persona pe ON p.DNI = pe.DNI ORDER BY pe.APELLIDOS");
$actividades = mysqli_query($mysqli, "SELECT NOMBRE_ACTIVIDAD FROM actividad ORDER BY NOMBRE_ACTIVIDAD");
?>
<html>
<head><title>Editar registro</title></head>
<body>
    <h2>Editar actividad realizada</h2>
    <p><a href="index.php">← Volver al listado</a></p>
    <form method="post" action="editAction.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table border="0" cellpadding="5">
            <tr>
                <td>Preso</td>
                <td>
                    <select name="dni_preso" required>
                        <?php while ($p = mysqli_fetch_assoc($presos)) { ?>
                            <option value="<?php echo $p['DNI']; ?>"
                                <?php if ($p['DNI'] == $row['DNI_PRESO']) echo 'selected'; ?>>
                                <?php echo $p['NOMBRE_COMPLETO']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Actividad</td>
                <td>
                    <select name="nombre_actividad" required>
                        <?php while ($a = mysqli_fetch_assoc($actividades)) { ?>
                            <option value="<?php echo $a['NOMBRE_ACTIVIDAD']; ?>"
                                <?php if ($a['NOMBRE_ACTIVIDAD'] == $row['NOMBRE_ACTIVIDAD']) echo 'selected'; ?>>
                                <?php echo $a['NOMBRE_ACTIVIDAD']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr><td>Nº Asistencias</td><td><input type="number" name="num_asistencia" value="<?php echo $row['NUM_ASISTENCIA']; ?>" min="0"></td></tr>
            <tr><td>Fecha Inicio</td><td><input type="date" name="fecha_inicio" value="<?php echo $row['FECHA_INICIO']; ?>"></td></tr>
            <tr><td>Fecha Fin</td><td><input type="date" name="fecha_fin" value="<?php echo $row['FECHA_FIN']; ?>"></td></tr>
            <tr><td></td><td><input type="submit" name="update" value="Actualizar"></td></tr>
        </table>
    </form>
</body>
</html>
