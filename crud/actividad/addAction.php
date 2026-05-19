<?php require_once("../dbConnection.php"); ?>
<?php
if (isset($_POST['submit'])) {
    $nombre          = mysqli_real_escape_string($mysqli, $_POST['nombre_actividad']);
    $horario         = mysqli_real_escape_string($mysqli, $_POST['horario']);
    $lugar           = mysqli_real_escape_string($mysqli, $_POST['lugar']);
    $num_participantes = mysqli_real_escape_string($mysqli, $_POST['num_participantes']);

    if (empty($nombre)) {
        echo "<font color='red'>El nombre de la actividad es obligatorio.</font>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $horario_sql   = empty($horario)           ? "NULL" : "'$horario'";
        $lugar_sql     = empty($lugar)             ? "NULL" : "'$lugar'";
        $num_sql       = empty($num_participantes) ? "NULL" : "'$num_participantes'";

        $result = mysqli_query($mysqli, "INSERT INTO actividad (NOMBRE_ACTIVIDAD, HORARIO, LUGAR, NUM_PARTICIPANTES)
            VALUES ('$nombre', $horario_sql, $lugar_sql, $num_sql)");

        if ($result) {
            echo "<font color='green'>Actividad añadida correctamente.</font>";
            echo "<br/><a href='index.php'>Ver listado</a>";
        } else {
            echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
            echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
    }
}
?>
