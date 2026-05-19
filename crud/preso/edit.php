<?php require_once("../dbConnection.php"); ?>
<?php
$dni    = mysqli_real_escape_string($mysqli, $_GET['dni']);
$result = mysqli_query($mysqli, "
    SELECT pr.*, pe.NOMBRE, pe.APELLIDOS, pe.TLFN, pe.DIRECCION
    FROM preso pr JOIN persona pe ON pr.DNI = pe.DNI
    WHERE pr.DNI = '$dni'
");
$row    = mysqli_fetch_assoc($result);
$bandas = mysqli_query($mysqli, "SELECT NOMBRE_BANDA FROM banda ORDER BY NOMBRE_BANDA");
?>
<html>
<head><title>Editar Preso</title></head>
<body>
    <h2>Editar preso</h2>
    <p><a href="index.php">← Volver al listado</a></p>
    <form method="post" action="editAction.php">
        <input type="hidden" name="dni" value="<?php echo $row['DNI']; ?>">
        <table border="0" cellpadding="5">
            <tr><td>DNI</td><td><strong><?php echo $row['DNI']; ?></strong></td></tr>
            <tr><td>Nombre</td><td><input type="text" name="nombre" value="<?php echo $row['NOMBRE']; ?>" maxlength="30" required></td></tr>
            <tr><td>Apellidos</td><td><input type="text" name="apellidos" value="<?php echo $row['APELLIDOS']; ?>" maxlength="50" required></td></tr>
            <tr><td>Teléfono</td><td><input type="number" name="tlfn" value="<?php echo $row['TLFN']; ?>"></td></tr>
            <tr><td>Dirección</td><td><input type="text" name="direccion" value="<?php echo $row['DIRECCION']; ?>" maxlength="100"></td></tr>
            <tr><td>Delito</td><td><input type="text" name="delito" value="<?php echo $row['DELITO']; ?>" maxlength="50"></td></tr>
            <tr><td>Fecha Ingreso</td><td><input type="date" name="fecha_ingreso" value="<?php echo $row['FECHA_INGRESO']; ?>"></td></tr>
            <tr>
                <td>Grado Peligro</td>
                <td>
                    <select name="grado_peligro">
                        <option value="">-- Selecciona --</option>
                        <?php foreach (['Bajo','Medio','Alto','Muy alto'] as $g) { ?>
                            <option value="<?php echo $g; ?>" <?php if ($row['GRADO_PELIGRO']==$g) echo 'selected'; ?>>
                                <?php echo $g; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Banda</td>
                <td>
                    <select name="nombre_banda">
                        <option value="">-- Sin banda --</option>
                        <?php while ($b = mysqli_fetch_assoc($bandas)) { ?>
                            <option value="<?php echo $b['NOMBRE_BANDA']; ?>"
                                <?php if ($row['NOMBRE_BANDA']==$b['NOMBRE_BANDA']) echo 'selected'; ?>>
                                <?php echo $b['NOMBRE_BANDA']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr><td></td><td><input type="submit" name="update" value="Actualizar"></td></tr>
        </table>
    </form>
</body>
</html>
