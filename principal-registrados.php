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

    <button onclick="cambiarMes(restarMes)">Mes atr&aacute;s</button>
    <div id="mes"></div>
    <button onclick="cambiarMes(sumarMes)">Mes adelante</button>
    <form action="reservar-dia.php" method="post" id="calendario">
        <input type="submit" value="Elegir Fecha">
    </form>


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

        // Según el mes que visualizemos tendremos 30,31, y febrero 28 días. En caso de ser bisiesto 29 días.
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
                document.getElementById("calendario").appendChild(mesContenedor);
            }

            function imprimirMes(i) {
                var nuevoDiaContenedor = document.createElement("div");
                nuevoDiaContenedor.setAttribute("id", "nuevoDiaContenedor" + i);

                var nuevoDia = document.createElement("INPUT");
                nuevoDia.setAttribute("type", "radio");
                nuevoDia.setAttribute("name", "diaDelMes");
                nuevoDia.setAttribute("value", i);
                nuevoDia.setAttribute("id", "nuevoDia" + i);

                var nuevoDiaEtiqueta = document.createElement("LABEL");
                nuevoDiaEtiqueta.setAttribute("id", "nuevoDiaEtiqueta" + i);

                document.getElementById("mesContenedor").appendChild(nuevoDiaContenedor);
                document.getElementById("nuevoDiaContenedor" + i).appendChild(nuevoDia);
                document.getElementById("nuevoDiaContenedor" + i).appendChild(nuevoDiaEtiqueta);

                var cambiarLabel = document.getElementById("nuevoDiaEtiqueta" + i);
                cambiarLabel.innerHTML = i;
            }
        }
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>