<?php require_once("../dbConnection.php"); ?>
<?php
if (isset($_POST['update'])) {
    $nombre_original   = mysqli_real_escape_string($mysqli, $_POST['nombre_actividad_original']);
    $nombre            = mysqli_real_escape_string($mysqli, $_POST['nombre_actividad']);
    $horario           = mysqli_real_escape_string($mysqli, $_POST['horario']);
    $lugar             = mysqli_real_escape_string($mysqli, $_POST['lugar']);
    $num_participantes = mysqli_real_escape_string($mysqli, $_POST['num_participantes']);

    $horario_sql = empty($horario)           ? "NULL" : "'$horario'";
    $lugar_sql   = empty($lugar)             ? "NULL" : "'$lugar'";
    $num_sql     = empty($num_participantes) ? "NULL" : "'$num_participantes'";

    $result = mysqli_query($mysqli, "UPDATE actividad SET
        NOMBRE_ACTIVIDAD='$nombre', HORARIO=$horario_sql, LUGAR=$lugar_sql, NUM_PARTICIPANTES=$num_sql
        WHERE NOMBRE_ACTIVIDAD='$nombre_original'");

    if ($result) {
        echo "<font color='green'>Actividad actualizada correctamente.</font>";
        echo "<br/><a href='index.php'>Ver listado</a>";
    } else {
        echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    }
}
?>
