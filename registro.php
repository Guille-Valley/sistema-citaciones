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

<div class="container mt-5">
<h3>Rellena el formulario de registro:</h3>
    <!-- FORMULARIO DE REGISTRO -->
    <form action="includes/funciones_bd.php" name="registrar_usuario" method="POST">
        <input type="hidden" name="nombre_funcion" value="registrar_usuario">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Direcci&oacute;n de correo</label>
            <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Tel&eacute;fono</label>
            <input type="number" class="form-control" name="telefono" id="telefono">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Direcci&oacute;n</label>
            <input type="text" class="form-control" name="direccion" id="direccion">
        </div>

        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>