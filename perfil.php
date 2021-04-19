<?php include('cabecera.php'); ?>

<?php
// MENU - - - - - - - - - - - - - - - - - - - -
require_once 'menu.php' ?>

<?php
include('funciones_bd.php');
//mostrarPerfil($_SESSION['usuario']);
?>
<h1>Perfil del usuario - <?php echo $_SESSION['usuario']; ?></h1>
<?php include('pie-pagina.php'); ?>