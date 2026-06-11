<?php
require_once __DIR__ . '/../model/Concert.php';
require_once __DIR__ . '/../model/Artiste.php';
require_once __DIR__ . '/../model/Scene.php';
require_once __DIR__ . '/../model/DashBoard.php';
// Affiche le tableau de bord
function showDashboard($pdo)
{
    try {
        $stats = getStats($pdo);
        $concertScene = getConcertScene($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/Dashboard.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors du chargement du tableau de bord : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}
?>
