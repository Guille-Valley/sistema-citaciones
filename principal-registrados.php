<?php include('cabecera.php'); ?>

<?php

// MENU - - - - - - - - - - - - - - - - - - - -
// MENU incluye - > session_start
require_once 'menu.php';

if (isset($_SESSION['usuario'])) {

?>

    <div class="container mt-5">
        <h2 class="display-2">PEDIR CITA AHORA:</h2>
        <div class="row">
            <div class="col">
                <button onclick="cambiarMes(restarMes)" class="btn"><i class="fas fa-angle-double-left"></i></button>
                <!-- Rescatamos el mes actual -->
                <span id="mes" class="m-3"></span>
                <button onclick="cambiarMes(sumarMes)" class="btn"><i class="fas fa-angle-double-right"></i></button>
            </div>
        </div>
        <!-- FORMULARIO RESERVA DE DIA -->
        <form action="reservar-dia.php" method="post" id="calendario">
            <input type="hidden" name="reservar_fecha" value="reservar_fecha">
        </form>

    </div>


    <!-- CALENDARIO -->
    <script>
        window.onload = function() {
            // Invocamos la siguiente función para ver en pantalla el calendario del mes actual.
            visualizarCalendario(saberMes());
        };

        // Array principal de los 12 meses del año.
        var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        {
            //Creamos variable con la clase Date() para conseguir la fecha en la que estamos en el día de hoy.
            var fechaActual = new Date();
            // getMonth() devuelve el numero de mes del 0 al 11. 0 corresponde al mes de enero.
            // Lo utulizaremos para indicar el mes en el calendario.
            var mesActual = fechaActual.getMonth();
            // Modificamos el contenido del mes en el que estamos.
            document.getElementById("mes").textContent = meses[mesActual];

        }

        // Función para conocer la posición actual del mes que se ve por pantalla:
        function saberMes() {
            let mesEscogido = document.getElementById("mes").textContent;
            for (let i = 0; i < meses.length; i++) {
                if (meses[i] == mesEscogido) {
                    let mesPos = i;
                    return mesPos;
                }
            }
        }

        // Función para escoger la acción de pasar de mes, adelante o atrás.
        function cambiarMes(accion) {

            // Guardamos la posición del mes actual, para pasarla por parámetro junto con la acción escogida de cambiar de mes.
            let mesPos = saberMes();

            switch (accion) {
                case restarMes:
                    restarMes(mesPos);
                    break;
                case sumarMes:
                    sumarMes(mesPos);
                    break;
            }
        }

        // Función para pasar de mes hacia atrás.
        function restarMes(mesPos) {

            // Borramos el mes anterior para generar uno nuevo en su lugar
            // y el input hidden que pasamos por el formulario reservar-dia.php.
            document.getElementById("mesContenedor").remove();
            document.getElementById("mesPost").remove();

            restarMesResultado(mesPos);

            function restarMesResultado(mesPos) {
                // Comprobamos si el mes actual es Enero, 
                // para colocarnos en la última posición del array, 
                // que corresponderá con el 11 que es Diciembre.
                if (mesPos == 0) {
                    document.getElementById("mes").textContent = meses[11];
                    let mesPosActualizada = 11;
                    visualizarCalendario(mesPosActualizada);
                } else {
                    // Si no estamos en Enero, le restaremos una posición.
                    document.getElementById("mes").textContent = meses[mesPos - 1];
                    let mesPosActualizada = mesPos - 1;
                    visualizarCalendario(mesPosActualizada);
                }
            }
        }

        // Función para pasar de mes hacia adelante.
        function sumarMes(mesPos) {
            // Borramos el mes anterior para generar uno nuevo en su lugar 
            // y el input hidden que pasamos por el formulario reservar-dia.php.
            document.getElementById("mesContenedor").remove();
            document.getElementById("mesPost").remove();
            sumarMesResultado(mesPos);
            function sumarMesResultado(mesPos) {
                // Comprobamos si el mes actual es Diciembre, 
                // para colocarnos en la primera posición del array, 
                // que corresponderá con el 0 que es Enero.
                if (mesPos == 11) {
                    document.getElementById("mes").textContent = meses[0];
                    let mesPosActualizada = 0;
                    visualizarCalendario(mesPosActualizada);
                } else {
                    // Si no estamos en Diciembre, le sumaremos una posición.
                    document.getElementById("mes").textContent = meses[mesPos + 1];
                    let mesPosActualizada = mesPos + 1;
                    visualizarCalendario(mesPosActualizada);
                }
            }
        }

        // Según el mes que visualizemos tendremos 30, 31, y febrero 28 días. En caso de ser bisiesto 29 días.
        function visualizarCalendario(mesPos) {

            console.log(mesPos); // PISTA
            var mesPost = document.createElement("INPUT");
            mesPost.setAttribute("type", "hidden");
            mesPost.setAttribute("name", "mesPost");
            mesPost.setAttribute("value", mesPos);
            mesPost.setAttribute("id", "mesPost");
            document.getElementById("calendario").appendChild(mesPost);

            if (mesPos == 0 || mesPos == 2 || mesPos == 4 || mesPos == 6 || mesPos == 7 || mesPos == 9 || mesPos == 11) {

                // Invocamos función para crear el contenedor principal donde se crea el calendario.
                contenedorImprimirMes();
                // Bucle para recorrer los meses de 31 días.
                for (let i = 1; i <= 31; i++) {
                    imprimirMes(i);
                }
            }
            if (mesPos == 3 || mesPos == 5 || mesPos == 8 || mesPos == 10) {

                // Invocamos función para crear el contenedor principal donde se crea el calendario.
                contenedorImprimirMes();
                // Bucle para recorrer los meses de 30 días.
                for (let i = 1; i <= 30; i++) {
                    imprimirMes(i);
                }

            }
            if (mesPos == 1) {
                //Comprobamos si el año actual es bisiesto, para el mes de febrero:
                var anoActual = fechaActual.getFullYear();
                if (((anoActual % 4 == 0) && (anoActual % 100 != 0)) || (anoActual % 400 == 0)) {
                    // Invocamos función para crear el contenedor principal donde se crea el calendario.
                    contenedorImprimirMes();
                    // Bucle para recorrer febrero bisiesto.
                    for (let i = 1; i <= 29; i++) {
                        imprimirMes(i);
                    }
                } else {
                    // Invocamos función para crear el contenedor principal donde se crea el calendario.
                    contenedorImprimirMes();
                    // Bucle para recorrer febrero NO bisiesto.
                    for (let i = 1; i <= 28; i++) {
                        imprimirMes(i);
                    }
                }
            }

            function contenedorImprimirMes() {
                let mesContenedor = document.createElement("div");
                mesContenedor.setAttribute("id", "mesContenedor");
                mesContenedor.setAttribute("class", "d-grid gap-2 d-md-block");
                document.getElementById("calendario").appendChild(mesContenedor);
            }

            function imprimirMes(i) {
                var nuevoDia = document.createElement("BUTTON");
                nuevoDia.setAttribute("type", "radio");
                nuevoDia.setAttribute("name", "diaDelMes");
                nuevoDia.setAttribute("value", i);
                nuevoDia.setAttribute("id", "nuevoDia" + i);
                nuevoDia.setAttribute("class", "col-1 btn btn-outline-info m-2");
                document.getElementById("mesContenedor").appendChild(nuevoDia);
                var cambiarLabel = document.getElementById("nuevoDia" + i);
                cambiarLabel.innerHTML = i;
            }
        }
    </script>
<?php
} else {
?>
    <p>Debe Registrarse para poder ver esta p&aacute;gina.</p>
    <a href="index.php">Volver al inicio.</a>

<?php


}

?>

<?php include('pie-pagina.php'); ?>