<?php
$_SESSION['id_usuario'] = null;
unset($_SESSION['id_usuario']);
//echo 'aqui poner el header.'
header("Location:../index.php");
?>