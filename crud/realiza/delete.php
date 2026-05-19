<?php require_once("../dbConnection.php"); ?>
<?php
$id = mysqli_real_escape_string($mysqli, $_GET['id']);
mysqli_query($mysqli, "DELETE FROM realiza WHERE ID = $id");
header("Location: index.php");
?>
