<?php
// public/index.php
// Punto de entrada mínimo para probar la conexión a la DB.

require_once __DIR__ . '/../config/database.php';
$config = require __DIR__ . '/../config/config.php';

// Opcional: define DEBUG para ver errores en pantalla
define('DEBUG', $config['env'] === 'development');

$db = new Database($config['db']);
$pdo = $db->connect();

require_once __DIR__ . '/../controllers/CursoController.php';
require_once __DIR__ . '/../controllers/VersionCursoController.php';

$controller = $_GET['controller'] ?? 'curso';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$pdo = $db->connect();

switch ($controller) {
    case 'curso':
        $ctrl = new CursoController($pdo);
        break;

    default:
        die("Controlador no encontrado.");
}

switch ($controller) {
    case 'curso':
        $ctrl = new CursoController($pdo);
        break;

    case 'version':
        $ctrl = new VersionCursoController($pdo);
        break;

    default:
        die("Controlador no encontrado.");
}

if (!method_exists($ctrl, $action)) {
    die("Acción '$action' no existe.");
}

$id ? $ctrl->$action($id) : $ctrl->$action();

// Versiones
case 'versiones':
    $controller = new VersionCursoController();
    $controller->index($_GET['id_curso']);
    break;

case 'crear_version':
    $controller = new VersionCursoController();
    $controller->create($_GET['id_curso']);
    break;

case 'editar_version':
    $controller = new VersionCursoController();
    $controller->edit($_GET['id']);
    break;

case 'ver_version':
    $controller = new VersionCursoController();
    $controller->view($_GET['id']);
    break;

case 'eliminar_version':
    $controller = new VersionCursoController();
    $controller->delete($_GET['id']);
    break;


?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Prueba - Cursos Online</title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:40px}
    .ok{color:green}
    .err{color:red}
    pre{background:#f5f5f5;padding:10px;border-radius:6px}
  </style>
</head>
<body>
  <h1>Prueba de conexión — Cursos Online</h1>

  <?php if ($pdo): ?>
    <p class="ok">Conexión a la base de datos <strong>exitosa</strong>.</p>

    <h3>Resumen tablas existentes (SHOW TABLES)</h3>
    <?php
      try {
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_NUM);
        if (count($tables) === 0) {
            echo "<p>No hay tablas aún. Asegúrate de ejecutar el script SQL para crear la BD.</p>";
        } else {
            echo "<ul>";
            foreach ($tables as $t) {
                echo "<li>" . htmlspecialchars($t[0]) . "</li>";
            }
            echo "</ul>";
        }
      } catch (Exception $e) {
        echo "<p class='err'>No se pudo listar tablas: " . htmlspecialchars($e->getMessage()) . "</p>";
      }
    ?>

  <?php else: ?>
    <p class="err">No se ha podido conectar con la base de datos.</p>
    <?php if (DEBUG): ?>
      <p>Revisa credenciales en <code>config/config.php</code> y que la base de datos exista.</p>
    <?php endif; ?>
  <?php endif; ?>

</body>
</html>
