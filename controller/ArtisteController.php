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

function createArtiste($pdo)
{
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Artistes/CreateArtiste.php';
    include __DIR__ . '/../view/layout/footer.php';
}

function addArtiste($pdo)
{
    $nom = trim($_POST['nom']);
    $style = trim($_POST['style']);
    $pays = trim($_POST['pays']);
    ajouterArtiste($pdo, $nom, $style, $pays);
    header('Location: index.php?page=artistes&action=index');
}

function editArtiste($pdo, $id)
{
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Artistes/EditArtiste.php';
    include __DIR__ . '/../view/layout/footer.php';
}

?>
