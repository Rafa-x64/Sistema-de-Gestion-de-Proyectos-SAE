<?php
include("../config/conexion.php");
require_once("../modelo/usuario.php");

$id = $_SESSION["id"];

$extraer = new usuario();

$extraer->extraer_datos($id);
