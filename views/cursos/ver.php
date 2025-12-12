<?php ob_start(); ?>

<h1 class="text-3xl font-bold mb-4">
    <?= htmlspecialchars($data['curso']['nombre']) ?>
</h1>

<p class="text-gray-300 mb-8"><?= htmlspecialchars($data['curso']['descripcion']) ?></p>

<h2 class="text-2xl font-semibold mb-4">Módulos</h2>

<ul class="space-y-4">
<?php foreach ($data['modulos'] as $modulo): ?>
    <li class="bg-gray-800 p-4 rounded-xl border border-gray-700">
        <span class="text-lg font-semibold"><?= htmlspecialchars($modulo['titulo']) ?></span>

        <a href="index.php?action=listar_materiales&id_modulo=<?= $modulo['id_modulo'] ?>"
           class="block mt-2 text-blue-400 hover:text-blue-300">
           Ver Materiales →
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
$title = "Curso: " . $data['curso']['nombre'];
require __DIR__ . '/../layout.php';
?>
