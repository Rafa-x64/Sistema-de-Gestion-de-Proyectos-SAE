<?php include("../modelo/proyectos.php");

$ciudad = $_SESSION["ciudad"];
$empresa = $_SESSION["empresa"];

$dashboard = new proyectos();

$dashboard->dashboard($ciudad, $empresa);
