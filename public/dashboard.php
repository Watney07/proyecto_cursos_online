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
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - <?php echo $_SESSION['nombre']; ?></title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
    <a href="logout.php">Cerrar sesión</a>

    <h2>Mis Módulos Asignados</h2>
    <?php if ($modulos): ?>
        <ul>
            <?php foreach ($modulos as $mod): ?>
                <li>
                    <strong><?php echo $mod['titulo']; ?></strong> (Curso: <?php echo $mod['curso']; ?>, Versión: <?php echo $mod['numero_version']; ?>)<br>
                    <?php echo $mod['descripcion']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No tienes módulos asignados aún.</p>
    <?php endif; ?>
</body>
</html>
