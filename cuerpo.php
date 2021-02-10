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
    require_once 'menu.php'

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
                                <form action="includes/funciones_bd.php" name="inicio_sesion" method="post">
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>