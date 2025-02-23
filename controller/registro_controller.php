<?php include("../modelo/usuario.php");

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];;
$contraseña = $_POST["contraseña"];
$empresa = $_POST["empresa"];
$ciudad = $_POST["ciudad"];

$registrar = new usuario($nombre, $correo, $contraseña, $empresa, $ciudad);

$registrar->registrar();
