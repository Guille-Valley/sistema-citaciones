<?php include('cabecera.php'); ?>

<div class="container mt-5">
<h3>Rellena el formulario de registro:</h3>
    <!-- FORMULARIO DE REGISTRO -->
    <form action="funciones_bd.php" name="registrar_usuario" method="POST">
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

<?php include('pie-pagina.php'); ?>