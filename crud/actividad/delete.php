<?php require_once("../dbConnection.php"); ?>
<?php
$nombre = mysqli_real_escape_string($mysqli, $_GET['nombre']);
mysqli_query($mysqli, "DELETE FROM actividad WHERE NOMBRE_ACTIVIDAD = '$nombre'");
header("Location: index.php");
?>
