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
            break;
        case 'cambiar_datos':
            cambiarDatos();
            break;
        case 'introducir_comentario':
            introducirComentario();
            break;
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

        $resultado = $consulta->get_result();   // Obtenemos un objeto

        $consulta->close();
        $conexion->close();

        if ($resultado->num_rows > 0) { //INICIAMOS SESIÓN.

            session_start();

            while ($dato = $resultado->fetch_assoc()) {
                $_SESSION['usuario'] = $dato['id']; //ADJUDICAMOS A LA SESIÓN EL ID DEL USUARIO INICIADO.
            }

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

    $sql = "INSERT INTO vehiculo (matricula, id_usuario) VALUES (?, ?); ";

    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("si", $id_vehiculo, $id_usuario);
    $consulta->execute();

    $consulta->close();
    // $conexion->close();


    $sql1 = "INSERT INTO cita (fecha, id_usuario, id_vehiculo) VALUES (?,?,?)";

    $consulta1 = $conexion->prepare($sql1);
    $consulta1->bind_param("sis", $fecha, $id_usuario, $id_vehiculo);
    $consulta1->execute();


    // Cierra sentencia y conexión.

    $consulta1->close();
    $conexion->close();


    // Redirige a la página deseada.
    header("Location:perfil.php");
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

// RECUPERAR CITACIONES - - - - - - - - - - - - - - - - - - - -
function mostrarCitas($id)
{
    include('conexion.php');

    $sql = "SELECT fecha, id_vehiculo FROM cita WHERE id_usuario = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("i", $id);
    $consulta->execute();

    $resultado = $consulta->get_result();


    $consulta->close();
    $conexion->close();

    return $resultado;
}

// COMPROBAR SI EXISTE CITA - - - - - - - - - - - - - - - - - - - -
function getFecha($fecha)
{
    include('conexion.php');

    $sql = "SELECT fecha FROM cita WHERE fecha = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("s", $fecha);
    $consulta->execute();

    $resultado = $consulta->get_result();

    $consulta->close();
    $conexion->close();

    if ($resultado->num_rows > 0) { // Comprobamos si nos devuelve un registro.
        return true;
    }else{
        return false;
    }
}

// ACTUALIZAR DATOS - - - - - - - - - - - - - - - - - - - -
function cambiarDatos()
{
    include('conexion.php');

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE usuario SET nombre = ?, apellido = ?, correo = ?, contrasena = ?, telefono = ?, direccion = ? WHERE id = ?";

    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("ssssisi", $nombre, $apellido, $correo, $contrasena, $telefono, $direccion, $id);
    $consulta->execute();

    $consulta->close();
    $conexion->close();

    // Redirige a la página deseada.
    header("Location:perfil.php?txt=t");
}

// MOSTRAR CITACIONES - - - - - - - - - - - - - - - - - - - -
function mostrarCitaciones()
{
    include('conexion.php');

    $sql = "SELECT fecha, id_usuario, id_vehiculo FROM cita ORDER BY id_usuario ASC";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();

    $resultado = $consulta->get_result();


    $consulta->close();
    $conexion->close();

    return $resultado;
}

// GUARDAR COMENTARIO - - - - - - - - - - - - - - - - - - - -
function introducirComentario()
{
    include('conexion.php');

    $nombre = $_POST['nombre'];
    $texto = $_POST['texto'];
    // Almacena la consulta SQL en una variable.
    $sql = "INSERT INTO comentario (nombre, texto) VALUES (?,?)";
    // Prepara una sentencia SQL para su ejecución.
    $consulta = $conexion->prepare($sql);
    // Agrega variables a una sentencia preparada como parámetros. 
    $consulta->bind_param("ss", $nombre, $texto);
    // Ejecuta la consulta a la BBDD.
    $consulta->execute();
    // Cierra sentencia y conexión.
    $consulta->close();
    $conexion->close();
    // Redirige a la página deseada.
    header("Location:info.php");
}

// MOSTRAR COMENTARIO - - - - - - - - - - - - - - - - - - - -
function getComentarios()
{
    include('conexion.php');

    $sql = "SELECT nombre, texto FROM comentario";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();

    $resultado = $consulta->get_result();


    $consulta->close();
    $conexion->close();

    return $resultado;
}
