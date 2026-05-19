<?php
$databaseHost     = 'sql208.infinityfree.com';
$databaseName     = 'if0_41889041_carcel';
$databaseUsername = 'if0_41889041';
$databasePassword = 'BCL8D3boMPmldj0';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("<font color='red'>Error de conexión: " . mysqli_connect_error() . "</font>");
}
