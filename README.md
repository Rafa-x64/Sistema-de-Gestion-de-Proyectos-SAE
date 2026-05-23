<div align="center">

# 📋 Sistema de Gestión de Proyectos — SAE

**Un sistema web completo para gestionar el ciclo de vida de proyectos tecnológicos,  
desde su solicitud hasta su entrega.**

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![MVC](https://img.shields.io/badge/Patrón-MVC-28A745?style=for-the-badge)
![PDO](https://img.shields.io/badge/Acceso_BD-PDO-FF6F00?style=for-the-badge)

</div>

---

## ✨ ¿Qué es este proyecto?

El **Sistema de Gestión de Proyectos SAE** es una aplicación web desarrollada en PHP que permite a la empresa **Sistemas SAE** y sus clientes gestionar proyectos tecnológicos de forma centralizada.

Los clientes pueden registrarse, crear proyectos y hacer seguimiento de su estado. Los administradores tienen acceso a un panel global donde pueden ver, coordinar y actualizar todos los proyectos en un tablero tipo **Kanban**.

> 🏢 Desarrollado para **B y C Computación, C.A.** y su producto **AsistEscolar**, orientado a instituciones educativas públicas y privadas de Venezuela.

---

## 🚀 Características Principales

| Funcionalidad | Descripción |
|---|---|
| 🔐 **Autenticación** | Sistema de login y registro con sesiones PHP |
| 👤 **Roles de usuario** | Panel diferenciado para usuarios normales y administradores |
| 📁 **Gestión de proyectos** | Crear, editar y eliminar proyectos con todos sus detalles |
| 🗂️ **Tablero Kanban** | Proyectos organizados por estado: *En Espera → Asignado → En Proceso → Terminado* |
| ⚙️ **Configuración de cuenta** | Editar datos personales o eliminar la cuenta |
| 📬 **Módulo de contacto** | Página para solicitudes y comunicación directa |
| 📱 **Diseño Responsivo** | Adaptado a móviles, tabletas y escritorio con Bootstrap 5 |

---

## 🗂️ Estructura del Proyecto

```
Sistema-de-Gestion-de-Proyectos-SAE/
│
├── index.php                        # Landing page principal
├── proyecto_sae.sql                 # ⭐ Script SQL (tablas + datos de ejemplo)
│
├── assets/
│   ├── css/                         # Hojas de estilo personalizadas
│   └── img/                         # Imágenes y logotipos
│
├── config/
│   ├── conexion.php                 # ⚙️ Configuración de conexión PDO
│   └── cerrar_sesion.php            # Destrucción de sesiones
│
├── modelo/
│   ├── proyectos.php                # Lógica de negocio de proyectos
│   └── usuario.php                  # Lógica de negocio de usuarios
│
├── controller/
│   ├── login_controller.php
│   ├── registro_controller.php
│   ├── agregar_proyecto_controller.php
│   ├── editar_proyecto_controller.php
│   ├── eliminar_proyecto_controller.php
│   ├── editar_cuenta_controller.php
│   └── ...
│
└── views/
    ├── login.php
    ├── registro.php
    ├── dashboard.php                # Panel del usuario normal
    ├── dashboard_admin.php          # Panel del administrador
    ├── agregar_proyecto.php
    ├── editar_proyecto.php
    ├── editar_admin.php
    ├── contacto.php
    └── layouts/
        ├── header.html
        ├── header_dashboard.php
        ├── header_dashboard_admin.php
        └── footer.html
```

---

## 🛠️ Requisitos Previos

Antes de instalar, asegúrate de tener lo siguiente:

| Componente | Versión mínima | Notas |
|---|---|---|
| **PHP** | `>= 8.0` | Con extensiones `pdo` y `pdo_mysql` activas |
| **MySQL** o **MariaDB** | `>= 5.7` / `>= 10.4` | Cualquiera funciona |
| **Apache** o **Nginx** | Cualquier versión reciente | Apache recomendado |
| **Navegador** | Moderno | Chrome, Firefox, Edge, Safari |

---

## 📦 Instalación Paso a Paso

### 🐧 Linux (LAMP Stack)

#### Paso 1 — Instalar Apache, PHP y MariaDB

```bash
# Ubuntu / Debian
sudo apt update && sudo apt install apache2 php php-mysql php-pdo mariadb-server -y

# Arch Linux / Manjaro
sudo pacman -S apache php php-apache mariadb

# Fedora / RHEL / CentOS
sudo dnf install httpd php php-mysqlnd mariadb-server -y
```

#### Paso 2 — Iniciar y habilitar los servicios

```bash
# Ubuntu / Debian
sudo systemctl enable --now apache2 mariadb

# Arch Linux
sudo systemctl enable --now httpd mariadb

# Fedora / RHEL
sudo systemctl enable --now httpd mariadb
```

#### Paso 3 — Clonar el repositorio

```bash
cd /var/www/html
sudo git clone https://github.com/Rafa-x64/Sistema-de-Gestion-de-Proyectos-SAE.git
sudo chown -R www-data:www-data Sistema-de-Gestion-de-Proyectos-SAE
```

> En Arch Linux el usuario del servidor web puede ser `http` en lugar de `www-data`:
> ```bash
> sudo chown -R http:http Sistema-de-Gestion-de-Proyectos-SAE
> ```

#### Paso 4 — Configurar la base de datos

> ➡️ Ver la sección **[🗄️ Configuración de la Base de Datos](#️-configuración-de-la-base-de-datos)** más abajo.

#### Paso 5 — Acceder al sistema

```
http://localhost/Sistema-de-Gestion-de-Proyectos-SAE/
```

---

### 🪟 Windows (XAMPP)

#### Paso 1 — Instalar XAMPP

Descarga e instala **XAMPP** desde [https://www.apachefriends.org](https://www.apachefriends.org)

> ✅ XAMPP incluye Apache, PHP y MariaDB preconfigurados. Elige la versión con **PHP 8.x**.

#### Paso 2 — Clonar o descargar el proyecto

**Opción A — Con Git (recomendado):**
```bash
# Abre Git Bash o PowerShell
cd C:\xampp\htdocs
git clone https://github.com/Rafa-x64/Sistema-de-Gestion-de-Proyectos-SAE.git
```

**Opción B — Descarga manual:**
1. Ve al repositorio en GitHub
2. Haz clic en **Code → Download ZIP**
3. Extrae la carpeta dentro de `C:\xampp\htdocs\`

#### Paso 3 — Iniciar los servicios en XAMPP

1. Abre el **Panel de Control de XAMPP**
2. Haz clic en **Start** junto a **Apache**
3. Haz clic en **Start** junto a **MySQL**

> ⚠️ Si Apache no inicia, puede ser que el puerto 80 esté ocupado (por Skype, IIS, etc.). Cámbialo a `8080` en la configuración de XAMPP.

#### Paso 4 — Configurar la base de datos

> ➡️ Ver la sección **[🗄️ Configuración de la Base de Datos](#️-configuración-de-la-base-de-datos)** más abajo.

#### Paso 5 — Acceder al sistema

```
http://localhost/Sistema-de-Gestion-de-Proyectos-SAE/
```

---

## 🗄️ Configuración de la Base de Datos

Esta es la parte más importante. Sigue cada paso con cuidado.

### Esquema de tablas

El proyecto usa **2 tablas** dentro de la base de datos `proyecto_sae`:

#### Tabla `users` — Usuarios del sistema

| Campo | Tipo | Descripción |
|---|---|---|
| `id` | INT (PK, AUTO_INCREMENT) | Identificador único |
| `nombre` | VARCHAR(255) | Nombre completo del usuario |
| `correo` | VARCHAR(255) | Correo electrónico (sirve como usuario de login) |
| `contraseña` | VARCHAR(255) | Contraseña del usuario |
| `empresa` | VARCHAR(255) | Empresa u organización a la que pertenece |
| `ciudad` | VARCHAR(255) | Ciudad de la empresa |

#### Tabla `proyectos` — Proyectos registrados

| Campo | Tipo | Descripción |
|---|---|---|
| `id` | INT (PK, AUTO_INCREMENT) | Identificador único |
| `empresa` | VARCHAR(255) | Empresa que solicitó el proyecto |
| `ciudad` | VARCHAR(255) | Ciudad de la empresa cliente |
| `fecha` | VARCHAR(255) | Fecha de registro del proyecto |
| `tipo` | VARCHAR(255) | Tipo de proyecto (Evaluación, SAE Web, SAE Pagos, etc.) |
| `programador` | VARCHAR(255) | Programador(es) asignado(s) |
| `status` | VARCHAR(255) | Estado: `En Espera`, `Asignado`, `En Proceso`, `Terminado` |
| `requisitos` | TEXT | Descripción detallada de los requisitos |

> 💡 **Importante:** El dashboard filtra los proyectos por `ciudad` y `empresa` del usuario logueado, por lo que los proyectos aparecen agrupados correctamente para cada cliente.

---

### Opción A — Línea de comandos (Linux y Windows)

#### 1. Asegurar que MariaDB/MySQL esté corriendo

```bash
# Linux
sudo systemctl status mariadb   # debe decir "active (running)"

# Windows — verifica en el Panel de Control de XAMPP que MySQL diga "Running"
```

#### 2. Acceder a MySQL como root

```bash
# Linux
sudo mysql -u root -p
# (Si nunca pusiste contraseña a root en una instalación nueva, prueba sin contraseña: sudo mysql)

# Windows (desde C:\xampp\mysql\bin o con Git Bash / PowerShell)
"C:\xampp\mysql\bin\mysql.exe" -u root -p
# La contraseña de root en XAMPP está vacía por defecto, solo presiona Enter
```

#### 3. Crear la base de datos

Una vez dentro del prompt de MySQL (`MariaDB [(none)]>`):

```sql
CREATE DATABASE proyecto_sae CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
SHOW DATABASES;   -- verifica que aparezca "proyecto_sae" en la lista
EXIT;
```

#### 4. Importar el archivo SQL

```bash
# Linux
sudo mysql -u root -p proyecto_sae < /var/www/html/Sistema-de-Gestion-de-Proyectos-SAE/proyecto_sae.sql

# Windows (Git Bash o PowerShell desde el directorio del proyecto)
"C:\xampp\mysql\bin\mysql.exe" -u root proyecto_sae < proyecto_sae.sql
```

> ✅ Si no ves ningún error, la importación fue exitosa. Puedes verificarlo entrando a MySQL y corriendo:
> ```sql
> USE proyecto_sae;
> SHOW TABLES;
> -- Debe mostrar: proyectos | users
> SELECT COUNT(*) FROM users;
> -- Debe mostrar: 11
> ```

---

### Opción B — phpMyAdmin (interfaz gráfica, más fácil)

phpMyAdmin viene incluido con XAMPP en Windows y puede instalarse en Linux fácilmente.

#### Linux — Instalar phpMyAdmin (opcional)

```bash
# Ubuntu / Debian
sudo apt install phpmyadmin -y
# Durante la instalación selecciona "apache2" y configura la contraseña

# Luego accede en: http://localhost/phpmyadmin
```

#### Pasos en phpMyAdmin

1. Abre `http://localhost/phpmyadmin` en tu navegador
2. Inicia sesión con usuario `root` (contraseña vacía en XAMPP, o la que hayas definido en Linux)
3. En el panel izquierdo, haz clic en **Nueva** (o "New")
4. En el campo **Nombre de la base de datos** escribe exactamente: `proyecto_sae`
5. En el selector de cotejamiento elige: `utf8mb4_general_ci`
6. Haz clic en **Crear**
7. Con la base de datos `proyecto_sae` seleccionada en el panel izquierdo, ve a la pestaña **Importar**
8. Haz clic en **Seleccionar archivo** y busca el archivo `proyecto_sae.sql` dentro de la carpeta del proyecto
9. Deja todas las opciones por defecto y haz clic en **Importar**
10. Deberías ver un mensaje de éxito en verde ✅

---

### Paso final — Ajustar `config/conexion.php`

Abre el archivo `config/conexion.php` y verifica que los datos coincidan con tu entorno:

```php
<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=proyecto_sae", "root", "");
    //                                                           ^^^^   ^^
    //                                                    usuario    contraseña
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
```

| Entorno | Usuario | Contraseña |
|---|---|---|
| **XAMPP (Windows)** | `root` | *(vacía — deja `""`)* |
| **Linux recién instalado** | `root` | *(vacía o la que definiste en `mysql_secure_installation`)* |
| **Linux con contraseña** | `root` | `"tu_contraseña_aqui"` |

> ⚠️ **Si tuviste errores al importar** el `.sql`, puede ser por el modo SQL estricto. Prueba entrar a MySQL y ejecutar:
> ```sql
> SET GLOBAL sql_mode = '';
> ```
> Luego repite la importación.

---

### ¿Problemas con la conexión? — Solución de errores comunes

| Error | Causa probable | Solución |
|---|---|---|
| `SQLSTATE[HY000] [1045] Access denied` | Contraseña incorrecta | Verifica usuario/contraseña en `conexion.php` |
| `SQLSTATE[HY000] [2002] No such file or directory` | MySQL no está corriendo | Inicia el servicio MariaDB/MySQL |
| `SQLSTATE[42000] Unknown database 'proyecto_sae'` | La BD no fue creada | Crea la base de datos y vuelve a importar el `.sql` |
| `Table 'proyecto_sae.users' doesn't exist` | El SQL no se importó | Repite el paso de importación |
| Página en blanco | Error PHP oculto | Agrega `ini_set('display_errors', 1);` al inicio de `index.php` para ver el error |

---

## ⚙️ Verificar Extensiones de PHP

Las extensiones `pdo` y `pdo_mysql` deben estar habilitadas. Verifica así:

```bash
php -m | grep pdo
# Debe mostrar: pdo_mysql y pdo
```

Si no aparecen, edita `php.ini` y asegúrate de que estas líneas estén **sin el punto y coma** al inicio:

```ini
extension=pdo_mysql
extension=mysqli
```

**Ubicación del `php.ini`:**

| Sistema | Ruta |
|---|---|
| Ubuntu/Debian + Apache | `/etc/php/8.x/apache2/php.ini` |
| Arch Linux | `/etc/php/php.ini` |
| XAMPP Windows | `C:\xampp\php\php.ini` |

Después de editar, **reinicia Apache**:

```bash
# Linux
sudo systemctl restart apache2   # o httpd en Arch/Fedora

# Windows: XAMPP Panel → Apache → Stop → Start
```

---

## 🔑 Credenciales de Prueba

El archivo `proyecto_sae.sql` incluye datos de ejemplo listos para usar:

| Rol | Correo | Contraseña |
|---|---|---|
| 🛡️ **Administrador** | `admin@SAE.com` | `123456` |
| 👤 **Usuario normal** | `ejemplo@gmail.com` | `123456` |
| 👤 **Usuario normal** | `ejemplo2@gmail.com` | `123456` |

> ⚠️ Estas credenciales son solo para pruebas en entorno local. **No uses estas contraseñas en producción.**

---

## 🧭 Flujo de Uso

```
Abrir la landing page
        ↓
  Registrarse / Iniciar sesión
        ↓
  ┌─────────────────────────────────┐
  │                                 │
[Usuario normal]            [Administrador admin@SAE.com]
  │                                 │
Ver mis proyectos            Ver TODOS los proyectos
  (filtrados por             de todas las empresas
   empresa + ciudad)                │
  │                         Editar estado de cualquier
Crear / editar /             proyecto
  eliminar mis               │
  proyectos                 Gestionar usuarios
  │
Configurar mi cuenta
```

---

## 🧱 Tecnologías Utilizadas

| Capa | Tecnología |
|---|---|
| Backend | PHP 8 — Arquitectura MVC artesanal |
| Base de datos | MySQL / MariaDB con PDO (consultas preparadas) |
| Frontend | HTML5, CSS3 personalizado |
| Framework CSS | Bootstrap 5.3 |
| Sesiones | PHP Sessions nativas |

---

## 🤝 Contribuir

¡Las contribuciones son bienvenidas! Si deseas mejorar este proyecto:

1. Haz un **fork** del repositorio
2. Crea una rama: `git checkout -b feature/mi-mejora`
3. Haz commit: `git commit -m "Agrego: mi mejora"`
4. Sube los cambios: `git push origin feature/mi-mejora`
5. Abre un **Pull Request**

---

## 📄 Licencia

Este proyecto se distribuye con fines educativos y de demostración.  
Desarrollado por **B y C Computación, C.A.** — [AsistEscolar](https://asistescolar.com/)

---

<div align="center">

Hecho con ❤️ por el equipo de **Sistemas SAE**

</div>
