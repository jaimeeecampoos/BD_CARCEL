<?php require_once("../dbConnection.php"); ?>
<?php
$result = mysqli_query($mysqli, "SELECT * FROM actividad ORDER BY NOMBRE_ACTIVIDAD");
?>
<html>
<head><title>Gestión de Actividades</title></head>
<body>
    <h2>Listado de Actividades</h2>
    <p><a href="../index.php">← Menú principal</a> | <a href="add.php">Añadir actividad</a></p>
    <table width="80%" border="1" cellpadding="5" cellspacing="0">
        <tr bgcolor="#DDDDDD">
            <td><strong>Nombre Actividad</strong></td>
            <td><strong>Horario</strong></td>
            <td><strong>Lugar</strong></td>
            <td><strong>Nº Participantes</strong></td>
            <td><strong>Acción</strong></td>
        </tr>
        <?php while ($res = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $res['NOMBRE_ACTIVIDAD']; ?></td>
            <td><?php echo $res['HORARIO']; ?></td>
            <td><?php echo $res['LUGAR']; ?></td>
            <td><?php echo $res['NUM_PARTICIPANTES']; ?></td>
            <td>
                <a href="edit.php?nombre=<?php echo urlencode($res['NOMBRE_ACTIVIDAD']); ?>">Editar</a> |
                <a href="delete.php?nombre=<?php echo urlencode($res['NOMBRE_ACTIVIDAD']); ?>"
                   onclick="return confirm('¿Eliminar esta actividad?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
