<?php
require_once "../backend/cursos.php";

// acción por defecto:
$action = $_GET["action"] ?? "home";

switch ($action) {

    case "home":
        include "vistas/home.php";
        break;

    /* =========================
         CRUD CURSOS
       ========================= */

    case "listar_cursos":
        $cursos = curso_listar();
        include "vistas/cursos_listar.php";
        break;

    case "nuevo_curso":
        include "vistas/cursos_form_nuevo.php";
        break;

    case "guardar_curso":
        curso_crear($_POST["nombre"], $_POST["descripcion"]);
        header("Location: index.php?action=listar_cursos");
        break;

    case "editar_curso":
        $curso = curso_obtener($_GET["id"]);
        include "vistas/cursos_form_editar.php";
        break;

    case "actualizar_curso":
        curso_editar($_POST["id"], $_POST["nombre"], $_POST["descripcion"]);
        header("Location: index.php?action=listar_cursos");
        break;

    case "eliminar_curso":
        curso_eliminar($_GET["id"]);
        header("Location: index.php?action=listar_cursos");
        break;

    default:
        echo "<h3>Acción no reconocida.</h3>";
}
