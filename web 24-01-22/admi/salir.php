<?php
$_SESSION['usuario'] = null;
unset($_SESSION['id_usuario']);
//echo 'aqui poner el header.'
header("Location: empleados.php");
?>