<?php require_once("../dbConnection.php"); ?>
<?php
$bandas = mysqli_query($mysqli, "SELECT NOMBRE_BANDA FROM banda ORDER BY NOMBRE_BANDA");
?>
<html>
<head><title>Añadir Preso</title></head>
<body>
    <h2>Añadir nuevo preso</h2>
    <p><a href="index.php">← Volver al listado</a></p>
    <form action="addAction.php" method="post">
        <table border="0" cellpadding="5">
            <tr><td>DNI</td><td><input type="text" name="dni" maxlength="9" required></td></tr>
            <tr><td>Nombre</td><td><input type="text" name="nombre" maxlength="30" required></td></tr>
            <tr><td>Apellidos</td><td><input type="text" name="apellidos" maxlength="50" required></td></tr>
            <tr><td>Teléfono</td><td><input type="number" name="tlfn"></td></tr>
            <tr><td>Dirección</td><td><input type="text" name="direccion" maxlength="100"></td></tr>
            <tr><td>Delito</td><td><input type="text" name="delito" maxlength="50"></td></tr>
            <tr><td>Fecha Ingreso</td><td><input type="date" name="fecha_ingreso"></td></tr>
            <tr>
                <td>Grado Peligro</td>
                <td>
                    <select name="grado_peligro">
                        <option value="">-- Selecciona --</option>
                        <option value="Bajo">Bajo</option>
                        <option value="Medio">Medio</option>
                        <option value="Alto">Alto</option>
                        <option value="Muy alto">Muy alto</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Banda</td>
                <td>
                    <select name="nombre_banda">
                        <option value="">-- Sin banda --</option>
                        <?php while ($b = mysqli_fetch_assoc($bandas)) { ?>
                            <option value="<?php echo $b['NOMBRE_BANDA']; ?>"><?php echo $b['NOMBRE_BANDA']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr><td></td><td><input type="submit" name="submit" value="Añadir"></td></tr>
        </table>
    </form>
</body>
</html>
