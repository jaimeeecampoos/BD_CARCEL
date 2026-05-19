<?php require_once("../dbConnection.php"); ?>
<?php
if (isset($_POST['submit'])) {
    $dni           = mysqli_real_escape_string($mysqli, $_POST['dni']);
    $nombre        = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $apellidos     = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
    $tlfn          = mysqli_real_escape_string($mysqli, $_POST['tlfn']);
    $direccion     = mysqli_real_escape_string($mysqli, $_POST['direccion']);
    $delito        = mysqli_real_escape_string($mysqli, $_POST['delito']);
    $fecha_ingreso = mysqli_real_escape_string($mysqli, $_POST['fecha_ingreso']);
    $grado_peligro = mysqli_real_escape_string($mysqli, $_POST['grado_peligro']);
    $nombre_banda  = mysqli_real_escape_string($mysqli, $_POST['nombre_banda']);

    if (empty($dni) || empty($nombre) || empty($apellidos)) {
        echo "<font color='red'>DNI, Nombre y Apellidos son obligatorios.</font>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $tlfn_sql      = empty($tlfn)          ? "NULL" : "'$tlfn'";
        $direccion_sql = empty($direccion)     ? "NULL" : "'$direccion'";
        $fecha_sql     = empty($fecha_ingreso) ? "NULL" : "'$fecha_ingreso'";
        $grado_sql     = empty($grado_peligro) ? "NULL" : "'$grado_peligro'";
        $banda_sql     = empty($nombre_banda)  ? "NULL" : "'$nombre_banda'";

        $r1 = mysqli_query($mysqli, "INSERT INTO persona (DNI, NOMBRE, APELLIDOS, TLFN, DIRECCION)
            VALUES ('$dni', '$nombre', '$apellidos', $tlfn_sql, $direccion_sql)");

        $r2 = mysqli_query($mysqli, "INSERT INTO preso (DNI, DELITO, FECHA_INGRESO, GRADO_PELIGRO, NOMBRE_BANDA)
            VALUES ('$dni', '$delito', $fecha_sql, $grado_sql, $banda_sql)");

        if ($r1 && $r2) {
            echo "<font color='green'>Preso añadido correctamente.</font>";
            echo "<br/><a href='index.php'>Ver listado</a>";
        } else {
            echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
            echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
    }
}
?>
