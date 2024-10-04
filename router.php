<?php
require_once './view/order.view.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



$action = 'showOrders'; 

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);
switch ($params[0]) {
    case "home":       
        $view = new inicioView();
        $view->showInicio();
        break;

    case "about":
        echo "<h3> Hola, caso about</h3>";
        break;
    
    case "showOrders":                 
         $controller = new ordersController;
         $controller->showOrders();
         break;

         case "showOrder":       
            
            $controller = new ordersController;
            $controller->showOrderById($params[1]);
            break;

    default:
        echo "<h3> Acción no encontrada</h3>";
        break;
}

?>
