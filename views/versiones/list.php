<h1>Versiones de Cursos</h1>

<a href="index.php?controller=version&action=createForm">➕ Crear versión</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Curso</th>
        <th>Versión</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($versiones as $v): ?>
        <tr>
            <td><?= $v['id_version'] ?></td>
            <td><?= htmlspecialchars($v['curso_nombre']) ?></td>
            <td><?= htmlspecialchars($v['numero_version']) ?></td>
            <td><?= $v['fecha_inicio'] ?></td>
            <td><?= $v['fecha_fin'] ?></td>
            <td>
                <a href="index.php?controller=version&action=view&id=<?= $v['id_version'] ?>">Ver</a> |
                <a href="index.php?controller=version&action=editForm&id=<?= $v['id_version'] ?>">Editar</a> |
                <a href="index.php?controller=version&action=delete&id=<?= $v['id_version'] ?>" onclick="return confirm('¿Eliminar versión?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
