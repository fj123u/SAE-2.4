<?php
require_once __DIR__ . '/../model/Scene.php';
// Affiche la liste des scènes
function showSceneList($pdo)
{
    try {
        $scenes = getAllScene($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Scenes/ShowScenes.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération des scènes : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Affiche le formulaire d'ajout d'une scène
function showSceneForm($pdo)
{
    try {
        $scenes = getAllScene($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Scenes/CreateScenes.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors du chargement du formulaire : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Enregistre une nouvelle scène en base de données
function saveScene($pdo)
{
    try {
        $nomScene = trim($_POST['nomScene']);
        $capacite = trim($_POST['capacite']);
        $emplacement = trim($_POST['emplacement']);
        addScene($pdo, $nomScene, $capacite, $emplacement);
        header('Location: index.php?page=scenes&action=index');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de l'ajout de la scène : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Affiche le formulaire de modification d'une scène
function showModifySceneForm($pdo, $id)
{
    try {
        $scenes = getAllScene($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Scenes/EditScenes.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors du chargement de la scène : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Modifie une scène en base de données
function updateScene($pdo)
{
    try {
        $nomScene = trim($_POST['nomScene']);
        $capacite = trim($_POST['capacite']);
        $emplacement = trim($_POST['emplacement']);
        $id = trim($_POST['idScene']);
        modifyScene($pdo, $nomScene, $capacite, $emplacement, $id);
        header('Location: index.php?page=scenes&action=index');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la modification de la scène : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Supprime une scène
function removeScene($pdo, $id)
{
    try {
        deleteScene($pdo, $id);
        header('Location: index.php?page=scenes&action=index');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la suppression de la scène : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}
?>
