<?php
require_once __DIR__ . '/../model/Benevoles.php';

class BenevolesController {
    private $model;

    public function __construct() {
        $this->model = new Benevoles();
    }

    public function index() {
        $benevoles = $this->model->getAll();
        require __DIR__ . '/../view/Benevoles/ShowBenevoles.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nomBenevole'] ?? '');
            $prenom = trim($_POST['prenomBenevole'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telephone = trim($_POST['telephone'] ?? '');

            $errors = [];
            if ($nom === '') $errors[] = "Le nom est obligatoire.";
            if ($prenom === '') $errors[] = "Le prénom est obligatoire.";
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "L'email est invalide.";

            if (empty($errors)) {
                try {
                    $this->model->create($nom, $prenom, $email, $telephone ?: null);
                    header('Location: index.php?page=benevoles&action=index&success=1');
                    exit;
                } catch (PDOException $e) {
                    if (strpos($e->getMessage(), 'Duplicate') !== false) {
                        $errors[] = "Cet email est déjà utilisé.";
                    } else {
                        $errors[] = "Erreur lors de l'ajout : " . $e->getMessage();
                    }
                }
            }
        }
        require __DIR__ . '/../view/Benevoles/CreateBenevoles.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=benevoles'); exit; }

        $benevole = $this->model->getById($id);
        if (!$benevole) { header('Location: index.php?page=benevoles'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nomBenevole'] ?? '');
            $prenom = trim($_POST['prenomBenevole'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telephone = trim($_POST['telephone'] ?? '');

            $errors = [];
            if ($nom === '') $errors[] = "Le nom est obligatoire.";
            if ($prenom === '') $errors[] = "Le prénom est obligatoire.";
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "L'email est invalide.";

            if (empty($errors)) {
                try {
                    $this->model->update($id, $nom, $prenom, $email, $telephone ?: null);
                    header('Location: index.php?page=benevoles&action=index&success=2');
                    exit;
                } catch (PDOException $e) {
                    if (strpos($e->getMessage(), 'Duplicate') !== false) {
                        $errors[] = "Cet email est déjà utilisé.";
                    } else {
                        $errors[] = "Erreur lors de la modification : " . $e->getMessage();
                    }
                }
            }
        }
        require __DIR__ . '/../view/Benevoles/EditBenevoles.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=benevoles'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->delete($id);
                header('Location: index.php?page=benevoles&action=index&success=3');
                exit;
            } catch (PDOException $e) {
                $error = "Impossible de supprimer ce bénévole : " . $e->getMessage();
            }
        }

        $benevole = $this->model->getById($id);
        $benevoles = $this->model->getAll();
        require __DIR__ . '/../view/Benevoles/ShowBenevoles.php';
    }
}
