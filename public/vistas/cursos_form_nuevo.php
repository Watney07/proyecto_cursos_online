<h1>Nuevo Curso</h1>

<form action="index.php?action=guardar_curso" method="POST">
    <label>Nombre:<br>
        <input type="text" name="nombre" required>
    </label>
    <br><br>

    <label>Descripción:<br>
        <textarea name="descripcion"></textarea>
    </label>
    <br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php?action=listar_cursos">⬅ Volver</a>
