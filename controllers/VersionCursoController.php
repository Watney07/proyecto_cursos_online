<?php
// controllers/VersionCursoController.php

require_once __DIR__ . '/../models/VersionCurso.php';
require_once __DIR__ . '/../models/Curso.php';

class VersionCursoController
{
    private VersionCurso $model;
    private Curso $cursoModel;

    public function __construct(PDO $pdo)
    {
        $this->model = new VersionCurso($pdo);
        $this->cursoModel = new Curso($pdo);
    }

    public function index()
    {
        $versiones = $this->model->getAll();
        include __DIR__ . '/../views/versiones/list.php';
    }

    public function byCurso($id_curso)
    {
        $curso = $this->cursoModel->getById($id_curso);
        $versiones = $this->model->getByCurso($id_curso);
        include __DIR__ . '/../views/versiones/byCurso.php';
    }

    public function view($id)
    {
        $version = $this->model->getById($id);
        include __DIR__ . '/../views/versiones/view.php';
    }

    public function createForm()
    {
        $cursos = $this->cursoModel->getAll();
        include __DIR__ . '/../views/versiones/create.php';
    }

    public function create()
    {
        $id_curso = $_POST['id_curso'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $numero_version = $_POST['numero_version'];

        $this->model->create($id_curso, $fecha_inicio, $fecha_fin, $numero_version);

        header("Location: index.php?controller=version&action=index");
        exit;
    }

    public function editForm($id)
    {
        $version = $this->model->getById($id);
        $cursos = $this->cursoModel->getAll();
        include __DIR__ . '/../views/versiones/edit.php';
    }

    public function update()
    {
        $id = $_POST['id_version'];
        $id_curso = $_POST['id_curso'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $numero_version = $_POST['numero_version'];

        $this->model->update($id, $id_curso, $fecha_inicio, $fecha_fin, $numero_version);

        header("Location: index.php?controller=version&action=index");
        exit;
    }

    public function delete($id)
    {
        $this->model->delete($id);

        header("Location: index.php?controller=version&action=index");
        exit;
    }
}

<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/VersionCurso.php';

class VersionCursoController {

    // Listar versiones de un curso
    public function index($id_curso) {
        $db = (new Database())->getConnection();
        $version = new VersionCurso($db);

        $result = $version->getByCurso($id_curso);

        include __DIR__ . '/../views/versiones/index.php';
    }

    // Crear versión
    public function create($id_curso) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $db = (new Database())->getConnection();
            $version = new VersionCurso($db);

            $version->id_curso = $id_curso;
            $version->fecha_inicio = $_POST['fecha_inicio'];
            $version->fecha_fin = $_POST['fecha_fin'];
            $version->numero_version = $_POST['numero_version'];

            $version->create();

            header("Location: index.php?action=versiones&id_curso=".$id_curso);
            exit;
        }

        include __DIR__ . '/../views/versiones/create.php';
    }

    // Editar versión
    public function edit($id_version) {
        $db = (new Database())->getConnection();
        $version = new VersionCurso($db);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $version->id_version = $id_version;
            $version->fecha_inicio = $_POST['fecha_inicio'];
            $version->fecha_fin = $_POST['fecha_fin'];
            $version->numero_version = $_POST['numero_version'];

            $version->update();

            $data = $version->getById($id_version);
            header("Location: index.php?action=versiones&id_curso=".$data['id_curso']);
            exit;
        }

        $data = $version->getById($id_version);
        include __DIR__ . '/../views/versiones/edit.php';
    }

    // Ver versión
    public function view($id_version) {
        $db = (new Database())->getConnection();
        $version = new VersionCurso($db);

        $data = $version->getById($id_version);

        include __DIR__ . '/../views/versiones/view.php';
    }

    // Eliminar versión
    public function delete($id_version) {
        $db = (new Database())->getConnection();
        $version = new VersionCurso($db);

        $data = $version->getById($id_version);

        $version->id_version = $id_version;
        $version->delete();

        header("Location: index.php?action=versiones&id_curso=".$data['id_curso']);
        exit;
    }
}
