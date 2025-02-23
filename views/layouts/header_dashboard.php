<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion BC</title>
    <link rel="icon" href="../../assets/img/logo_h.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/proyectos.css">
    <link rel="stylesheet" href="../assets/css/formularios.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-toggler">
                <a class="navbar-brand" href="https://asistescolar.com/">
                    <img src="../assets/img/logo_h.png" alt="SAE" width="150px">
                </a>
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="configuracion_cuenta.php">Cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bg-alert" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="agregar_proyecto.php" method="POST">
                            <input type="hidden" value="<?php print $_SESSION["ciudad"]; ?>" name="ciudad">
                            <input type="hidden" value="<?php print $_SESSION["empresa"]; ?>" name="empresa">
                            <button type="submit" class="btn btn-success " style="margin-top:0; margin-right:0.75rem;">Agregar proyecto</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="../../config/cerrar_sesion.php" method="POST">
                            <input type="hidden" value="si" name="cerrar_sesion">
                            <button type="submit" class="btn btn-danger" style="margin-top:0">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>