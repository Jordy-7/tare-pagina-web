<?php
$host = 'localhost'; 
$db = 'empresa'; 
$user = 'root'; 
$pass = ''; 

// Crear una conexión
$mysqli = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$mysqli->set_charset('utf8');
?>
