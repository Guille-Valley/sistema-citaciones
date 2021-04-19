<?php

$nombre;
$username;

function usuarioExiste($usuario, $contrasena)
{

    //$md5pass = md5($contrasena);

    include('conexion.php');

    $consulta = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :micorreo AND contrasena = :micontrasena');

    $consulta->execute(['micorreo' => $usuario, 'micontrasena' => $contrasena]);

    if ($consulta->rowCount()) {
        return true;
    } else {
        return false;
    }

    $conexion->close();
}

