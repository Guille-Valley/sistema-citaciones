<?php include('cabecera.php');
include('funciones_bd.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php'; ?>

<div class="container">
    <div class="row text-center">
        <h1 class="m-5">Taller de confianza</h1>
        <div class="col">
            <p>En nuestro Taller mecánico en Zaragoza ofrecemos un servicio integral de mecánica en vehículos multimarca. Estamos equipados con línea pre-itv, máquina de diagnosis, equipo de carga de aire acondicionado…</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <img src="img/taller01.jpg" class="rounded" alt="...">
            </div>
        </div>
    </div>

    <div class="container m-5 text-center bg-light">
        <div class="row">
            <div class="col-6">
                <div class="p-3 text-secondary">Taller de Chapa y Pintura</div>
                <p>Cualquier reparación de chapa y pintura de vehículos. Tenemos a los mejores profesionales con herramienta de primer nivel; bancada, reparación y soldadura de aluminio.</p>
            </div>
            <div class="col-6">
                <div class="p-3 text-secondary">Coches de Sustitución</div>
                <p>En Talleres Andrés Bueno contamos con un servicio de coches de sustitución.</p>
            </div>
        </div>
    </div>
    <div class="container m-5">
        <h2 class="m-5">Talleres Andrés Bueno</h2>
        <div class="row">
            <div class="col-3">
                <p>Realizamos reparaciones mecánicas, de chapa y pintura, eléctricas y de inyección, climatización, sustitución de neumáticos, lunas, y mucho más.Reparación del automóvil al 100%.</p>
                <img src="img/taller03.jpg" width="75%" class="rounded" alt="...">
            </div>
            <div class="col-3">
                <img src="img/taller02.jpg" width="75%" class="rounded" alt="...">
            </div>
            <div class="col-3">
                <img src="img/taller04.jpg" width="75%" class="rounded" alt="...">
            </div>
            <div class="col-2">
                <img src="img/taller05.jpg" width="75%" class="rounded" alt="...">
            </div>
        </div>
    </div>
    <div class="col bg-light">En nuestros talleres multimarca, contamos con una amplia experiencia en reparaciones completas de automóvil, somos una empresa familiar en el sector automovilístico.
        Trabajamos con profesionalidad de calidad y garantía, por lo que tenemos una amplia cartera de clientes.</div>

    <div class="container mt-5">
        <h3>Introducir comentarios:</h3>
        <form action="funciones_bd.php" method="post">
            <input type="hidden" name="nombre_funcion" value="introducir_comentario">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre">
            </div>
            <div class="mb-3">
                <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">¡Enviar comentario!</button>
        </form>
    </div>
    <h4>Comentarios:</h4>
    <?php
    $imprimirComentario = getComentarios();
    if ($imprimirComentario->num_rows > 0) {
        while ($claveComentario = $imprimirComentario->fetch_assoc()) {
            echo "<b>Nombre:</b> " . $claveComentario['nombre'];
            echo "<br>";
            echo "<b>Comentario:</b><br> " . $claveComentario['texto'];
            echo "<hr><br>";
        }
    } else {
        echo "Todavía no hay ningún comentario.";
    }
    ?>



    <?php include('pie-pagina.php'); ?>