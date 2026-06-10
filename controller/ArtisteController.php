<?php
require_once __DIR__ . '/../model/Artistes.php';

class ArtistesController {
    private $model;

    public function __construct() {
        $this->model = new Artistes();
    }

    public function index() {
        $search = $_GET['style'] ?? '';
        if ($search !== '') {
            $artistes = $this->model->searchByStyle($search);
        } else {
            $artistes = $this->model->getAll();
        }
        require __DIR__ . '/../view/Artistes/ShowArtistes.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $styleMusical = trim($_POST['styleMusical'] ?? '');
            $pays = trim($_POST['pays'] ?? '');

            $errors = [];
            if ($nom === '') $errors[] = "Le nom est obligatoire.";
            if ($styleMusical === '') $errors[] = "Le style musical est obligatoire.";
            if ($pays === '') $errors[] = "Le pays est obligatoire.";

            if (empty($errors)) {
                try {
                    $this->model->create($nom, $styleMusical, $pays);
                    header('Location: index.php?page=artistes&action=index&success=1');
                    exit;
                } catch (PDOException $e) {
                    $errors[] = "Erreur lors de l'ajout : " . $e->getMessage();
                }
            }
        }
        require __DIR__ . '/../view/Artistes/CreateArtistes.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=artistes'); exit; }

        $artiste = $this->model->getById($id);
        if (!$artiste) { header('Location: index.php?page=artistes'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $styleMusical = trim($_POST['styleMusical'] ?? '');
            $pays = trim($_POST['pays'] ?? '');

            $errors = [];
            if ($nom === '') $errors[] = "Le nom est obligatoire.";
            if ($styleMusical === '') $errors[] = "Le style musical est obligatoire.";
            if ($pays === '') $errors[] = "Le pays est obligatoire.";

            if (empty($errors)) {
                try {
                    $this->model->update($id, $nom, $styleMusical, $pays);
                    header('Location: index.php?page=artistes&action=index&success=2');
                    exit;
                } catch (PDOException $e) {
                    $errors[] = "Erreur lors de la modification : " . $e->getMessage();
                }
            }
        }
        require __DIR__ . '/../view/Artistes/EditArtistes.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=artistes'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->delete($id);
                header('Location: index.php?page=artistes&action=index&success=3');
                exit;
            } catch (PDOException $e) {
                $error = "Impossible de supprimer cet artiste : " . $e->getMessage();
                $artiste = $this->model->getById($id);
                require __DIR__ . '/../view/Artistes/ShowArtistes.php';
                return;
            }
        }

        $artiste = $this->model->getById($id);
        $artistes = $this->model->getAll();
        require __DIR__ . '/../view/Artistes/ShowArtistes.php';
    }
}
