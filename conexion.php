<?php

    try {
        // Conexion con la BBDD almacenada en la variable $base
        $base = new PDO('mysql:host=localhost; dbname=citas_taller', 'root', '');
        // Atributos de la conexion para tratar excepciones
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$base->exec();
    } catch (Exception $e) {
        die("Error" . $e->getMessage());
        echo "Línea del error" . $e->getLine();
    }
