<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once './app/controller/order-controller.php';
require_once './app/controller/userController.php';
require_once './app/controller/authController.php';
require_once './app/helpers/authHelper.php';
require_once './libs/response.php';

$action = 'home';
$res = new Response();

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);
switch ($params[0]) {
    case "home":
        $controller = new authController;
        $controller->showInicio();
        break;

    case "showLogin":
        $controller = new authController;
        $controller->showLogin();
        break;

    case "login":
        $controller = new authController;
        $controller->login();
        break;
    
    case "logOut":
        $controller = new authController;
        $controller->showLogOut();
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
    
    case "deleteClient":
        verifySession($res);
        $controller = new userController;
        $controller->deleteClient($params[1]);
        break;
    
   case "addClient":
        verifySession($res);
        $controller = new userController;
        $controller->showClientForm();
        break;
    
   case "modifyClient":
        verifySession($res);
        $controller = new userController;
        $controller->showClientForm($params[1]);
        break;
    
    case "newClient":
        verifySession($res);
        $controller = new userController;
        $controller->newClient();
        break;
    case "updateClient":
        verifySession($res);
        $controller = new userController;
        $controller->updateClient($params[1]);
        break;
    
    case "deleteOrder":
        verifySession($res);
        $controller = new OrdersController;
        $controller->deleteOrder($params[1]);
        break;

    case "formNewOrder":
        verifySession($res);
        $controller = new OrdersController;
        $controller->formNewOrder($params[1]);
        break;

    case "newOrder":
        verifySession($res);
        $controller = new OrdersController;
        $controller->newOrder();
        break;

    case "updateOrder":     
        verifySession($res);
        $controller = new OrdersController;
        $controller->updateOrder($params[1]);
        break;        
    

    default:
        $controller = new authController;
        $controller->showError();
        break;
}
