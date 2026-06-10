<?php
require_once __DIR__ . '/../model/Artiste.php';
function showListArtiste($pdo)
{
    $artiste = getAllArtiste($pdo);
    include __DIR__ . '/../views/Concert/ShowArtiste.php';
}

?>
