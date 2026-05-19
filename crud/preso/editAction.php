<?php require_once("../dbConnection.php"); ?>
<?php
if (isset($_POST['update'])) {
    $dni           = mysqli_real_escape_string($mysqli, $_POST['dni']);
    $nombre        = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $apellidos     = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
    $tlfn          = mysqli_real_escape_string($mysqli, $_POST['tlfn']);
    $direccion     = mysqli_real_escape_string($mysqli, $_POST['direccion']);
    $delito        = mysqli_real_escape_string($mysqli, $_POST['delito']);
    $fecha_ingreso = mysqli_real_escape_string($mysqli, $_POST['fecha_ingreso']);
    $grado_peligro = mysqli_real_escape_string($mysqli, $_POST['grado_peligro']);
    $nombre_banda  = mysqli_real_escape_string($mysqli, $_POST['nombre_banda']);

    $tlfn_sql      = empty($tlfn)          ? "NULL" : "'$tlfn'";
    $direccion_sql = empty($direccion)     ? "NULL" : "'$direccion'";
    $fecha_sql     = empty($fecha_ingreso) ? "NULL" : "'$fecha_ingreso'";
    $grado_sql     = empty($grado_peligro) ? "NULL" : "'$grado_peligro'";
    $banda_sql     = empty($nombre_banda)  ? "NULL" : "'$nombre_banda'";

    $r1 = mysqli_query($mysqli, "UPDATE persona SET
        NOMBRE='$nombre', APELLIDOS='$apellidos', TLFN=$tlfn_sql, DIRECCION=$direccion_sql
        WHERE DNI='$dni'");

    $r2 = mysqli_query($mysqli, "UPDATE preso SET
        DELITO='$delito', FECHA_INGRESO=$fecha_sql, GRADO_PELIGRO=$grado_sql, NOMBRE_BANDA=$banda_sql
        WHERE DNI='$dni'");

    if ($r1 && $r2) {
        echo "<font color='green'>Preso actualizado correctamente.</font>";
        echo "<br/><a href='index.php'>Ver listado</a>";
    } else {
        echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    }
}
?>
