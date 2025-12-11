<?php foreach ($modulos as $mod): ?>
    <div>
        <h4><?= htmlspecialchars($mod['titulo']) ?> (Curso: <?= htmlspecialchars($mod['curso_nombre']) ?>, Versión: <?= htmlspecialchars($mod['numero_version']) ?>)</h4>
        <p><?= htmlspecialchars($mod['descripcion']) ?></p>
        <a href="/index.php?action=ver_materiales&id_modulo=<?= $mod['id_modulo'] ?>">Ver Materiales</a>
    </div>
<?php endforeach; ?>
