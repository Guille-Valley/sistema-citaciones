<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Reparaciones Andr&eacute;s Bueno</title>
</head>

<body>
    <?php
    // MENU - - - - - - - - - - - - - - - - - - - -
    require_once '../menu.php';

    if (isset($_SESSION['usuario'])) {

        if (isset($_POST['confirmar_fecha'])) {

            include('../conexion.php');

            $diaMes = $_POST['dia'];
            $mes = $_POST['numeroMes'];
            $correo = $_POST['correo'];

            // echo "PISTA -> " . $diaMes . $mes . $correo . "hola";

            // Almacena la consulta SQL en una variable.
            $sql = "INSERT INTO calendario (diaMes, mes, correo) VALUES (?,?,?)";
            // Prepara una sentencia SQL para su ejecución.
            $consulta = $conexion->prepare($sql);
            // Agrega variables a una sentencia preparada como parámetros. 
            // Las "s" hacen referencia a que vamos a pasar un String, cadenas. 
            // Las "i", a int, enteros.
            $consulta->bind_param("iis", $diaMes, $mes, $correo);
            // Ejecuta la consulta a la BBDD.
            $consulta->execute();
            // Cierra sentencia y conexión.
            $consulta->close();
            $conexion->close();

            // Redirige a la página deseada.
            header("Location:../index.php");
        }
    } else {
    ?>
        <p>Debe Registrarse para poder ver esta p&aacute;gina.</p>
        <a href="../index.php">Volver al inicio.</a>

    <?php


    }

    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>