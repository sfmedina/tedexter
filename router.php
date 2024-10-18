<?php
require_once './view/order.view.php';
require_once './view/userView.php';
require_once './controller/authController.php';
require_once 'helpers/authHelper.php';
require_once './libs/response.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

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
        // $authHelper = new authHelper;
        // $authHelper->verifySession();
        $controller = new userController;
        $controller->deleteClient($params[1]);
        break;
    
   case "addClient":
        // $authHelper = new authHelper;// no necesita verificar porque ya verifica en el header
        // $authHelper->verifySession();
        $controller = new userController;
        $controller->showClientForm();
        break;
    
   case "modifyClient":
        // $authHelper = new authHelper;
        // $authHelper->verifySession();
        $controller = new userController;
        $controller->showClientForm($params[1]);
        break;
    
    case "newClient":
        // $authHelper = new authHelper;
        // $authHelper->verifySession();
        $controller = new userController;
        $controller->newClient();
        break;
    
    case "deleteOrder":
        // $authHelper = new authHelper;
        // $authHelper->verifySession($res);
        $controller = new OrdersController;
        $controller->deleteOrder($params[1]);
        break;
    case "formNewOrder":
      
        $controller = new OrdersController;
        $controller->formNewOrder($params[1]);

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
        // $authHelper = new authHelper;
        // $authHelper->verifySession($res);
        $controller = new OrdersController;
        $controller->formUpdateOrder($params[1]);

        break;

    default:
        $controller = new authController;
        $controller->showError();
        break;
}
