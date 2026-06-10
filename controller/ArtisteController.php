<?php
require_once __DIR__ . '/../model/Artiste.php';
function showListArtiste($pdo)
{
    $artistes = getAllArtiste($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Artistes/ShowArtiste.php';
    include __DIR__ . '/../view/layout/footer.php';
}

function removeArtiste($pdo, $id)
{
    deleteArtiste($pdo, $id);
    header('Location: index.php?page=artistes&action=index');
}

?>
