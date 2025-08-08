<?php
class proyectos
{
    use notificacion;

    public $empresa;
    public $ciudad;
    public $tipo;
    public $fecha;
    public $programador;
    public $status;
    public $requisitos;

    public function __construct($empresa = null, $ciudad = null, $tipo = null, $fecha = null, $programador = null, $status = null, $requisitos = null)
    {
        $this->empresa = $empresa;
        $this->ciudad = $ciudad;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->programador = $programador;
        $this->status = $status;
        $this->requisitos = $requisitos;
    }

    public function agregar_proyecto()
    {
        try {
            include("../config/conexion.php");
            $agregar = $con->prepare("INSERT INTO proyectos (empresa, ciudad, fecha, tipo, programador, status, requisitos) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $agregar->execute([$this->empresa, $this->ciudad, $this->fecha, $this->tipo, $this->programador, $this->status, $this->requisitos]);
            print("proyecto agregado con exito");
        } catch (PDOException $e) {
            print($e->getMessage());
        }
    }

    public function editar_proyecto($id, $empresa, $ciudad, $tipo, $fecha, $programador, $estado, $requisitos)
    {
        try {
            include("../config/conexion.php");
            $editar_proyecto = $con->prepare("UPDATE proyectos SET empresa = ?, ciudad = ?, tipo = ?, fecha = ?, programador = ?, status = ?, requisitos = ? WHERE id = ?");
            $editar_proyecto->execute([$empresa, $ciudad, $tipo, $fecha, $programador, $estado, $requisitos, $id]);
            print("proyecto editado con exito");
        } catch (PDOException $e) {
            $this->notificacion_error("Error al editar el proyecto", "dashboard", $e->getMessage(), "../views/dashboard.php");
        }
    }

    public function editar_proyecto_admin($id, $empresa, $ciudad, $tipo, $fecha, $programador, $estado, $requisitos)
    {
        try {
            include("../config/conexion.php");
            $editar_proyecto = $con->prepare("UPDATE proyectos SET empresa = ?, ciudad = ?, tipo = ?, fecha = ?, programador = ?, status = ?, requisitos = ? WHERE id = ?");
            $editar_proyecto->execute([$empresa, $ciudad, $tipo, $fecha, $programador, $estado, $requisitos, $id]);
            $this->notificacion_correcto("proyecto editado con exito", "dashboard", "../views/dashboard_admin.php");
        } catch (PDOException $e) {
            $this->notificacion_error("Error al editar el proyecto", "dashboard", $e->getMessage(), "../views/dashboard_admin.php");
        }
    }

    public static function obtenerProyectoPorId($id): array
    {
        include("../config/conexion.php");
        $obtener_1 = $con->prepare("SELECT * FROM proyectos WHERE id = ?");
        $obtener_1->execute([$id]);
        $proyecto = $obtener_1->fetch(PDO::FETCH_ASSOC);

        return $proyecto;
    }

    public function dashboard($ciudad, $empresa)
    {
?>
        <div class="espera col-md-3">
            <h3>En Espera</h3>

            <?php
            include("../config/conexion.php");
            $espera = $con->prepare("SELECT * FROM proyectos WHERE ciudad = ? AND empresa = ? AND status = 'En Espera'");
            $espera->execute([$ciudad, $empresa]);
            $array = $espera->fetchAll(PDO::FETCH_ASSOC);

            if (sizeof($array) > 0) {
                foreach ($array as $array) {
            ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text" id="tipo">Tipo: <?php print $array["tipo"] ?> </p>
                            <p class="card-text" id="programador">Programador: <?php print $array["programador"] ?> </p>
                            <div class="requerimientos">
                                <p class="card-text">Requisitos: <?php print $array["requisitos"] ?></p>
                            </div>
                            <div class="container d-flex flex-column">
                                <form action="editar_proyecto.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array["id"] ?>">
                                    <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                </form>
                                <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array["id"] ?>">
                                    <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No hay proyectos en espera</p>
            <?php
            }
            ?>
        </div>
        <div class="asignado col-md-3">
            <h3>Asignado</h3>

            <?php
            include("../config/conexion.php");
            $espera = $con->prepare("SELECT * FROM proyectos WHERE ciudad = ? AND empresa = ? AND status = 'Asignado'");
            $espera->execute([$ciudad, $empresa]);
            $array2 = $espera->fetchAll(PDO::FETCH_ASSOC);

            if (sizeof($array2) > 0) {
                foreach ($array2 as $array2) {
            ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text" id="tipo">Tipo: <?php print $array2["tipo"] ?> </p>
                            <p class="card-text" id="programador">Programador: <?php print $array2["programador"] ?> </p>
                            <div class="requerimientos">
                                <p class="card-text">Requisitos: <?php print $array2["requisitos"] ?></p>
                            </div>
                            <div class="container d-flex flex-column">
                                <form action="editar_proyecto.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array2["id"] ?>">
                                    <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                </form>
                                <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array2["id"] ?>">
                                    <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No hay proyectos asignados</p>
            <?php
            }
            ?>
        </div>

        <div class="proceso col-md-3">
            <h3>En Proceso</h3>

            <?php
            include("../config/conexion.php");
            $espera = $con->prepare("SELECT * FROM proyectos WHERE ciudad = ? AND empresa = ? AND status = 'En Proceso'");
            $espera->execute([$ciudad, $empresa]);
            $array3 = $espera->fetchAll(PDO::FETCH_ASSOC);

            if (sizeof($array3) > 0) {
                foreach ($array3 as $array3) {
            ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text" id="tipo">Tipo: <?php print $array3["tipo"] ?> </p>
                            <p class="card-text" id="programador">Programador: <?php print $array3["programador"] ?> </p>
                            <div class="requerimientos">
                                <p class="card-text">Requisitos: <?php print $array3["requisitos"] ?></p>
                            </div>
                            <div class="container d-flex flex-column">
                                <form action="editar_proyecto.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array3["id"] ?>">
                                    <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                </form>
                                <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array3["id"] ?>">
                                    <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No hay proyectos en proceso</p>
            <?php
            }
            ?>
        </div>

        <div class="terminado col-md-3">
            <h3>Terminado</h3>

            <?php
            include("../config/conexion.php");
            $espera = $con->prepare("SELECT * FROM proyectos WHERE ciudad = ? AND empresa = ? AND status = 'Terminado'");
            $espera->execute([$ciudad, $empresa]);
            $array4 = $espera->fetchAll(PDO::FETCH_ASSOC);

            if (sizeof($array4) > 0) {
                foreach ($array4 as $array4) {
            ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text" id="tipo">Tipo: <?php print $array4["tipo"] ?> </p>
                            <p class="card-text" id="programador">Programador: <?php print $array4["programador"] ?> </p>
                            <div class="requerimientos">
                                <p class="card-text">Requisitos: <?php print $array4["requisitos"] ?></p>
                            </div>
                            <div class="container d-flex flex-column">
                                <form action="editar_proyecto.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array4["id"] ?>">
                                    <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                </form>
                                <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                    <input type="hidden" name="id" value="<?php print $array4["id"] ?>">
                                    <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No hay proyectos terminados</p>
            <?php
            }
            ?>

        <?php
    }

    public function dashboard_admin()
    { ?>
            <div class="espera col-md-3">
                <h3>En Espera</h3>

                <?php
                include("../config/conexion.php");
                $espera = $con->prepare("SELECT * FROM proyectos WHERE status = 'En Espera'");
                $espera->execute();
                $array = $espera->fetchAll(PDO::FETCH_ASSOC);

                if (sizeof($array) > 0) {
                    foreach ($array as $array) {
                ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text" id="tipo">Tipo: <?php print $array["tipo"] ?> </p>
                                <p class="card-text" id="programador">Programador: <?php print $array["programador"] ?> </p>
                                <div class="requerimientos">
                                    <p class="card-text">Requisitos: <?php print $array["requisitos"] ?></p>
                                </div>
                                <div class="container d-flex flex-column">
                                    <form action="editar_admin.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array["id"] ?>">
                                        <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                    </form>
                                    <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array["id"] ?>">
                                        <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p>No hay proyectos en espera</p>
                <?php
                }
                ?>
            </div>

            <div class="asignado col-md-3">
                <h3>Asignado</h3>

                <?php
                include("../config/conexion.php");
                $espera = $con->prepare("SELECT * FROM proyectos WHERE status = 'Asignado'");
                $espera->execute();
                $array2 = $espera->fetchAll(PDO::FETCH_ASSOC);

                if (sizeof($array2) > 0) {
                    foreach ($array2 as $array2) {
                ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text" id="tipo">Tipo: <?php print $array2["tipo"] ?> </p>
                                <p class="card-text" id="programador">Programador: <?php print $array2["programador"] ?> </p>
                                <div class="requerimientos">
                                    <p class="card-text">Requisitos: <?php print $array2["requisitos"] ?></p>
                                </div>
                                <div class="container d-flex flex-column">
                                    <form action="editar_admin.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array2["id"] ?>">
                                        <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                    </form>
                                    <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array2["id"] ?>">
                                        <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p>No hay proyectos asignados</p>
                <?php
                }
                ?>
            </div>

            <div class="proceso col-md-3">
                <h3>En Proceso</h3>

                <?php
                include("../config/conexion.php");
                $espera = $con->prepare("SELECT * FROM proyectos WHERE status = 'En Proceso'");
                $espera->execute();
                $array3 = $espera->fetchAll(PDO::FETCH_ASSOC);

                if (sizeof($array3) > 0) {
                    foreach ($array3 as $array3) {
                ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text" id="tipo">Tipo: <?php print $array3["tipo"] ?> </p>
                                <p class="card-text" id="programador">Programador: <?php print $array3["programador"] ?> </p>
                                <div class="requerimientos">
                                    <p class="card-text">Requisitos: <?php print $array3["requisitos"] ?></p>
                                </div>
                                <div class="container d-flex flex-column">
                                    <form action="editar_admin.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array3["id"] ?>">
                                        <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                    </form>
                                    <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array3["id"] ?>">
                                        <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p>No hay proyectos en proceso</p>
                <?php
                }
                ?>
            </div>

            <div class="terminado col-md-3">
                <h3>Terminado</h3>

                <?php
                include("../config/conexion.php");
                $espera = $con->prepare("SELECT * FROM proyectos WHERE status = 'Terminado'");
                $espera->execute();
                $array4 = $espera->fetchAll(PDO::FETCH_ASSOC);

                if (sizeof($array4) > 0) {
                    foreach ($array4 as $array4) {
                ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text" id="tipo">Tipo: <?php print $array4["tipo"] ?> </p>
                                <p class="card-text" id="programador">Programador: <?php print $array4["programador"] ?> </p>
                                <div class="requerimientos">
                                    <p class="card-text">Requisitos: <?php print $array4["requisitos"] ?></p>
                                </div>
                                <div class="container d-flex flex-column">
                                    <form action="editar_admin.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array4["id"] ?>">
                                        <button type="submit" class="btn btn-outline-warning" id="edit_amarillo">Editar</button>
                                    </form>
                                    <form action="../controller/eliminar_proyecto_controller.php" method="POST">
                                        <input type="hidden" name="id" value="<?php print $array4["id"] ?>">
                                        <button type="submit" class="btn btn-outline-danger" id="delete">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p>No hay proyectos terminados</p>
        <?php
                }
            }
        }
