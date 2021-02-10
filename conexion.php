<?php


$servidor = "localhost";
$nombreUsuario = "root";
$password = "";
$db = "taller_bd";

// Conexión a la BBDD
$conexion = new mysqli($servidor, $nombreUsuario, $password, $db);

// Verificamos conexión
if ($conexion->connect_errno) {
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $conexion->connect_errno . "\n";
    echo "Error: " . $conexion->connect_error . "\n";
    exit;
}
