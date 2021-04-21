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
        case 'confirmar_fecha':
            confirmarFecha();
    }
}

// Comprobar si el inicio de sesión es correcto. - - - - - - - - - - - - - - - - - - - -
function inicioSesion()
{

    include('conexion.php');

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta preparada
    $sql = "SELECT id FROM usuario WHERE correo = ? AND contrasena = ?";

    $consulta = $conexion->prepare($sql);

    if ($consulta) {

        $consulta->bind_param("ss", $correo, $contrasena);
        $consulta->execute();

        // Test si devuelve alguna fila.
        //$consulta->store_result();

        $resultado = $consulta->get_result();   // Obtenemos un objeto
        if ($resultado->num_rows > 0) {

            session_start();

            while ($dato = $resultado->fetch_assoc()) {
                echo $dato['id'];
                $_SESSION['usuario'] = $dato['id'];
            }


            //$existe_conexion = $consulta->num_rows;

            // if ($existe_conexion != 0) {
            //session_start();



            // Adjudicamos el id del usuario a la sesión.
            // $consulta->fetch_assoc();
            //echo " PISTA 2 " . $actor['id'];

            //$_SESSION['usuario'] = $consulta;





            header("Location:principal-registrados.php");
        } else {
            echo "Cuenta no registrada";
?>
            <a href="index.php">Vovler</a>
        <?php

        }
    } else {
        echo "Cuenta no registrada";
        ?>
        <a href="index.php">Vovler</a>
<?php
    }
    $consulta->close();
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
    header("Location:index.php");
    exit();
}

// REGISTRAR NUEVO USUARIO - - - - - - - - - - - - - - - - - - - -
function registrarUsuario()
{
    include('conexion.php');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    // Almacena la consulta SQL en una variable.
    $sql = "INSERT INTO usuario (nombre, apellido, correo, contrasena, telefono, direccion) VALUES (?,?,?,?,?,?)";
    // Prepara una sentencia SQL para su ejecución.
    $consulta = $conexion->prepare($sql);
    // Agrega variables a una sentencia preparada como parámetros. 
    $consulta->bind_param("ssssis", $nombre, $apellido, $correo, $contrasena, $telefono, $direccion);
    // Ejecuta la consulta a la BBDD.
    $consulta->execute();
    // Cierra sentencia y conexión.
    $consulta->close();
    $conexion->close();
    // Redirige a la página deseada.
    header("Location:index.php");
}

// CONFIRMAR FECHA - - - - - - - - - - - - - - - - - - - -
function confirmarFecha()
{
    include('conexion.php');

    $diaMes = $_POST['dia'];
    $mes = $_POST['numeroMes'];
    $fecha = $diaMes . " de " . $mes;
    $id_usuario = $_POST['id_usuario'];
    $id_vehiculo = $_POST['id_vehiculo'];

    // echo "PISTA -> " . $diaMes . $mes . $correo . "hola";

    // Almacena la consulta SQL en una variable.
    $sql = "INSERT INTO cita (fecha, id_usuario, id_vehiculo) VALUES (?,?,?)";
    // Prepara una sentencia SQL para su ejecución.
    $consulta = $conexion->prepare($sql);
    // Agrega variables a una sentencia preparada como parámetros. 
    // Las "s" hacen referencia a que vamos a pasar un String, cadenas. 
    // Las "i", a int, enteros.
    $consulta->bind_param("s,i,s", $fecha, $id_usuario, $id_vehiculo);
    // Ejecuta la consulta a la BBDD.
    $consulta->execute();
    // Cierra sentencia y conexión.
    $consulta->close();
    $conexion->close();

    // Redirige a la página deseada.
    header("Location:index.php");
}
// RECUPERAR NOMBRE - - - - - - - - - - - - - - - - - - - -
function recuperarDato($id)
{
    include('conexion.php');

    $sql = "SELECT * FROM usuario WHERE id = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("i", $id);
    $consulta->execute();

    $resultado = $consulta->get_result();
   
    $consulta->close();
    $conexion->close();

    return $resultado;

}


function getCalendario()
{
    include('conexion.php');

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
