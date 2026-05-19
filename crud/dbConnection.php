<?php
$databaseHost     = '127.0.0.1';
$databaseName     = 'carcel';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("<font color='red'>Error de conexión: " . mysqli_connect_error() . "</font>");
}
