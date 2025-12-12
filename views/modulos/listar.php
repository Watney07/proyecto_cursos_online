<?php ob_start(); ?>

<h2 class="text-3xl font-bold mb-6">Mis Módulos Asignados</h2>

<div class="space-y-6">
<?php foreach ($modulos as $mod): ?>
    <div class="bg-gray-800 p-5 rounded-xl border border-gray-700">
        <h4 class="text-xl font-semibold">
            <?= htmlspecialchars($mod['titulo']) ?>
        </h4>

        <p class="text-gray-400 text-sm mb-3">
            Curso: <strong><?= htmlspecialchars($mod['curso_nombre']) ?></strong> —
            Versión: <?= htmlspecialchars($mod['numero_version']) ?>
        </p>

        <p class="mb-4 text-gray-300">
            <?= htmlspecialchars($mod['descripcion']) ?>
        </p>

        <a href="<?= BASE_URL ?>/public/index.php?action=ver_materiales&id_modulo=<?= $mod['id_modulo'] ?>"
           class="text-blue-400 hover:text-blue-300">
           Ver Materiales →
        </a>
    </div>
<?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
$title = "Mis Módulos";
require __DIR__ . '/../layout.php';
?>
