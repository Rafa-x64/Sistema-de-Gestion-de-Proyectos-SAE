<?php include("../modelo/proyectos.php");

$empresa = $_POST["empresa"];
$ciudad = $_POST["ciudad"];
$tipo = $_POST["tipo"];
$fecha = $_POST["fecha"];
$programador = $_POST["programador"];
$estado = $_POST["estado"];
$requisitos = $_POST["requisitos"];

$registrar = new proyectos($empresa, $ciudad, $tipo, $fecha, $programador, $estado, $requisitos);

$registrar->agregar_proyecto();
