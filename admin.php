<?php include('cabecera.php');
include('funciones_bd.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php';

if (isset($_SESSION['usuario']) == 5) {
?>
    <h1>Panel del administrador:</h1>
    <hr>

    <?php


    $citasRealizadas = mostrarCitaciones();

    if ($citasRealizadas->num_rows > 0) {
        while ($clavesCita = $citasRealizadas->fetch_assoc()) {
            echo "<b>Fecha:</b> " . $clavesCita['fecha'] . " | ";
            echo "<b>Matrícula:</b> " . $clavesCita['id_vehiculo'] . " | ";
            echo "<b>Identificador:</b> " . $clavesCita['id_usuario'] . " | ";
            echo "<hr><br>";
        }
    } else {
        echo "No tiene ninguna citación";
    }
} else {

    ?>
    <p>Debe Registrarse para poder ver esta p&aacute;gina.</p>
    <a href="index.php">Volver al inicio.</a>

<?php } ?>

<?php include('pie-pagina.php'); ?>