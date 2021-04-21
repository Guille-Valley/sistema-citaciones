<?php include('cabecera.php');
include('funciones_bd.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php';

if (isset($_GET['txt']) == 't') {
?>
    <h1>Perfil del usuario -
        <?php
        //Recuperar nombre del usuario
        $datosPersonales = recuperarDato($_SESSION['usuario']);

        if ($datosPersonales->num_rows > 0) {
            while ($clave = $datosPersonales->fetch_assoc()) {
                echo $clave['nombre'];
            }
        }
        ?>
    </h1>
    <p>Datos cambiados correctamente</p>
    <a href="perfil.php">Volver</a>
<?php
} else {

?>
    <h1>Perfil del usuario -
        <?php
        //Recuperar nombre del usuario
        $datosPersonales = recuperarDato($_SESSION['usuario']);

        if ($datosPersonales->num_rows > 0) {
            while ($clave = $datosPersonales->fetch_assoc()) {
                echo $clave['nombre'];
        ?>
    </h1>
    <h3>Revisar citaciones realizadas:</h3>
    <?php
                $citaRealizada = mostrarCitas($_SESSION['usuario']);

                if ($citaRealizada->num_rows > 0) {
                    while ($clave = $citaRealizada->fetch_assoc()) {
                        echo $clave['fecha'];
                        echo $clave['id_vehiculo'];
                    }
                }

    ?>
    <h3>Modificar datos personales:</h3>
    <form action="funciones_bd.php" method="post">

        <input type="hidden" name="nombre_funcion" value="cambiar_datos">
        <input type="hidden" name="id" value="<?php echo $clave['id'] ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $clave['nombre']; ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $clave['apellido']; ?>">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Direcci&oacute;n de correo</label>
            <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $clave['correo']; ?>">
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" value="<?php echo $clave['contrasena']; ?>">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Tel&eacute;fono</label>
            <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo $clave['telefono']; ?>">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Direcci&oacute;n</label>
            <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $clave['direccion']; ?>">
        </div>

        <button class="btn btn-outline-success m-2" type="submit">Cambiar datos</button>
    </form>

    <h3>Cambiar matrícula del vehículo:</h3>



<?php
            }
        }
    }
?>


<?php
include('pie-pagina.php'); ?>