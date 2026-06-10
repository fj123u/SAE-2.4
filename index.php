<?php
require_once 'config/database.php';

$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? '';

switch ($page) {
    case 'artistes':
        require_once 'controller/ArtisteController.php';
        switch ($action)
        {
            case 'index':
                showListArtiste($pdo);
                break;
            case 'delete':
                removeArtiste($pdo, $id);
                break;
            case 'create':
                createArtiste($pdo);
                break;  
            case 'add':
                addArtiste($pdo);
                break;
            case 'edit':
                editArtiste($pdo, $id);
                break;
            case 'modify':
                modifyArtiste($pdo);
                break;
        }
        break;
    case 'scenes':
        require_once 'controller/SceneController.php';
        switch($action)
        {
            case 'index':
                showSceneList($pdo);
                break;
            case 'create':
                saveScene($pdo);
                break;
            case 'add':
                showSceneForm($pdo);
                break;
            case 'edit':
                updateScene($pdo);
                break;
            case 'modify':
                showModifySceneForm($pdo, $id);
                break;
            case 'update':
                updateScene($pdo);
                break;
            case 'delete':
                removeScene($pdo, $id);
                break;
        }
        break;
    case 'concerts':
        require_once 'controller/ConcertController.php';
        switch($action)
        {
            case 'list':
                showConcertList($pdo);
                break;
            case 'create':
                saveConcert($pdo);
                break;
            case 'add':
                showConcertForm($pdo);
                break;
            case 'modify':
                showModifyConcertForm($pdo, $id);
                break;
            case 'update':
                updateConcert($pdo);
                break;
            case 'delete':
                removeConcert($pdo, $id);
                break;
        }
        break;
    case 'dashboard':
    default:
        require_once 'controller/DashBoardController.php';
        showDashboard($pdo);
        break;
}
