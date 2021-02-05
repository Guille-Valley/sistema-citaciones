<?php

// Switch de filtrado principal de todas las funciones.
if (isset($_POST['nombre_funcion'])) {
    switch ($_POST['nombre_funcion']) {
        case 'inicio_sesion':
            inicioSesion();
            break;
        case 'cerrar_sesion';
            cerrarSesion();
            break;
        case 'registrar_usuario':
            registrarUsuario();
            break;
    }
}

// Comprobar si el inicio de sesión es correcto. - - - - - - - - - - - - - - - - - - - -
function inicioSesion()
{
    include('conexion.php');

    $sql = "SELECT * FROM usuarios WHERE correo= :micorreo AND contrasena= :micontrasena";
    $conexion = $base->prepare($sql);

    $correo = htmlentities(addslashes($_POST["correo"]));
    $contrasena = htmlentities(addslashes($_POST["contrasena"]));

    $conexion->bindValue(":micorreo", $correo);
    $conexion->bindValue(":micontrasena", $contrasena);
    $conexion->execute();

    // test para ver si nos devuelve algo.
    $existe_conexion = $conexion->rowCount();

    if ($existe_conexion != 0) {
        // INICIO SESIÓN - - - - - - - - - - - - - - - - - - - -
        session_start();
        $_SESSION["usuario"] = $_POST["correo"];

        // Cerramos la conexión con la BBDD
        $sql = null;
        $conexion = null;

        header("Location:index.php");
    } else {

        // Cerramos la conexión con la BBDD
        $sql = null;
        $conexion = null;

        echo "Usuario no encontrado!";
?>
        <br>
        <a href="index.php">Volver</a>
<?php
        exit();
    }
}

// CERRAR SESIÓN - - - - - - - - - - - - - - - - - - - -
function cerrarSesion()
{
    session_start();

    session_destroy();

    header("Location:index.php");
}

// REGISTRAR NUEVO USUARIO - - - - - - - - - - - - - - - - - - - -
function registrarUsuario()
{
    include('../conexion.php');

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];


    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, telefono, direccion) VALUES (?,?,?,?,?,?)";
    $consulta = $conexion->prepare($sql);

    $consulta->bind_param("ssssis", $nombre, $apellido, $correo, $contrasena, $telefono, $direccion);
    $consulta->execute();

    $conexion->close();
    $consulta->close();

    header("Location:../index.php");
}
