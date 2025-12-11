<h1>Versiones del Curso</h1>
<a href="index.php">Volver a Home</a>

<?php if(count($versiones) === 0): ?>
    <p>No hay versiones para este curso.</p>
<?php else: ?>
    <ul>
        <?php foreach($versiones as $v): ?>
            <li>
                <?php echo htmlspecialchars($v['numero_version'])." (".htmlspecialchars($v['fecha_inicio'])." a ".htmlspecialchars($v['fecha_fin']).")"; ?>
                - <a href="index.php?action=modulos&id_version=<?php echo $v['id_version']; ?>&id_curso=<?php echo $v['id_curso']; ?>">Ver módulos</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
