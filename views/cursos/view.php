<h1>Detalles del Curso</h1>

<p><strong>ID:</strong> <?= $curso['id_curso'] ?></p>
<p><strong>Nombre:</strong> <?= htmlspecialchars($curso['nombre']) ?></p>
<p><strong>Descripción:</strong><br><?= nl2br(htmlspecialchars($curso['descripcion'])) ?></p>

<br>
<a href="index.php?controller=curso&action=index">Volver</a>
