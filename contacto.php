<?php include('cabecera.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php' ?>

<?php
if (isset($_POST['enviar'])) {
    if (isset($_POST['condiciones'])) {
        $to = "vision.valley.87@gmail.com"; // Tu email
        $from = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $asunto = "Mensaje enviado";
        $mensaje = $nombre . " escribió lo siguiente:" . "\n\n" . $_POST['mensaje'];

        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= "De: <' . $from . '> \r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        mail($to, $asunto, $mensaje, $headers);
        //mail("vision.valley.87@gmail.com","Answer","Hope You Vote My Answer Up","From: me@you.com");
        echo '<script type="text/javascript"> alert("Mensaje enviado. Gracias "' . $nombre . '", me pondré en contacto lo antes posible."); </script>';
    } else {
        echo '<script type="text/javascript"> alert("Debe acertar las condiciones de uso y privacidad"); </script>';
    }
}
?>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-3">

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="correo">Email</label>
                    <input class="form-control" type="email" name="correo">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="mensaje">Mensaje</label>
                    <textarea class="form-control" name="mensaje"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="condiciones">Acepto las <a href="#">condiciones de uso y privacidad</a></label>
                    <input class="form-check-input" type="checkbox" name="condiciones">
                </div>
                <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>

            </form>

        </div>
    </div>
</div>

<?php include('pie-pagina.php'); ?>