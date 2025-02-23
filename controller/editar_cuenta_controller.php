<?php include("../modelo/usuario.php");

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];
$empresa = $_POST["empresa"];
$ciudad = $_POST["ciudad"];

$editar = new usuario();

$editar->editar_usuario($id, $nombre, $correo, $contraseña, $empresa, $ciudad);
