<?php
require_once __DIR__ . '/../model/Concert.php';
require_once __DIR__ . '/../model/Artiste.php';
require_once __DIR__ . '/../model/Scene.php';
function showDashboard($pdo)
{
    $concerts = getAllConcert($pdo);
    $artistes = getAllArtiste($pdo);
    $scenes = getAllScene($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/layout/Dashboard.php';
    include __DIR__ . '/../view/layout/footer.php';
}
?>