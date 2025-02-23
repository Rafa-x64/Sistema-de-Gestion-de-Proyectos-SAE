<?php
session_start();
$id = $_SESSION["id"];
$empresa = $_SESSION["empresa"];
$ciudad = $_SESSION["ciudad"];
$nombre = $_SESSION["nombre"];

include("layouts/header_dashboard_admin.php");
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-7">
            <h1>Bienvenido <?php echo $nombre; ?> de la empresa <?php echo $empresa; ?> - <?php echo $ciudad; ?></h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h2>Proyectos</h2>

    <div class="row">

        <?php include("../controller/dashboard_admin_controller.php") ?>

    </div>
</div>
<?php include("layouts/footer.html") ?>