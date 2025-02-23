<?php
session_start();
include("../modelo/usuario.php");
$tipo = new usuario();
$tipo_usuario = $tipo->tipo_usuario($_SESSION["correo"], $_SESSION["contraseña"]);
if ($tipo_usuario == "usuario") {
    include("layouts/header_dashboard.php");
} elseif ($tipo_usuario == "admin") {
    include("layouts/header_dashboard_admin.php");
}

$id = $_POST["id"];
include("../modelo/proyectos.php");
$editar = new proyectos();
$array = $editar->obtenerProyectoPorId($id);
?>

<div class="container mt-5">
    <h1 class="mb-4">Editar Proyecto</h1>
    <form action="../controller/editar_proyecto_controller.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $array["id"]; ?>">

        <div class="form-group">
            <label for="empresa">Empresa:</label>
            <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo $array["empresa"]; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $array["ciudad"]; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="Evaluacion" <?php if ($array["tipo"] == 'Evaluacion') echo 'selected'; ?>>Evaluacion</option>
                <option value="sae WEB + aula virtual" <?php if ($array["tipo"] == 'sae WEB + aula virtual') echo 'selected'; ?>>sae WEB + aula virtual</option>
                <option value="servicion de mensajeria sms y email" <?php if ($array["tipo"] == 'servicion de mensajeria sms y email') echo 'selected'; ?>>servicion de mensajeria sms y email</option>
                <option value="sae pagos" <?php if ($array["tipo"] == 'sae pagos') echo 'selected'; ?>>sae pagos</option>
                <option value="asistencia tecnica" <?php if ($array["tipo"] == 'asistencia tecnica') echo 'selected'; ?>>asistencia tecnica</option>
                <option value="migracion de datos" <?php if ($array["tipo"] == 'migracion de datos') echo 'selected'; ?>>migracion de datos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $array["fecha"]; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="programador">Programador:</label>
            <input type="text" class="form-control" id="programador" name="programador" value="<?php echo $array["programador"]; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" id="status" name="estado" value="<?php echo $array["status"]; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos:</label>
            <textarea class="form-control" id="requisitos" name="requisitos" required><?php echo $array["requisitos"]; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include("layouts/footer.html") ?>