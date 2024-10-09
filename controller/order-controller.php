<?php
require_once './controller/order-controller.php';
require_once './model/order-model.php';


class ordersController
{
   private $model;
   private $view;
   private $viewById;

   public function __construct()
   {
      $this->model  = new orderModel;
      $this->view = new orderView;
   }

   public function showOrders()
   {
      // obtengo las tareas de la DB
      $orders = $this->model->showOrders();

      // mando las tareas a la vista
      return $this->view->showOrders($orders);
   }
   public function showOrderById($id)
   {
      // obtengo las tareas de la DB
      $orders = $this->model->showOrderById($id);

      // mando las tareas a la vista
      return $this->view->showOrderById($orders);
   }

   public function deleteOrder($id)
   {
      $orders = $this->model->deleteOrder($id);

      header('Location: ' . BASE_URL . 'showOrders');
   }

   public function formNewOrder()
   {

      return $this->view->formNewOrder();
   }

   public function newOrder()
   {
      if (!isset($_POST['date']) || empty($_POST['date'])) {
         return $this->view->showError('Falta completar la Fecha');
      }

      if (!isset($_POST['status']) || empty($_POST['status'])) {
         return $this->view->showError('Falta completar el Estado');
      }
      if (!isset($_POST['id_client']) || empty($_POST['id_client'])) {

         return $this->view->showError('Falta completar el id del cliente');
      }

      $id_client = $_POST['id_client'];
      $date = $_POST['date'];
      $status = $_POST['status'];


      $orders = $this->model->createCommand($date, $status, $id_client);
      header('Location: ' . BASE_URL . 'showOrders');
   }

   public function updateOrder($id) {
      $task = $this->model->showOrderById($id);

      if (!$task) {
          return $this->view->showError("No existe el pedido con el id=$id");
      }

      // actualiza la tarea
      $this->model->updateOrder($id);

      header('Location: ' . BASE_URL); 
  }
}
