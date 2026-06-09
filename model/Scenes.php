<?php
require_once __DIR__ . '/../config/database.php';

class Scenes {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query(
            "SELECT s.*, COUNT(c.idConcert) AS nbConcerts
             FROM Scene s
             LEFT JOIN Concert c ON s.idScene = c.idScene
             GROUP BY s.idScene
             ORDER BY s.nomScene"
        );
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Scene WHERE idScene = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nomScene, $capacite, $emplacement) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Scene (nomScene, capacite, emplacement) VALUES (:nomScene, :capacite, :emplacement)"
        );
        $stmt->execute([
            'nomScene' => $nomScene,
            'capacite' => $capacite,
            'emplacement' => $emplacement
        ]);
    }

    public function update($id, $nomScene, $capacite, $emplacement) {
        $stmt = $this->pdo->prepare(
            "UPDATE Scene SET nomScene = :nomScene, capacite = :capacite, emplacement = :emplacement WHERE idScene = :id"
        );
        $stmt->execute([
            'id' => $id,
            'nomScene' => $nomScene,
            'capacite' => $capacite,
            'emplacement' => $emplacement
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Scene WHERE idScene = :id");
        $stmt->execute(['id' => $id]);
    }

    public function getConcerts($idScene) {
        $stmt = $this->pdo->prepare(
            "SELECT c.*, a.nom AS nomArtiste FROM Concert c
             JOIN Artiste a ON c.idArtiste = a.idArtiste
             WHERE c.idScene = :id ORDER BY c.date, c.heureDebut"
        );
        $stmt->execute(['id' => $idScene]);
        return $stmt->fetchAll();
    }
}
