<h1>Crear Versión de Curso</h1>

<form method="POST" action="index.php?controller=version&action=create">

    <label>Curso:</label><br>
    <select name="id_curso" required>
        <?php foreach ($cursos as $c): ?>
            <option value="<?= $c['id_curso'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Fecha Inicio:</label><br>
    <input type="date" name="fecha_inicio"><br><br>

    <label>Fecha Fin:</label><br>
    <input type="date" name="fecha_fin"><br><br>

    <label>Número de versión:</label><br>
    <input type="text" name="numero_version" required><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php?controller=version&action=index">Volver</a>

<?php include __DIR__ . '/../header.php'; ?>

<h2>Nueva Versión</h2>

<form method="POST">
    <label>Fecha Inicio:</label>
    <input type="date" name="fecha_inicio" class="form-control">

    <label>Fecha Fin:</label>
    <input type="date" name="fecha_fin" class="form-control">

    <label>Número de versión:</label>
    <input type="text" name="numero_version" class="form-control">

    <button class="btn btn-success mt-3">Guardar</button>
</form>

<a href="index.php?action=versiones&id_curso=<?= $id_curso ?>" class="btn btn-secondary mt-3">Volver</a>

<?php include __DIR__ . '/../footer.php'; ?>
