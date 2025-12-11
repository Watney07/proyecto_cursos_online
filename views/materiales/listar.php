<h1>Materiales del Módulo</h1>
<ul>
<?php foreach ($materiales as $mat): ?>
    <li><?= htmlspecialchars($mat['titulo']) ?> (<?= htmlspecialchars($mat['tipo']) ?>)
        - <a href="<?= htmlspecialchars($mat['url']) ?>">Ver</a>
    </li>
<?php endforeach; ?>
</ul>
