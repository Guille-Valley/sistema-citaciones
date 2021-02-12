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

        if (isset($_POST['reservarFecha']) && isset($_POST['diaDelMes'])) {

    ?>
            <h3>Confirma la fecha de la cita elegida</h3>

            <?php

            // Guardamos en la variable $dia el value del name = diaDelMes.
            $dia = $_POST['diaDelMes'];
            $numeroMes = $_POST['mesPost'];

            //echo "PISTA -> " . $dia . " _ " . $numeroMes;

            $mesesArray = array(0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");

            foreach (array_keys($mesesArray) as $key) {

                if ($key == $numeroMes) {
                    echo "Fecha seleccionada: " . $dia . " de " . $mesesArray[$key] . " de este año.";
                }
            }

            ?>

            <form action="confirmar-fecha.php" method="post">
                <input type="hidden" name="confirmar_fecha" value="confirmar_fecha">
                <input type="hidden" name="dia" value="<?php echo $dia ?>">
                <input type="hidden" name="numeroMes" value="<?php echo $numeroMes ?>">
                <input type="hidden" name="correo" value="<?php echo $_SESSION['usuario'] ?>">
                <input type="submit" value="Confirmar">
            </form>

        <?php

        } else {
            // FECHA SELECCIONADA ERRONEA
            echo "Fecha incompleta.";
        ?>
            <a href="../principal-registrados.php">Vovler</a>
        <?php
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