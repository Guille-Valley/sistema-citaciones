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


    <!-- Formulario de inicio de sesión, reenvia los datos a si mismo, sin necesidad de un segundo archivo -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nombre">Nombre</label>
    <br>
    <input type="text" name="nombre">
    <br>
    <label for="contrasena">Contraseña</label>
    <br>
    <input type="password" name="contrasena">
    <br>
    <input type="submit" name="aceptar" value="Aceptar">

    </form>
    <a href="cuerpo.php">Volver</a>
    



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>