<?php
require_once __DIR__ . '/../config/database.php';

class Concert {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query(
            "SELECT c.*, a.nom AS nomArtiste, s.nomScene
             FROM Concert c
             JOIN Artiste a ON c.idArtiste = a.idArtiste
             JOIN Scene s ON c.idScene = s.idScene
             ORDER BY c.date, c.heureDebut"
        );
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare(
            "SELECT c.*, a.nom AS nomArtiste, s.nomScene
             FROM Concert c
             JOIN Artiste a ON c.idArtiste = a.idArtiste
             JOIN Scene s ON c.idScene = s.idScene
             WHERE c.idConcert = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($date, $heureDebut, $heureFin, $idArtiste, $idScene) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Concert (date, heureDebut, heureFin, idArtiste, idScene)
             VALUES (:date, :heureDebut, :heureFin, :idArtiste, :idScene)"
        );
        $stmt->execute([
            'date' => $date,
            'heureDebut' => $heureDebut,
            'heureFin' => $heureFin,
            'idArtiste' => $idArtiste,
            'idScene' => $idScene
        ]);
    }

    public function update($id, $date, $heureDebut, $heureFin, $idArtiste, $idScene) {
        $stmt = $this->pdo->prepare(
            "UPDATE Concert SET date = :date, heureDebut = :heureDebut, heureFin = :heureFin,
             idArtiste = :idArtiste, idScene = :idScene WHERE idConcert = :id"
        );
        $stmt->execute([
            'id' => $id,
            'date' => $date,
            'heureDebut' => $heureDebut,
            'heureFin' => $heureFin,
            'idArtiste' => $idArtiste,
            'idScene' => $idScene
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Concert WHERE idConcert = :id");
        $stmt->execute(['id' => $id]);
    }
}
