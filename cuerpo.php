<?php include('cabecera.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php' ?>

<?php if (isset($_SESSION['usuario'])) {

    // Redirige a la página deseada.
    header("Location:principal-registrados.php");
} else {
?>

    <div class="container-fluid mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Iniciar sesi&oacute;n
                </button>
                <!-- Modal INICIO DE SESIÓN o REGISTRO-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inicio de sesi&oacute;n</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- FORMULARIO INICIO DE SESIÓN -->
                                <form action="funciones_bd.php" name="inicio_sesion" method="post">
                                    <input type="hidden" name="nombre_funcion" value="inicio_sesion">
                                    <div class="mb-3">
                                        <label for="correo" class="form-label">Direcci&oacute;n de correo</label>
                                        <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contrasena" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="contrasena" id="contrasena">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Iniciar sesi&oacute;n</button>

                                    <!-- LINK DE REGISTRO -->
                                    <div id="emailHelp" class="form-text">¡Registrate primero <a href="registro.php">Aqu&iacute;!</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }
include('pie-pagina.php'); ?>