<?php
require_once __DIR__ . '/../model/Scenes.php';

class ScenesController {
    private $model;

    public function __construct() {
        $this->model = new Scenes();
    }

    public function index() {
        $scenes = $this->model->getAll();
        require __DIR__ . '/../view/Scenes/ShowScenes.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomScene = trim($_POST['nomScene'] ?? '');
            $capacite = (int)($_POST['capacite'] ?? 0);
            $emplacement = trim($_POST['emplacement'] ?? '');

            $errors = [];
            if ($nomScene === '') $errors[] = "Le nom de la scène est obligatoire.";
            if ($capacite <= 0) $errors[] = "La capacité doit être un nombre positif.";
            if ($emplacement === '') $errors[] = "L'emplacement est obligatoire.";

            if (empty($errors)) {
                try {
                    $this->model->create($nomScene, $capacite, $emplacement);
                    header('Location: index.php?page=scenes&action=index&success=1');
                    exit;
                } catch (PDOException $e) {
                    $errors[] = "Erreur lors de l'ajout : " . $e->getMessage();
                }
            }
        }
        require __DIR__ . '/../view/Scenes/CreateScenes.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=scenes'); exit; }

        $scene = $this->model->getById($id);
        if (!$scene) { header('Location: index.php?page=scenes'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomScene = trim($_POST['nomScene'] ?? '');
            $capacite = (int)($_POST['capacite'] ?? 0);
            $emplacement = trim($_POST['emplacement'] ?? '');

            $errors = [];
            if ($nomScene === '') $errors[] = "Le nom de la scène est obligatoire.";
            if ($capacite <= 0) $errors[] = "La capacité doit être un nombre positif.";
            if ($emplacement === '') $errors[] = "L'emplacement est obligatoire.";

            if (empty($errors)) {
                try {
                    $this->model->update($id, $nomScene, $capacite, $emplacement);
                    header('Location: index.php?page=scenes&action=index&success=2');
                    exit;
                } catch (PDOException $e) {
                    $errors[] = "Erreur lors de la modification : " . $e->getMessage();
                }
            }
        }
        require __DIR__ . '/../view/Scenes/EditScenes.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=scenes'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->delete($id);
                header('Location: index.php?page=scenes&action=index&success=3');
                exit;
            } catch (PDOException $e) {
                $error = "Impossible de supprimer cette scène : " . $e->getMessage();
            }
        }

        $scene = $this->model->getById($id);
        $scenes = $this->model->getAll();
        require __DIR__ . '/../view/Scenes/ShowScenes.php';
    }
}
