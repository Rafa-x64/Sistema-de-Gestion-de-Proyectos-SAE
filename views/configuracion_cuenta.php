<?php
session_start();
require_once("../modelo/usuario.php");
$tipo = new usuario();
$tipo_usuario = $tipo->tipo_usuario($_SESSION["correo"], $_SESSION["contraseña"]);
if ($tipo_usuario == "usuario") {
    include("layouts/header_dashboard.php");
} elseif ($tipo_usuario == "admin") {
    include("layouts/header_dashboard_admin.php");
}
?>

<?php include("../controller/configuracion_cuenta_controller.php") ?>

<?php include("layouts/footer.html") ?>