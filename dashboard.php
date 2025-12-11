<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit; }

require "db.php";

$id = $_SESSION["user_id"];

// OBTENER CURSOS A LOS QUE TIENE ACCESO EL USUARIO
$sql = "
SELECT DISTINCT C.id_curso, C.nombre, C.descripcion
FROM CURSO C
JOIN VERSION_CURSO V ON V.id_curso = C.id_curso
JOIN MODULO M ON M.id_version = V.id_version
JOIN ACCESO_MODULO A ON A.id_modulo = M.id_modulo
WHERE A.id_estudiante = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$cursos = $stmt->get_result();
?>

<h2>Hola, <?= $_SESSION["user_name"] ?></h2>
<a href="logout.php">Cerrar sesión</a>

<h3>Cursos disponibles:</h3>

<ul>
<?php while ($c = $cursos->fetch_assoc()): ?>
    <li>
        <a href="curso.php?id=<?= $c['id_curso'] ?>">
            <?= $c['nombre'] ?>
        </a>
    </li>
<?php endwhile; ?>
</ul>
