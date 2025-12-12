
<h3 class="text-2xl font-bold mb-6">Materiales del Módulo</h3>

<?php if (empty($materiales)): ?>
    <p class="text-gray-400">No tienes acceso a materiales para este módulo.</p>
<?php else: ?>

<ul class="space-y-4">
<?php foreach ($materiales as $m): ?>
    <li class="bg-gray-800 p-4 rounded-xl border border-gray-700">
        <p class="text-lg font-semibold"><?= htmlspecialchars($m['titulo']) ?></p>
        <p class="text-gray-400 text-sm mb-2"><?= htmlspecialchars($m['tipo']) ?></p>

        <a href="<?= htmlspecialchars($m['url']) ?>"
           target="_blank"
           class="text-blue-400 hover:text-blue-300">
           Abrir →
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php endif; ?>

<a href="<?= BASE_URL ?>/public/index.php?action=mis_modulos"
   class="block mt-6 text-gray-300 hover:text-gray-200">
   ← Volver a Mis Módulos
</a>

<?php
$content = ob_get_clean();
$title = "Materiales";
require __DIR__ . '/../layout.php';
?>
