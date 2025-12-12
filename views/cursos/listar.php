<?php ob_start(); ?>
<h1 class="text-3xl font-bold mb-6">Cursos Disponibles</h1>

<ul class="space-y-4">
    <?php foreach ($cursos as $curso): ?>
        <li class="bg-gray-800 p-4 rounded-xl border border-gray-700">
            <a href="index.php?action=ver_curso&id=<?= $curso['id_curso'] ?>"
               class="text-blue-400 hover:text-blue-300 text-lg">
                <?= htmlspecialchars($curso['nombre']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
$title = "Cursos Disponibles";
require __DIR__ . '/../layout.php';
?>
