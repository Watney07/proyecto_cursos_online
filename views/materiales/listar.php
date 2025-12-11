<?php if (empty($materiales)) {
    echo "<p>No tienes acceso a materiales para este módulo.</p>";
    return;
} ?>

<h3>Materiales del módulo</h3>
<ul>
<?php foreach ($materiales as $m): ?>
    <li>
        <?= htmlspecialchars($m['titulo']) ?> (<?= htmlspecialchars($m['tipo']) ?>) -
        <a href="<?= htmlspecialchars($m['url']) ?>" target="_blank">Ver</a>
    </li>
<?php endforeach; ?>
</ul>

<a href="/index.php?action=mis_modulos">Volver a Mis Módulos</a>
