<h1>Editar Versión</h1>

<form method="POST" action="index.php?controller=version&action=update">

    <input type="hidden" name="id_version" value="<?= $version['id_version'] ?>">

    <label>Curso:</label><br>
    <select name="id_curso">
        <?php foreach ($cursos as $c): ?>
            <option value="<?= $c['id_curso'] ?>"
                <?= $c['id_curso'] == $version['id_curso'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Fecha Inicio:</label><br>
    <input type="date" name="fecha_inicio" value="<?= $version['fecha_inicio'] ?>"><br><br>

    <label>Fecha Fin:</label><br>
    <input type="date" name="fecha_fin" value="<?= $version['fecha_fin'] ?>"><br><br>

    <label>Número de versión:</label><br>
    <input type="text" name="numero_version" value="<?= htmlspecialchars($version['numero_version']) ?>"><br><br>

    <button type="submit">Guardar cambios</button>
</form>

<br>
<a href="index.php?controller=version&action=index">Volver</a>

<?php include __DIR__ . '/../header.php'; ?>

<h2>Editar Versión</h2>

<form method="POST">
    <label>Fecha Inicio:</label>
    <input type="date" name="fecha_inicio" class="form-control" value="<?= $data['fecha_inicio'] ?>">

    <label>Fecha Fin:</label>
    <input type="date" name="fecha_fin" class="form-control" value="<?= $data['fecha_fin'] ?>">

    <label>Número de versión:</label>
    <input type="text" name="numero_version" class="form-control" value="<?= $data['numero_version'] ?>">

    <button class="btn btn-success mt-3">Actualizar</button>
</form>

<a href="index.php?action=versiones&id_curso=<?= $data['id_curso'] ?>" class="btn btn-secondary mt-3">Volver</a>

<?php include __DIR__ . '/../footer.php'; ?>
