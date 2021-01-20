<?php

// Comprobar si el inicio de sesión es correcto.
if (isset($_POST['inicioSesion'])) {

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
        // INICIO SESIÓN --------------------
        session_start();
        $_SESSION["usuario"] = $_POST["correo"];

        // Cerramos la conexión con la BBDD
        $sql = null;
        $conexion = null;

        header("Location:index.php");
    } else {
        echo "Usuario no encontrado!";
?>
        <br>
        <a href="index.php">Volver</a>
<?php
        exit();
    }
}
// CERRAR SESIÓN --------------------
if (isset($_POST['cerrarSesion'])) {

    session_start();

    session_destroy();

    header("Location:index.php");
}
