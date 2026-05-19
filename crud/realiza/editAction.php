<?php require_once("../dbConnection.php"); ?>
<?php
if (isset($_POST['update'])) {
    $id               = mysqli_real_escape_string($mysqli, $_POST['id']);
    $dni_preso        = mysqli_real_escape_string($mysqli, $_POST['dni_preso']);
    $nombre_actividad = mysqli_real_escape_string($mysqli, $_POST['nombre_actividad']);
    $num_asistencia   = mysqli_real_escape_string($mysqli, $_POST['num_asistencia']);
    $fecha_inicio     = mysqli_real_escape_string($mysqli, $_POST['fecha_inicio']);
    $fecha_fin        = mysqli_real_escape_string($mysqli, $_POST['fecha_fin']);

    $num_sql    = empty($num_asistencia) ? "NULL" : "'$num_asistencia'";
    $inicio_sql = empty($fecha_inicio)   ? "NULL" : "'$fecha_inicio'";
    $fin_sql    = empty($fecha_fin)      ? "NULL" : "'$fecha_fin'";

    $result = mysqli_query($mysqli, "UPDATE realiza SET
        DNI_PRESO='$dni_preso',
        NOMBRE_ACTIVIDAD='$nombre_actividad',
        NUM_ASISTENCIA=$num_sql,
        FECHA_INICIO=$inicio_sql,
        FECHA_FIN=$fin_sql
        WHERE ID=$id");

    if ($result) {
        echo "<font color='green'>Registro actualizado correctamente.</font>";
        echo "<br/><a href='index.php'>Ver listado</a>";
    } else {
        echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    }
}
?>
