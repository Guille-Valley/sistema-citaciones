<?php include('cabecera.php'); ?>

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

                    //echo "PISTA -> " . $dia . " _ " . $numeroMes;

                    $mesesArray = array(0 => "Enero", 1 => "Febrero", 2 => "Marzo", 3 => "Abril", 4 => "Mayo", 5 => "Junio", 6 => "Julio", 7 => "Agosto", 8 => "Septiembre", 9 => "Octubre", 10 => "Noviembre", 11 => "Diciembre");

                    foreach (array_keys($mesesArray) as $key) {

                        if ($key == $numeroMes) {
                            break;
                        }
                    }
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
                // FECHA SELECCIONADA ERRONEA
                echo "Fecha incompleta.";
                ?>
                    <a href="principal-registrados.php">Vovler</a>
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