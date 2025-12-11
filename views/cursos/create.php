<h1>Crear Curso</h1>

<form method="POST" action="index.php?controller=curso&action=create">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" required></textarea><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="index.php?controller=curso&action=index">Volver</a>
