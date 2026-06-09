<?php
require_once __DIR__ . '/../config/database.php';

class Artistes {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM Artiste ORDER BY nom");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Artiste WHERE idArtiste = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nom, $styleMusical, $pays) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Artiste (nom, styleMusical, pays) VALUES (:nom, :styleMusical, :pays)"
        );
        $stmt->execute([
            'nom' => $nom,
            'styleMusical' => $styleMusical,
            'pays' => $pays
        ]);
    }

    public function update($id, $nom, $styleMusical, $pays) {
        $stmt = $this->pdo->prepare(
            "UPDATE Artiste SET nom = :nom, styleMusical = :styleMusical, pays = :pays WHERE idArtiste = :id"
        );
        $stmt->execute([
            'id' => $id,
            'nom' => $nom,
            'styleMusical' => $styleMusical,
            'pays' => $pays
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Artiste WHERE idArtiste = :id");
        $stmt->execute(['id' => $id]);
    }

    public function searchByStyle($style) {
        $stmt = $this->pdo->prepare("SELECT * FROM Artiste WHERE styleMusical LIKE :style ORDER BY nom");
        $stmt->execute(['style' => '%' . $style . '%']);
        return $stmt->fetchAll();
    }

    public function getConcerts($idArtiste) {
        $stmt = $this->pdo->prepare(
            "SELECT c.*, s.nomScene FROM Concert c
             JOIN Scene s ON c.idScene = s.idScene
             WHERE c.idArtiste = :id ORDER BY c.date, c.heureDebut"
        );
        $stmt->execute(['id' => $idArtiste]);
        return $stmt->fetchAll();
    }
}
