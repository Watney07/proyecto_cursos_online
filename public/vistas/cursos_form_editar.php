<h1>Editar Curso</h1>

<form action="index.php?action=actualizar_curso" method="POST">
    
    <input type="hidden" name="id" value="<?= $curso['id_curso'] ?>">

    <label>Nombre:<br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($curso['nombre']) ?>" required>
    </label>
    <br><br>

    <label>Descripción:<br>
        <textarea name="descripcion"><?= htmlspecialchars($curso['descripcion']) ?></textarea>
    </label>
    <br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php?action=listar_cursos">⬅ Volver</a>
