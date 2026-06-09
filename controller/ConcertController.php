<?php
require_once __DIR__ . '/../model/Concert.php';
require_once __DIR__ . '/../model/Artistes.php';
require_once __DIR__ . '/../model/Scenes.php';

class ConcertController {
    private $model;
    private $artisteModel;
    private $sceneModel;

    public function __construct() {
        $this->model = new Concert();
        $this->artisteModel = new Artistes();
        $this->sceneModel = new Scenes();
    }

    public function index() {
        $concerts = $this->model->getAll();
        require __DIR__ . '/../view/Concert/ShowConcert.php';
    }

    public function create() {
        $artistes = $this->artisteModel->getAll();
        $scenes = $this->sceneModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'] ?? '';
            $heureDebut = $_POST['heureDebut'] ?? '';
            $heureFin = $_POST['heureFin'] ?? '';
            $idArtiste = (int)($_POST['idArtiste'] ?? 0);
            $idScene = (int)($_POST['idScene'] ?? 0);

            $errors = [];
            if ($date === '') $errors[] = "La date est obligatoire.";
            if ($heureDebut === '') $errors[] = "L'heure de début est obligatoire.";
            if ($heureFin === '') $errors[] = "L'heure de fin est obligatoire.";
            if ($heureFin <= $heureDebut) $errors[] = "L'heure de fin doit être après l'heure de début.";
            if ($idArtiste <= 0) $errors[] = "Veuillez sélectionner un artiste.";
            if ($idScene <= 0) $errors[] = "Veuillez sélectionner une scène.";

            if (empty($errors)) {
                try {
                    $this->model->create($date, $heureDebut, $heureFin, $idArtiste, $idScene);
                    header('Location: index.php?page=concerts&action=index&success=1');
                    exit;
                } catch (PDOException $e) {
                    if (strpos($e->getMessage(), '45000') !== false) {
                        $errors[] = "Impossible d'ajouter ce concert : un autre concert est déjà programmé sur cette scène pendant ce créneau.";
                    } else {
                        $errors[] = "Erreur lors de l'ajout : " . $e->getMessage();
                    }
                }
            }
        }
        require __DIR__ . '/../view/Concert/CreateConcert.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=concerts'); exit; }

        $concert = $this->model->getById($id);
        if (!$concert) { header('Location: index.php?page=concerts'); exit; }

        $artistes = $this->artisteModel->getAll();
        $scenes = $this->sceneModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'] ?? '';
            $heureDebut = $_POST['heureDebut'] ?? '';
            $heureFin = $_POST['heureFin'] ?? '';
            $idArtiste = (int)($_POST['idArtiste'] ?? 0);
            $idScene = (int)($_POST['idScene'] ?? 0);

            $errors = [];
            if ($date === '') $errors[] = "La date est obligatoire.";
            if ($heureDebut === '') $errors[] = "L'heure de début est obligatoire.";
            if ($heureFin === '') $errors[] = "L'heure de fin est obligatoire.";
            if ($heureFin <= $heureDebut) $errors[] = "L'heure de fin doit être après l'heure de début.";

            if (empty($errors)) {
                try {
                    $this->model->update($id, $date, $heureDebut, $heureFin, $idArtiste, $idScene);
                    header('Location: index.php?page=concerts&action=index&success=2');
                    exit;
                } catch (PDOException $e) {
                    if (strpos($e->getMessage(), '45000') !== false) {
                        $errors[] = "Impossible de modifier ce concert : un autre concert est déjà programmé sur cette scène pendant ce créneau.";
                    } else {
                        $errors[] = "Erreur lors de la modification : " . $e->getMessage();
                    }
                }
            }
        }
        require __DIR__ . '/../view/Concert/EditConcert.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: index.php?page=concerts'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->model->delete($id);
                header('Location: index.php?page=concerts&action=index&success=3');
                exit;
            } catch (PDOException $e) {
                $error = "Impossible de supprimer ce concert : " . $e->getMessage();
            }
        }

        $concert = $this->model->getById($id);
        $concerts = $this->model->getAll();
        require __DIR__ . '/../view/Concert/ShowConcert.php';
    }
}
