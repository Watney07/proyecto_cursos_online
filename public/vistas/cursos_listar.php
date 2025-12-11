<h1>Listado de Cursos</h1>

<a href="index.php?action=nuevo_curso">➕ Nuevo Curso</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Opciones</th>
    </tr>

    <?php foreach ($cursos as $c): ?>
    <tr>
        <td><?= $c["id_curso"] ?></td>
        <td><?= htmlspecialchars($c["nombre"]) ?></td>
        <td><?= htmlspecialchars($c["descripcion"]) ?></td>
        <td>
            <a href="index.php?action=editar_curso&id=<?= $c['id_curso'] ?>">✏ Editar</a> |
            <a href="index.php?action=eliminar_curso&id=<?= $c['id_curso'] ?>"
               onclick="return confirm('¿Seguro que deseas eliminar este curso?')">
               🗑 Eliminar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
