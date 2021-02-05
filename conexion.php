<?php


$servidor = "localhost";
$nombreUsuario = "root";
$password = "";
$db = "taller_bd";

$conexion = new mysqli($servidor, $nombreUsuario, $password, $db);

// Con la -> accedemos a los metodos del objeto.
// Como el . (punto) en otros lenguajes de programación.
if($conexion -> connect_error){
    die("Conexión fallida: " . $conexion -> connect_error);
}




/*     try {
        // Conexion con la BBDD almacenada en la variable $base
        $base = new PDO('mysql:host=localhost; dbname=citas_taller', 'root', '');
        // Atributos de la conexion para tratar excepciones
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$base->exec();
    } catch (Exception $e) {
        die("Error" . $e->getMessage());
        echo "Línea del error" . $e->getLine();
    }
 */