<?php
require_once './view/order.view.php';
require_once './view/userView.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');



$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);
switch ($params[0]) {
    case "home":
        $view = new inicioView();
        $view->showInicio();
        break;

    case "login":
        $view = new inicioView();
        $view->showLogin();
        break;


    case "showOrders":
        $controller = new ordersController;
        $controller->showOrders();
        break;

    case "showOrder":
        $controller = new ordersController;
        $controller->showOrderById($params[1]);
        break;

    case "showClients":
        $controller = new userController;
        $controller->showClients();
        break;

    case "showClient":
        $controller = new userController;
        $controller->showClientsById($params[1]);
        break;

    case "deleteOrder":
        $controller = new OrdersController;
        $controller->deleteOrder($params[1]);
        break;
    case "formNewOrder":
        $controller = new OrdersController;
        $controller->formNewOrder();

        break;

    case "newOrder":
        $controller = new OrdersController;
        $controller->newOrder();

        break;

    case "updateOrder":
        $controller = new OrdersController;
        $controller->updateOrder($params[1]);

        break;
    case "formUpdateOrder":
        $controller = new OrdersController;
        $controller->formUpdateOrder($params[1]);

        break;

    default:
        $view = new inicioView();
        $view->showError();
        break;
}
