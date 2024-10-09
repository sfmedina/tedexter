<?php
require_once './model/order-model.php';
require_once './controller/order-controller.php';
require_once './view/inicio.view.php';


class orderView {

  public function showOrders($orders){
      $count = count($orders);
      require './templates/ordersView.templates.phtml';
  }

  public function showOrderById($orders){
      $count = count($orders);
      require './templates/orderById.template.phtml';
  }
  public function showError($msg){
      require './templates/error.template.phtml';
  }
  public function formNewOrder(){
      require './templates/formNewOrder.template.phtml';
    
}
}
