<h1>Módulos</h1>
<a href="index.php?action=versiones&id_curso=<?php echo $_GET['id_curso'] ?? 0; ?>">Volver a versiones</a>

<?php if(count($modulos) === 0): ?>
    <p>No tienes acceso a ningún módulo de esta versión.</p>
<?php else: ?>
    <ul>
        <?php foreach($modulos as $m): ?>
            <li>
                - <a href="index.php?action=materiales&id_modulo=<?php echo $m['id_modulo']; ?>&id_version=<?php echo $id_version; ?>&id_curso=<?php echo $id_curso; ?>">Ver materiales</a>
                <strong><?php echo htmlspecialchars($m['titulo']); ?></strong>
                - <?php echo htmlspecialchars($m['descripcion']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
