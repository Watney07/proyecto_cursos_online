<h1>Editar Curso</h1>

<form method="POST" action="index.php?controller=curso&action=update">
    <input type="hidden" name="id_curso" value="<?= $curso['id_curso'] ?>">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?= htmlspecialchars($curso['nombre']) ?>" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" required><?= htmlspecialchars($curso['descripcion']) ?></textarea><br><br>

    <button type="submit">Guardar cambios</button>
</form>

<br>
<a href="index.php?controller=curso&action=index">Volver</a>
