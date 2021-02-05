<?php
session_start();

// Menú usuarios NO registrados:
if (!isset($_SESSION['usuario'])) {

?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="info.php">Informaci&oacute;n</a></li>

                </ul>
            </div>
        </div>
    </nav>

<?php

} else {
    // Menú de usuarios SI registrados:
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="info.php">Informaci&oacute;n</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>

                    <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
                    <li class="nav-item">
                        <form action="funciones_bd.php" method="post">
                            <input type="submit" name="cerrar_sesion" value="Cerrar Sesi&oacute;n">
                        </form>
                    </li>
                </ul>
            </div>
    </nav>

<?php
}
?>