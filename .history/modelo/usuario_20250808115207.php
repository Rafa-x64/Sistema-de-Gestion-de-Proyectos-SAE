<?php
class usuario
{

    public $nombre;
    public $correo;
    public $contraseña;
    public $empresa;
    public $ciudad;

    public function __construct($nombre = null, $correo = null, $contraseña  = null, $empresa  = null, $ciudad  = null)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->empresa = $empresa;
        $this->ciudad = $ciudad;
    }

    public function registrar() //registra un nuevo usuario
    {
        if ($this->comprobar_correo($this->correo) == true) {
            try {
                include("../config/conexion.php");
                $registro = $con->prepare("INSERT INTO users (nombre, correo, contraseña, empresa, ciudad) VALUES (?, ?, ?, ?, ?)");
                $registro->execute([$this->nombre, $this->correo, $this->contraseña, $this->empresa, $this->ciudad]);

                print("registro exitoso");
            } catch (PDOException $e) {
                print($e->getMessage());
            }
        } else {
            print("el correo ya existe");
        }
    }

    public function comprobar_correo($correo): bool //comprueba si el correo ya existe
    {
        include("../config/conexion.php");
        $verificar = $con->prepare("SELECT * FROM users WHERE correo = ?");
        $verificar->execute([$correo]);
        $verificacion = $verificar->fetch(PDO::FETCH_ASSOC);
        if ($verificacion && $correo == $verificacion["correo"]) {
            return false;
        } else {
            return true;
        }
    }

    public function inciar_sesion($correo, $contraseña) //inicia sesion
    {
        if ($this->tipo_usuario($correo, $contraseña) == "usuario") {
            if ($this->validar_inicio_sesion($correo, $contraseña) == true) {
                $this->guardar_en_sesiones($correo); //guarda los datos relacionados al correo en la sesion
?>
                <meta http-equiv="refresh" content="0;url=../views/dashboard.php">
            <?php
            } else {
                print("correo o contraseña incorrectos... regresando al login en 4 segundos");
            ?>
                <meta http-equiv="refresh" content="4;url=../views/login.php">
            <?php
            }
        } elseif ($this->tipo_usuario($correo, $contraseña) == "admin") {
            if ($this->validar_inicio_sesion($correo, $contraseña) == true) {
                $this->guardar_en_sesiones($correo);
            ?>
                <meta http-equiv="refresh" content="0;url=../views/dashboard_admin.php">
            <?php
            }
            ?>

        <?php
        }
    }

    public function tipo_usuario($correo, $contraseña): string
    {
        if ($correo == "admin@SAE.com" && $contraseña == "123456") {
            return "admin";
        } else {
            if ($this->validar_inicio_sesion($correo, $contraseña)) {
                return "usuario";
            }
        }
        return "desconocido";
    }

    public function validar_inicio_sesion($correo, $contraseña): bool
    {
        include("../config/conexion.php");
        $verificar = $con->prepare("SELECT * FROM users WHERE correo = ? AND contraseña = ?");
        $verificar->execute([$correo, $contraseña]);
        $verificacion = $verificar->fetch(PDO::FETCH_ASSOC);
        if ($verificacion && $correo == $verificacion["correo"] && $contraseña == $verificacion["contraseña"]) {
            return true; //si existe un usuario con este nombre y contraseña
        } else {
            return false; //no existe un usuario con este nombre y contraseña
        }
    }

    public function guardar_en_sesiones($correo)
    {
        include("../config/conexion.php");
        $guardar = $con->prepare("SELECT * FROM users WHERE correo = ?");
        $guardar->execute([$correo]);
        $usuario = $guardar->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION["id"] = $usuario["id"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["correo"] = $usuario["correo"];
        $_SESSION["contraseña"] = $usuario["contraseña"];
        $_SESSION["empresa"] = $usuario["empresa"];
        $_SESSION["ciudad"] = $usuario["ciudad"];
    }

    public function extraer_datos($id)
    {
        include("../config/conexion.php");
        try {
            $usuario = $con->prepare("SELECT * FROM users WHERE id = ?");
            $usuario->execute([$_SESSION["id"]]);
            $datos = $usuario->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="container">
                <h1 style="margin-top:1.5rem; margin-bottom:1.5rem;">Configuracion de la cuenta</h1>
                <form action="editar_cuenta.php" method="POST">
                    <input type="hidden" value="<?php print $datos["id"]; ?>" name="id">
                    <div class="mb-3">
                        <label for="nombre">Nombre: </label>
                        <input type="text" value="<?php print $datos["nombre"] ?>" name="nombre" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="correo">Email: </label>
                        <input type="text" value="<?php print $datos["correo"] ?>" name="correo" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña">Contraseña: </label>
                        <input type="text" value="<?php print $datos["contraseña"] ?>" name="contraseña" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="empresa">Empresa: </label>
                        <input type="text" value="<?php print $datos["empresa"] ?>" name="empresa" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="ciudad">Ciudad: </label>
                        <input type="text" value="<?php print $datos["ciudad"] ?>" name="ciudad" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">editar</button>
                </form>
                <form action="../controller/eliminar_cuenta_controller.php" method="POST">
                    <input type="hidden" value="<?php echo $id ?>" name="id" readonly>
                    <button type="submit" class="btn btn-danger">eliminar cuenta</button>
                </form>
            </div>
<?php
        } catch (PDOException $e) {
            print($e->getMessage());
        }
    }

    public function editar_usuario($id, $nombre, $correo, $contraseña, $empresa, $ciudad)
    {
        try {
            include("../config/conexion.php");
            $editar = $con->prepare("UPDATE users SET nombre = ?, correo = ?, contraseña =?, empresa = ?, ciudad = ? WHERE id = ?");
            $editar->execute([$nombre, $correo, $contraseña, $empresa, $ciudad, $id]);
            print("usuario editado con exito");
        } catch (PDOException $e) {
            print($e->getMessage());
        };
    }

    public function eliminar_usuario($id)
    {
        try {
            include("../config/conexion.php");
            $eliminar = $con->prepare("DELETE FROM users WHERE id = ?");
            $eliminar->execute([$id]);
            print("usuario eliminado con exito");
        } catch (PDOException $e) {
            print($e->getMessage());
        }
    }
}
