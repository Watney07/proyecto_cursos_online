<?php
session_start();
if (!isset($_SESSION['id_estudiante'])) {
    header("Location: login.php");
    exit;
}

require_once "../models/db.php";

$id_estudiante = $_SESSION['id_estudiante'];

// Obtener módulos asignados
$stmt = $pdo->prepare("
    SELECT M.id_modulo, M.titulo, M.descripcion, V.numero_version, C.nombre AS curso
    FROM ACCESO_MODULO AM
    JOIN MODULO M ON AM.id_modulo = M.id_modulo
    JOIN VERSION_CURSO V ON M.id_version = V.id_version
    JOIN CURSO C ON V.id_curso = C.id_curso
    WHERE AM.id_estudiante = ?
");
$stmt->execute([$id_estudiante]);
$modulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - <?php echo $_SESSION['nombre']; ?></title>
    <link rel="stylesheet" href="/proyecto_cursos_online/public/styles.css">

</head>
<body>

<div class="container">

    <div class="topbar">
        <a href="logout.php" class="logout-link">Cerrar sesión</a>
    </div>

    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>

    <h2>Mis Módulos Asignados</h2>

    <?php if ($modulos): ?>
        <ul class="module-list">
            <?php foreach ($modulos as $mod): ?>
                <li>
                    <strong><?php echo $mod['titulo']; ?></strong>
                    <br>
                    <small>
                        Curso: <?php echo $mod['curso']; ?> |
                        Versión: <?php echo $mod['numero_version']; ?>
                    </small>
                    <p><?php echo $mod['descripcion']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="empty-msg">No tienes módulos asignados aún.</p>
    <?php endif; ?>

</div>

</body>
</html>
