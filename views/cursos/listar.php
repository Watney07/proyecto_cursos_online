<h1>Cursos Disponibles</h1>
<ul>
<?php foreach ($cursos as $curso): ?>
    <li>
        <a href="index.php?action=ver_curso&id=<?= $curso['id_curso'] ?>">
            <?= htmlspecialchars($curso['nombre']) ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
