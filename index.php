<?php
require_once 'config/database.php';

$page = $_GET['page'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

switch ($page) {
    case 'artistes':
        require_once 'controller/ArtistesController.php';
        break;
    case 'scenes':
        require_once 'controller/ScenesController.php';
        break;
    case 'concerts':
        require_once 'controller/ConcertController.php';
        $controller = new ConcertController();
        break;
    case 'benevoles':
        require_once 'controller/BenevolesController.php';
        $controller = new BenevolesController();
        break;
    case 'dashboard':
    default:
        require_once 'controller/DashBoardController.php';
        $controller = new DashBoardController();
        $action = 'index';
        break;
}

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}
