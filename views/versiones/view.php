<h1>Detalles de la Versión</h1>

<p><strong>ID:</strong> <?= $version['id_version'] ?></p>
<p><strong>Curso:</strong> <?= htmlspecialchars($version['curso_nombre']) ?></p>
<p><strong>Versión:</strong> <?= htmlspecialchars($version['numero_version']) ?></p>
<p><strong>Inicio:</strong> <?= $version['fecha_inicio'] ?></p>
<p><strong>Fin:</strong> <?= $version['fecha_fin'] ?></p>

<br>
<a href="index.php?controller=version&action=index">Volver</a>

<?php include __DIR__ . '/../header.php'; ?>

<h2>Versiones del Curso</h2>
<a href="index.php?action=crear_version&id_curso=<?= $id_curso ?>" class="btn btn-primary">Nueva Versión</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Versión</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?= $row['id_version'] ?></td>
            <td><?= $row['fecha_inicio'] ?></td>
            <td><?= $row['fecha_fin'] ?></td>
            <td><?= $row['numero_version'] ?></td>
            <td>
                <a href="index.php?action=ver_version&id=<?= $row['id_version'] ?>" class="btn btn-info btn-sm">Ver</a>
                <a href="index.php?action=editar_version&id=<?= $row['id_version'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="index.php?action=eliminar_version&id=<?= $row['id_version'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('¿Eliminar versión?')">Eliminar</a>
            </td>
        </tr>
<?php endwhile; ?>
    </tbody>
</table>

<a href="index.php" class="btn btn-secondary">Volver</a>

<?php include __DIR__ . '/../footer.php'; ?>

<?php include __DIR__ . '/../header.php'; ?>

<h2>Detalle de Versión</h2>

<p><strong>ID:</strong> <?= $data['id_version'] ?></p>
<p><strong>Fecha Inicio:</strong> <?= $data['fecha_inicio'] ?></p>
<p><strong>Fecha Fin:</strong> <?= $data['fecha_fin'] ?></p>
<p><strong>Versión:</strong> <?= $data['numero_version'] ?></p>

<a href="index.php?action=versiones&id_curso=<?= $data['id_curso'] ?>" class="btn btn-secondary">Volver</a>

<?php include __DIR__ . '/../footer.php'; ?>
