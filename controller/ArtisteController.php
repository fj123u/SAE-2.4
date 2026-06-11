<?php
require_once __DIR__ . '/../model/Artiste.php';
// Affiche la liste des artistes
function showListArtiste($pdo)
{
    try {
        $artistes = getAllArtiste($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Artistes/ShowArtiste.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération des artistes : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Supprime un artiste
function removeArtiste($pdo, $id)
{
    try {
        deleteArtiste($pdo, $id);
        header('Location: index.php?page=artistes&action=index');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la suppression de l'artiste : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Affiche le formulaire de création d'un artiste
function createArtiste($pdo)
{
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Artistes/CreateArtiste.php';
    include __DIR__ . '/../view/layout/footer.php';
}

// Ajoute un artiste en base de données
function addArtiste($pdo)
{
    try {
        $nom = trim($_POST['nom']);
        $style = trim($_POST['style']);
        $pays = trim($_POST['pays']);
        ajouterArtiste($pdo, $nom, $style, $pays);
        header('Location: index.php?page=artistes&action=index');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de l'ajout de l'artiste : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Affiche le formulaire de modification d'un artiste
function editArtiste($pdo, $id)
{
    try {
        $artistes = getAllArtiste($pdo);
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/Artistes/EditArtiste.php';
        include __DIR__ . '/../view/layout/footer.php';
    } catch (PDOException $e) {
        $error = "Erreur lors de la récupération de l'artiste : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

// Modifie un artiste en base de données
function modifyArtiste($pdo)
{
    try {
        $nom = trim($_POST['nom']);
        $style = trim($_POST['style']);
        $pays = trim($_POST['pays']);
        $id = trim($_POST['idArtiste']);
        UpdateArtiste($pdo, $id, $nom, $style, $pays);
        header('Location: index.php?page=artistes&action=index');
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la modification de l'artiste : " . $e->getMessage();
        include __DIR__ . '/../view/layout/header.php';
        include __DIR__ . '/../view/layout/error.php';
        include __DIR__ . '/../view/layout/footer.php';
    }
}

?>
