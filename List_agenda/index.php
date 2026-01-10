<?php
define('BASE_URL', 'http://localhost/List_agenda');

require_once 'config/database.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/EventController.php';
require_once 'app/models/Event.php';

$url = $_GET['url'] ?? 'login';
$url = explode('/', $url);

switch ($url[0]) {

    case 'login':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        (new AuthController)->loginProcess();
    } else {
        (new AuthController)->login();
    }
    break;

    case 'logout':
        (new AuthController)->logout();
    break;


    case 'dashboard':
        (new EventController)->dashboard();
        break;

    case 'event':
        $ctrl = new EventController();

        if (isset($url[1]) && $url[1] === 'add') {
            $ctrl->create();
        }
        elseif (isset($url[1]) && $url[1] === 'store') {
            $ctrl->store();
        }
        elseif (isset($url[1], $url[2]) && $url[1] === 'edit') {
            $ctrl->edit($url[2]);
        }
        elseif (isset($url[1], $url[2]) && $url[1] === 'update') {
            $ctrl->update($url[2]);
        }
        elseif (isset($url[1], $url[2]) && $url[1] === 'delete') {
            $ctrl->delete($url[2]);
        }
        elseif (isset($url[1], $url[2]) && $url[1] === 'destroy') {
            $ctrl->destroy($url[2]);
        }
        else {
            $ctrl->index();
        }
        break;

    default:
        header("Location: " . BASE_URL . "/login");
        exit;
}
