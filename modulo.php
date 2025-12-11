<?php
session_start();
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit; }

require "db.php";

$id_version = $_GET["id_version"];

$modulos = "
SELECT * FROM MODULO 
WHERE id_version = $id_version
";

$modulos = $conn->query($modulos);
?>

<a href="javascript:history.back()">← Volver</a>
<h2>Módulos</h2>

<?php while ($m = $modulos->fetch_assoc()): ?>

    <h3><?= $m["titulo"] ?></h3>
    <p><?= $m["descripcion"] ?></p>

    <strong>Materiales:</strong><br>

    <?php
    $id_mod = $m["id_modulo"];
    $materiales = $conn->query("
        SELECT * FROM MATERIAL
        WHERE id_modulo = $id_mod
    ");

    while ($mat = $materiales->fetch_assoc()):
    ?>
        <div style="margin-left:20px;">
            <p>
                📘 <?= $mat["titulo"] ?>  
                (<?= $mat["tipo"] ?>)  
                <br>
                <a href="<?= $mat["url"] ?>" target="_blank">Abrir</a>
            </p>

            <?php
            $id_mat = $mat["id_material"];
            $permisos = $conn->query("
                SELECT P.nombre_permiso 
                FROM MATERIAL_PERMISO MP
                JOIN PERMISO P ON P.id_permiso = MP.id_permiso
                WHERE MP.id_material = $id_mat
            ");
            ?>

            <?php if ($permisos->num_rows > 0): ?>
                <em>Requiere permisos:</em>
                <ul>
                <?php while ($p = $permisos->fetch_assoc()): ?>
                    <li><?= $p["nombre_permiso"] ?></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        </div>
    <?php endwhile; ?>

<?php endwhile; ?>
