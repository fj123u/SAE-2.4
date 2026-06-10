<?php
require_once __DIR__ . '/../model/Artiste.php';
require_once __DIR__ . '/../model/Concert.php';
require_once __DIR__ . '/../model/Scene.php';
function showConcertList($pdo)
{
    $concerts = getAllConcert($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Concert/ShowConcert.php';
    include __DIR__ . '/../view/layout/footer.php';
}
function showConcertForm($pdo)
{
    $concerts = getAllConcert($pdo);
    $artistes = getAllArtiste($pdo);
    $scenes = getAllScene($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Concert/CreateConcert.php';
    include __DIR__ . '/../view/layout/footer.php';
}
function saveConcert($pdo)
{
    $artiste = trim($_POST['artiste']);
    $scene = trim($_POST['scene']);
    $date = trim($_POST['date']);
    $hDebut = trim($_POST['hDebut']);
    $hFin = trim($_POST['hFin']);
    addConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin);
    header('Location: index.php?page=concerts&action=list');
    exit();
}
function showModifyConcertForm($pdo, $id)
{
    $concerts = getAllConcert($pdo);
    $artistes = getAllArtiste($pdo);
    $scenes = getAllScene($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Concert/EditConcert.php';
    include __DIR__ . '/../view/layout/footer.php';
}
function updateConcert($pdo)
{
    $artiste = trim($_POST['artiste']);
    $scene = trim($_POST['scene']);
    $date = trim($_POST['date']);
    $hDebut = trim($_POST['hDebut']);
    $hFin = trim($_POST['hFin']);
    $id = trim($_POST['idConcert']);
    modifyConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin, $id);
    header('Location: index.php?page=concerts&action=list');
    exit();
}
function removeConcert($pdo, $id)
{
    deleteConcert($pdo, $id);
    header('Location: index.php?page=concerts&action=list');
    exit();
}
?>