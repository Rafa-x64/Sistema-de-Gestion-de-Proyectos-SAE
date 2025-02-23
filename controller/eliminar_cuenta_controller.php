<?php include("../modelo/usuario.php");

$id = $_POST["id"];

$eliminar = new usuario();

$eliminar->eliminar_usuario($id);
