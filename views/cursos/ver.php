<h1><?= htmlspecialchars($data['curso']['nombre']) ?></h1>
<p><?= htmlspecialchars($data['curso']['descripcion']) ?></p>

<h2>Módulos</h2>
<ul>
<?php foreach ($data['modulos'] as $modulo): ?>
    <li>
        <?= htmlspecialchars($modulo['titulo']) ?> -
        <a href="index.php?action=listar_materiales&id_modulo=<?= $modulo['id_modulo'] ?>">Ver Materiales</a>
    </li>
<?php endforeach; ?>
</ul>
