<?php include("../modelo/usuario.php");

$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

$login = new usuario();

$login->inciar_sesion($correo, $contraseña);
