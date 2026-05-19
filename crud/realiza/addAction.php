<?php require_once("../dbConnection.php"); ?>
<?php
if (isset($_POST['submit'])) {
    $dni_preso        = mysqli_real_escape_string($mysqli, $_POST['dni_preso']);
    $nombre_actividad = mysqli_real_escape_string($mysqli, $_POST['nombre_actividad']);
    $num_asistencia   = mysqli_real_escape_string($mysqli, $_POST['num_asistencia']);
    $fecha_inicio     = mysqli_real_escape_string($mysqli, $_POST['fecha_inicio']);
    $fecha_fin        = mysqli_real_escape_string($mysqli, $_POST['fecha_fin']);

    if (empty($dni_preso) || empty($nombre_actividad)) {
        echo "<font color='red'>Preso y Actividad son obligatorios.</font>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $num_sql   = empty($num_asistencia) ? "NULL" : "'$num_asistencia'";
        $inicio_sql = empty($fecha_inicio)  ? "NULL" : "'$fecha_inicio'";
        $fin_sql    = empty($fecha_fin)     ? "NULL" : "'$fecha_fin'";

        $result = mysqli_query($mysqli, "INSERT INTO realiza (DNI_PRESO, NOMBRE_ACTIVIDAD, NUM_ASISTENCIA, FECHA_INICIO, FECHA_FIN)
            VALUES ('$dni_preso', '$nombre_actividad', $num_sql, $inicio_sql, $fin_sql)");

        if ($result) {
            echo "<font color='green'>Registro añadido correctamente.</font>";
            echo "<br/><a href='index.php'>Ver listado</a>";
        } else {
            echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
            echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
    }
}
?>
