<?php

// Switch de filtrado principal de todas las funciones.
if (isset($_POST['nombre_funcion'])) {
    switch ($_POST['nombre_funcion']) {
        case 'inicio_sesion':
            inicioSesion();
            break;
        case 'cerrar_sesion':
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

    include('../conexion.php');

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta preparada
    $sql = "SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?";

    $consulta = $conexion->prepare($sql);

    if ($consulta) {

        $consulta->bind_param("ss", $correo, $contrasena);
        $consulta->execute();

        // Conocer si devuelve una coincidencia de inicio de sesión.
        $resultado = $consulta->get_result();

        if ($resultado) {
            session_start();
            // Adjudicamos usuario a la sesión
            $_SESSION['usuario'] = $correo;

            header("Location:../principal-registrados.php");
        } else {
            echo "Cuenta no registrada";
?>
            <a href="../index.php">Vovler</a>
        <?php

        }
    } else {
        echo "Cuenta no registrada";
        ?>
        <a href="../index.php">Vovler</a>
<?php
    }
    $conexion->close();
}

// CERRAR SESIÓN - - - - - - - - - - - - - - - - - - - -
function cerrarSesion()
{

    session_start();
    // remove all session variables
    session_unset();

    // destroy the session 
    session_destroy();

    // Redirect to home
    header("Location: ../index.php");
    exit();
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

    // Almacena la consulta SQL en una variable.
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, telefono, direccion) VALUES (?,?,?,?,?,?)";
    // Prepara una sentencia SQL para su ejecución.
    $consulta = $conexion->prepare($sql);
    // Agrega variables a una sentencia preparada como parámetros. 
    // Las "s" hacen referencia a que vamos a pasar un String, cadenas. 
    // Las "i", a int, enteros.
    $consulta->bind_param("ssssis", $nombre, $apellido, $correo, $contrasena, $telefono, $direccion);
    // Ejecuta la consulta a la BBDD.
    $consulta->execute();
    // Cierra sentencia y conexión.
    $consulta->close();
    $conexion->close();

    // Redirige a la página deseada.
    header("Location:../index.php");
}

function getCalendario()
{
    include('../conexion.php');

    if ($consulta = $conexion->prepare("SELECT dia, mes FROM calendario ORDER BY id_mes")) {

        $consulta->execute();
        //  Vincula variables a una sentencia preparada para el almacenamiento de resultados.
        $consulta->bind_result($dia, $mes);

        /* obtener valor */
        while ($consulta->fetch()) {

            printf("%s %s\n", $dia . $mes);
        }


        /* cerrar sentencia */
        $consulta->close();
    }

    /* cerrar conexión */
    $conexion->close();
}
