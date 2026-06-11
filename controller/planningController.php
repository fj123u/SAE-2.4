<?php
require_once __DIR__ . '/../model/Planning.php';
function showPlanning($pdo)
{
    createViewPlanning($pdo);
    $allInfos = getAllInfos($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Artistes/planning.php';
    include __DIR__ . '/../view/layout/footer.php';
}
?>