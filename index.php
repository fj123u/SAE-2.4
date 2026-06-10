<?php
require_once 'config/database.php';

$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

switch ($page) {
    case 'artistes':
        switch ($action)
        {
            case 'index':
        }
        break;
    case 'scenes':
        require_once 'controller/SceneController.php';
        break;
    case 'concerts':
        require_once 'controller/ConcertController.php';
        break;
    case 'dashboard':
    default:
        require_once 'controller/DashBoardController.php';
        $action = 'index';
        break;
}
