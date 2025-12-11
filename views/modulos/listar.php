<h2>Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?></h2>
<a href="/index.php?action=logout">Cerrar sesión</a>

<h3>Mis Módulos Asignados</h3>
<?php foreach ($modulos as $mod): ?>
<div>
    <h4><?= htmlspecialchars($mod['titulo']) ?> (Curso: <?= htmlspecialchars($mod['curso_nombre']) ?>, Versión: <?= htmlspecialchars($mod['numero_version']) ?>)</h4>
    <p><?= htmlspecialchars($mod['descripcion']) ?></p>
    <a href="<?= BASE_URL ?>/public/index.php?action=ver_materiales&id_modulo=<?= $mod['id_modulo'] ?>">Ver Materiales</a>
</div>
<?php endforeach; ?>
