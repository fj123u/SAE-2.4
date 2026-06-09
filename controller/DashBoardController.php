<?php
require_once __DIR__ . '/../config/database.php';

class DashBoardController {
    private $pdo;

    public function __construct() {
        $this->pdo = getConnection();
    }

    public function index() {
        $stats = [];

        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM Concert");
        $stats['nbConcerts'] = $stmt->fetch()['total'];

        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM Artiste");
        $stats['nbArtistes'] = $stmt->fetch()['total'];

        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM Scene");
        $stats['nbScenes'] = $stmt->fetch()['total'];

        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM Benevole");
        $stats['nbBenevoles'] = $stmt->fetch()['total'];

        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM Billet WHERE statut IN ('payé','utilisé')");
        $stats['nbBillets'] = $stmt->fetch()['total'];

        $stmt = $this->pdo->query("SELECT COALESCE(SUM(tarif),0) AS total FROM Billet WHERE statut IN ('payé','utilisé')");
        $stats['chiffreAffaires'] = $stmt->fetch()['total'];

        $stmt = $this->pdo->query(
            "SELECT s.nomScene, COUNT(c.idConcert) AS nb FROM Scene s
             LEFT JOIN Concert c ON s.idScene = c.idScene GROUP BY s.idScene"
        );
        $stats['concertsParScene'] = $stmt->fetchAll();

        require __DIR__ . '/../view/layout/Dashboard.php';
    }
}
