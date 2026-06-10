<?php
require_once __DIR__ . '/../model/Scene.php';
function showSceneList($pdo)
{
    $scenes = getAllScene($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Scenes/ShowScenes.php';
    include __DIR__ . '/../view/layout/footer.php';
}
function showSceneForm($pdo)
{
    $scenes = getAllScene($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Scenes/CreateScenes.php';
    include __DIR__ . '/../view/layout/footer.php';
}
function saveScene($pdo)
{
    $nomScene = trim($_POST['nomScene']);
    $capacite = trim($_POST['capacite']);
    $emplacement = trim($_POST['emplacement']);
    addScene($pdo, $nomScene, $capacite, $emplacement);
    header('Location: index.php?page=scenes&action=index');
    exit();
}
function showModifySceneForm($pdo, $id)
{
    $scenes = getAllScene($pdo);
    include __DIR__ . '/../view/layout/header.php';
    include __DIR__ . '/../view/Scenes/EditScenes.php';
    include __DIR__ . '/../view/layout/footer.php';
}
function updateScene($pdo)
{
    $nomScene = trim($_POST['nomScene']);
    $capacite = trim($_POST['capacite']);
    $emplacement = trim($_POST['emplacement']);
    $id = trim($_POST['idScene']);
    modifyScene($pdo, $nomScene, $capacite, $emplacement, $id);
    header('Location: index.php?page=scenes&action=index');
    exit();
}
function removeScene($pdo, $id)
{
    deleteScene($pdo, $id);
    header('Location: index.php?page=scenes&action=index');
    exit();
}
?>