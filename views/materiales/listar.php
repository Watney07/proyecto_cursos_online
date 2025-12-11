<h1>Materiales</h1>
<a href="index.php?action=modulos&id_version=<?php echo $_GET['id_version']; ?>&id_curso=<?php echo $_GET['id_curso']; ?>">Volver a módulos</a>

<?php if(count($materiales) === 0): ?>
    <p>No hay materiales para este módulo.</p>
<?php else: ?>
    <ul>
        <?php foreach($materiales as $mat): ?>
            <li>
                <strong><?php echo htmlspecialchars($mat['titulo']); ?></strong>
                (<?php echo htmlspecialchars($mat['tipo']); ?>)
                - Instructor: <?php echo htmlspecialchars($mat['instructor']); ?>
                <br>
                URL: <a href="<?php echo htmlspecialchars($mat['url']); ?>" target="_blank"><?php echo htmlspecialchars($mat['url']); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
