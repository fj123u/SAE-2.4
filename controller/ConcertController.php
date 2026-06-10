<?php
require_once __DIR__ . '/../models/ArtistesModel.php';
function showConcertList($pdo)
{
    $concert = getAllConcert($pdo);
    include __DIR__ . '/../views/layout/header.php';
    include __DIR__ . '/../views/Concert/ShowConcert.php';
    include __DIR__ . '/../views/layout/footer.php';
}
function showConcertForm()
{
    include __DIR__ . '/../views/layout/header.php';
    include __DIR__ . '/../views/Concert/CreateConcert.php';
    include __DIR__ . '/../views/layout/footer.php';
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
    $concert = getAllConcert($pdo);
    include __DIR__ . '/../views/layout/header.php';
    include __DIR__ . '/../views/livreModif.php';
    include __DIR__ . '/../views/layout/footer.php';
}
function updateConcert($pdo)
{
    $artiste = trim($_POST['artiste']);
    $scene = trim($_POST['scene']);
    $date = trim($_POST['date']);
    $hDebut = trim($_POST['hDebut']);
    $hFin = trim($_POST['hFin']);
    $id = trim($_POST['id']);
    modifyConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin);
    header('Location: index.php?page=concerts&action=list');
    exit();
}
function removeConcert($pdo, $id)
{
    deleteConcert($pdo, $id);
    header('Location: index.php?page=concert&action=list');
    exit();
}
?>