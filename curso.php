<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit; }

require "db.php";

$id_curso = $_GET["id"];

$curso = $conn->query("SELECT * FROM CURSO WHERE id_curso = $id_curso")->fetch_assoc();

$versiones = $conn->query("SELECT * FROM VERSION_CURSO WHERE id_curso = $id_curso");
?>

<h2><?= $curso["nombre"] ?></h2>
<a href="dashboard.php">← Volver</a>

<h3>Versiones del curso:</h3>

<?php while ($v = $versiones->fetch_assoc()): ?>
    <p>
        <strong>Versión <?= $v["numero_version"] ?></strong>  
        (<?= $v["fecha_inicio"] ?> → <?= $v["fecha_fin"] ?>)  
        <br>
        <a href="modulo.php?id_version=<?= $v['id_version'] ?>">Ver módulos</a>
    </p>
<?php endwhile; ?>
