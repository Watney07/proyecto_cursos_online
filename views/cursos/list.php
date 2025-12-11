<h1>Listado de Cursos</h1>

<a href="index.php?controller=curso&action=createForm">➕ Crear nuevo curso</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($cursos as $c): ?>
        <tr>
            <td><?= $c['id_curso'] ?></td>
            <td><?= htmlspecialchars($c['nombre']) ?></td>
            <td>
                <a href="index.php?controller=curso&action=view&id=<?= $c['id_curso'] ?>">Ver</a> |
                <a href="index.php?controller=curso&action=editForm&id=<?= $c['id_curso'] ?>">Editar</a> |
                <a href="index.php?controller=curso&action=delete&id=<?= $c['id_curso'] ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
