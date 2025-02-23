<?php include("../modelo/proyectos.php");

$id = $_POST["id"];
$empresa = $_POST["empresa"];
$ciudad = $_POST["ciudad"];
$tipo = $_POST["tipo"];
$fecha = $_POST["fecha"];
$programador = $_POST["programador"];
$estado = $_POST["estado"];
$requisitos = $_POST["requisitos"];

$editar = new proyectos();

$editar->editar_proyecto($id, $empresa, $ciudad, $tipo, $fecha, $programador, $estado, $requisitos);


