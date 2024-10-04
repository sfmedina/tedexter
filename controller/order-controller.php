<?php
require_once './controller/order-controller.php';
require_once './model/order-model.php';

 
class ordersController{
    private $model;
    private $view;
    private $viewById;

 public function __construct() {
    $this->model  = new orderModel;
    $this->view = new orderView;
    
    

 }

 public function showOrders() {
    // obtengo las tareas de la DB
    $orders = $this->model->showOrders();

    // mando las tareas a la vista
    return $this->view->showOrders($orders); 
}
public function showOrderById($id) {
   // obtengo las tareas de la DB
   $orders = $this->model->showOrderById($id);

   // mando las tareas a la vista
   return $this->view->showOrderById($orders); 
}
}

?>