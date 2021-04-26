<?php include('cabecera.php');
include('funciones_bd.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php';

if (isset($_SESSION['usuario'])) {

    if (isset($_POST['reservar_fecha']) && isset($_POST['diaDelMes'])) {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="col">

                    <h3>Confirma la fecha de la cita elegida</h3>

                    <?php

                    // Guardamos en la variable $dia el value del name = diaDelMes.
                    $dia = $_POST['diaDelMes'];
                    $numeroMes = $_POST['mesPost'];

                    $mesesArray = array(0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");

                    foreach (array_keys($mesesArray) as $key) {

                        if ($key == $numeroMes) {
                            break;
                        }
                    }

                    // Comprobar si la fecha esta ya almacenada en la BBDD. $diaMes . " de " . $mes;
                    $fechaRef = $dia . " de " . $mesesArray[$key];
                    $test = getFecha($fechaRef);
                    if (!$test) {

                        echo "<p>Fecha seleccionada: " . $dia . " de " . $mesesArray[$key] . " de este año.</p>";

                    ?>
                        <form action="funciones_bd.php" method="post">
                            <input type="hidden" name="nombre_funcion" value="confirmar_fecha">
                            <input type="hidden" name="dia" value="<?php echo $dia ?>">
                            <input type="hidden" name="numeroMes" value="<?php echo $mesesArray[$key] ?>">

                            <label for="id_vehiculo" class="form-label">Matrícula del vehículo:</label>
                            <input type="text" name="id_vehiculo">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['usuario'] ?>">

                            <button class="col-1 btn btn-outline-success m-2" type="submit">Confirmar</button>
                        </form>
                    <?php
                    } else {

                        // La fecha ya existe en la BBDD.
                        echo "La fecha elegida no esta disponible.";
                    ?>
                        <a href="principal-registrados.php">Volver al calendario</a>
                    <?php

                    }
                } else {
                    // FECHA SELECCIONADA ERRONEA
                    echo "Fecha incompleta.";
                    ?>
                    <a href="principal-registrados.php">Volver</a>
                <?php
                }
            } else {
                ?>
                <p>Debe Registrarse para poder ver esta p&aacute;gina.</p>
                <a href="index.php">Volver al inicio.</a>

            <?php } ?>
                </div>
            </div>
        </div>
        <?php include('pie-pagina.php'); ?>