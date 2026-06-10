<?php
require_once __DIR__ . '/../model/Artiste.php';
require_once __DIR__ . '/../model/Concert.php';
require_once __DIR__ . '/../model/Scene.php';

function showConcertList($pdo)
{
    try {
        $concerts = getAllConcert($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Concert/ShowConcert.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération des concerts : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

function showConcertForm($pdo)
{
    try {
        $concerts = getAllConcert($pdo);
        $artistes = getAllArtiste($pdo);
        $scenes = getAllScene($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Concert/CreateConcert.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors du chargement du formulaire : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

function saveConcert($pdo)
{
    try {
        $artiste = trim($_POST['artiste']);
        $scene = trim($_POST['scene']);
        $date = trim($_POST['date']);
        $hDebut = trim($_POST['hDebut']);
        $hFin = trim($_POST['hFin']);
        addConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin);
        header('Location: index.php?page=concerts&action=list');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de l'ajout du concert : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

function showModifyConcertForm($pdo, $id)
{
    try {
        $concerts = getAllConcert($pdo);
        $artistes = getAllArtiste($pdo);
        $scenes = getAllScene($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Concert/EditConcert.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors du chargement du concert : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

function updateConcert($pdo)
{
    try {
        $artiste = trim($_POST['artiste']);
        $scene = trim($_POST['scene']);
        $date = trim($_POST['date']);
        $hDebut = trim($_POST['hDebut']);
        $hFin = trim($_POST['hFin']);
        $id = trim($_POST['idConcert']);
        modifyConcert($pdo, $artiste, $scene, $date, $hDebut, $hFin, $id);
        header('Location: index.php?page=concerts&action=list');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la modification du concert : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

function removeConcert($pdo, $id)
{
    try {
        deleteConcert($pdo, $id);
        header('Location: index.php?page=concerts&action=list');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la suppression du concert : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}
?>
