<?php
require_once __DIR__ . '/../model/Artiste.php';
function showListArtiste()
{
    $artiste = getAllArtiste($pdo);
    include __DIR__ . '/../views/layout/header.php';
    include __DIR__ . '/../views/Concert/ShowArtiste.php';
    include __DIR__ . '/../views/layout/footer.php';
}

?>
