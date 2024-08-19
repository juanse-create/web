<!-- cerrar_sesion.php -->
<?php
session_start();
session_unset();
session_destroy();
header('Location: formulario_login.php');
?>
