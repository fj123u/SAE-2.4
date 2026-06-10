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
        }
        break;
    case 'scenes':
        require_once 'controller/SceneController.php';
        break;
    case 'concerts':
        require_once 'controller/ConcertController.php';
        switch($action)
        {
            case 'list':
                showConcertList($pdo);
                break;
            case 'add':
                showConcertForm($pdo);
                break;
            case 'create':
                saveConcert($pdo);
                break;
            case 'modify':
                showModifyConcertForm($pdo, $id);
                break;
            case 'delete':
                removeConcert($pdo, $id);
                break;
        }
        break;
    case 'dashboard':
    default:
        require_once 'controller/DashBoardController.php';
        $action = 'index';
        break;
}
