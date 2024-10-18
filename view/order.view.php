<?php
require_once './model/order-model.php';
require_once './controller/order-controller.php';
require_once './view/authView.php';


class orderView {

  public function showOrders($orders){
      $count = count($orders);
      require './templates/ordersView.templates.phtml';
  }

  public function showOrderById($orders, $client){
      $count = count($orders);
      require './templates/orderById.template.phtml';
  }
  public function showError($msg){
      require './templates/error.template.phtml';
  }
  public function formNewOrder($order = null ,$clients){    
    $count = count($clients);
      require './templates/formNewOrder.template.phtml';
    
 }
 public function formUpdateOrder($clients){
    $count = count($clients);
    require './templates/formUpdateOrder.template.phtml';
  
}
}
