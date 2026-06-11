<?php
require_once __DIR__ . '/../model/Planning.php';
function showPlanning($pdo)
{
    try {
        $allInfos = getAllInfos($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/planning.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération du plannig : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
    
}
?>