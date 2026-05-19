<?php require_once("../dbConnection.php"); ?>
<?php
$dni = mysqli_real_escape_string($mysqli, $_GET['dni']);
// Al borrar en persona se borra en cascada en preso
mysqli_query($mysqli, "DELETE FROM persona WHERE DNI = '$dni'");
header("Location: index.php");
?>
