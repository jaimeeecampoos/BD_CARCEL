<?php require_once("../dbConnection.php"); ?>
<?php
$result = mysqli_query($mysqli, "
    SELECT r.ID,
           CONCAT(pe.NOMBRE, ' ', pe.APELLIDOS) AS NOMBRE_PRESO,
           r.DNI_PRESO,
           r.NOMBRE_ACTIVIDAD,
           a.HORARIO,
           a.LUGAR,
           r.NUM_ASISTENCIA,
           r.FECHA_INICIO,
           r.FECHA_FIN
    FROM realiza r
    JOIN preso p   ON r.DNI_PRESO = p.DNI
    JOIN persona pe ON p.DNI = pe.DNI
    JOIN actividad a ON r.NOMBRE_ACTIVIDAD = a.NOMBRE_ACTIVIDAD
    ORDER BY r.ID DESC
");
?>
<html>
<head><title>Actividades realizadas por presos</title></head>
<body>
    <h2>Actividades realizadas por presos</h2>
    <p><a href="../index.php">← Menú principal</a> | <a href="add.php">Añadir registro</a></p>
    <table width="95%" border="1" cellpadding="5" cellspacing="0">
        <tr bgcolor="#DDDDDD">
            <td><strong>ID</strong></td>
            <td><strong>Preso</strong></td>
            <td><strong>DNI</strong></td>
            <td><strong>Actividad</strong></td>
            <td><strong>Horario</strong></td>
            <td><strong>Lugar</strong></td>
            <td><strong>Nº Asistencias</strong></td>
            <td><strong>Fecha Inicio</strong></td>
            <td><strong>Fecha Fin</strong></td>
            <td><strong>Acción</strong></td>
        </tr>
        <?php while ($res = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $res['ID']; ?></td>
            <td><?php echo $res['NOMBRE_PRESO']; ?></td>
            <td><?php echo $res['DNI_PRESO']; ?></td>
            <td><?php echo $res['NOMBRE_ACTIVIDAD']; ?></td>
            <td><?php echo $res['HORARIO']; ?></td>
            <td><?php echo $res['LUGAR']; ?></td>
            <td><?php echo $res['NUM_ASISTENCIA']; ?></td>
            <td><?php echo $res['FECHA_INICIO']; ?></td>
            <td><?php echo $res['FECHA_FIN']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $res['ID']; ?>">Editar</a> |
                <a href="delete.php?id=<?php echo $res['ID']; ?>"
                   onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
