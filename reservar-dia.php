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


    <h3>Confirma la fecha de la cita elegida</h3>

    <?php

    if (isset($_POST['reservarFecha'])) {

        // Guardamos en la variable $dia el value del name = diaDelMes.
        $dia = $_POST['diaDelMes'];
        $numeroMes = $_POST['mesPost'];

        $mesesArray = array(0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");

        foreach (array_keys($mesesArray) as $key) {

            if ($key == $numeroMes) {
                echo "Fecha seleccionada: " . $dia . " de " . $mesesArray[$key] . " de este año.";
            }
        }
    }
    ?>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="hidden" name="confirmarFecha" value="confirmarFecha">
        <input type="submit" value="Confirmar">
    </form>

    <?php

    if (isset($_POST['confirmarFecha'])) {

        include ('conexion.php');

        $genero = $_POST['genero'];
    
        /* // nombre contrasena etc. son los nombres de los campos de la BBDD y con el =:minombre, asociamos mas tarde el valor correcto evitando una posible inyección.
        $sql = "INSERT INTO usuarios (nombre, contrasena, email, edad, fecha_nacimiento, direccion, codigo_postal, provincia, genero) VALUES (:minombre, :micontrasena, :miemail, :miedad, :mifecha_nacimiento, :midireccion, :micodigo_postal, :miprovincia, :migenero)";
        $resultado = $base->prepare($sql);
        
        // Las propiedades de dentro del array son los campos creados en la tabla usaurios de la bbdd.
        // mandamos por el array los valores capturados con el metodo $_POST.
        $resultado->execute(array(":minombre"=>$nombre,":migenero"=>$genero)); */
        
    }



    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>