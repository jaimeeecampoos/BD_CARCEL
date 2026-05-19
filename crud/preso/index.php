<?php require_once("../dbConnection.php"); ?>
<?php
$result = mysqli_query($mysqli, "
    SELECT pr.DNI, pe.NOMBRE, pe.APELLIDOS, pr.DELITO, pr.FECHA_INGRESO, 
           pr.GRADO_PELIGRO, pr.NOMBRE_BANDA
    FROM preso pr
    JOIN persona pe ON pr.DNI = pe.DNI
    ORDER BY pe.APELLIDOS
");
?>
<html>
<head><title>Gestión de Presos</title></head>
<body>
    <h2>Listado de Presos</h2>
    <p><a href="../index.php">← Menú principal</a> | <a href="add.php">Añadir preso</a></p>
    <table width="95%" border="1" cellpadding="5" cellspacing="0">
        <tr bgcolor="#DDDDDD">
            <td><strong>DNI</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Apellidos</strong></td>
            <td><strong>Delito</strong></td>
            <td><strong>Fecha Ingreso</strong></td>
            <td><strong>Grado Peligro</strong></td>
            <td><strong>Banda</strong></td>
            <td><strong>Acción</strong></td>
        </tr>
        <?php while ($res = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $res['DNI']; ?></td>
            <td><?php echo $res['NOMBRE']; ?></td>
            <td><?php echo $res['APELLIDOS']; ?></td>
            <td><?php echo $res['DELITO']; ?></td>
            <td><?php echo $res['FECHA_INGRESO']; ?></td>
            <td><?php echo $res['GRADO_PELIGRO']; ?></td>
            <td><?php echo $res['NOMBRE_BANDA']; ?></td>
            <td>
                <a href="edit.php?dni=<?php echo $res['DNI']; ?>">Editar</a> |
                <a href="delete.php?dni=<?php echo $res['DNI']; ?>" 
                   onclick="return confirm('¿Eliminar este preso?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
