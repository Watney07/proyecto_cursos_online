<?php
// controllers/CursoController.php

require_once __DIR__ . '/../models/Curso.php';

class CursoController
{
    private Curso $model;

    public function __construct(PDO $pdo)
    {
        $this->model = new Curso($pdo);
    }

    public function index()
    {
        $cursos = $this->model->getAll();
        include __DIR__ . '/../views/cursos/list.php';
    }

    public function view($id)
    {
        $curso = $this->model->getById($id);
        include __DIR__ . '/../views/cursos/view.php';
    }

    public function createForm()
    {
        include __DIR__ . '/../views/cursos/create.php';
    }

    public function create()
    {
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        if ($this->model->create($nombre, $descripcion)) {
            header("Location: index.php?controller=curso&action=index");
            exit;
        } else {
            echo "Error al crear curso.";
        }
    }

    public function editForm($id)
    {
        $curso = $this->model->getById($id);
        include __DIR__ . '/../views/cursos/edit.php';
    }

    public function update()
    {
        $id = $_POST['id_curso'] ?? 0;
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        if ($this->model->update($id, $nombre, $descripcion)) {
            header("Location: index.php?controller=curso&action=index");
            exit;
        } else {
            echo "Error al actualizar.";
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php?controller=curso&action=index");
        exit;
    }
}
