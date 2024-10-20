<?php
//require_once './controller/order-controller.php';
require_once './app/model/order-model.php';
require_once './app/model/userModel.php';
require_once './app/view/order.view.php';

class ordersController {
   private $model;
   private $view;
   private $viewById;
   private $modelUser;

   public function __construct()
   {
      $this->model  = new orderModel;
      $this->view = new orderView;
      $this->modelUser = new userModel;
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
      // obtengo la orden por ID
      $orders = $this->model->showOrderById($id);
      $id_client = $orders[0]->id_client;

      // obtengo el cliente por ID
      $client = $this->modelUser->getClientById($id_client);


      // mando la orden y el cliente a la vista
      return $this->view->showOrderById($orders, $client);
   }

   public function deleteOrder($id)
   {
      $orders = $this->model->deleteOrder($id);

      header('Location: ' . BASE_URL . 'showOrders');
   }

   public function formNewOrder($id)
   {
      // obtengo las tareas de la DB
      $clients = $this->modelUser->showClients();
      $order = $this->model->showOrderbyId($id);

      // mando las tareas a la vista
      return $this->view->formNewOrder($order, $clients);
   }

   public function newOrder()
   {
      $id_client = $_POST['id_client'];
      $date = $_POST['date'];
      $status = $_POST['status'];

      if (!isset($_POST['date']) || empty($_POST['date'])) {
         return $this->view->showError('Falta completar la Fecha');
      }

      if (!isset($_POST['status']) || empty($_POST['status'])) {
         return $this->view->showError('Falta completar el Estado');
      }
      if (!isset($_POST['id_client']) || empty($_POST['id_client'])) {

         return $this->view->showError('Falta completar el id del cliente');
      }
    
         // crea la tarea
         $orders = $this->model->createCommand($date, $status, $id_client);
         header('Location: ' . BASE_URL . 'showOrders');
   }
   


   public function updateOrder($id){
      $id_order = $_POST['id_order'];
      $date = $_POST['date'];
      $status = $_POST['status'];
      $id_client = $_POST['id_client'];


      if (!isset($_POST['id_order']) || empty($_POST['id_order'])) {
         return $this->view->showError('Falta completar el ID de la orden');
      }

      if (!isset($_POST['date']) || empty($_POST['date'])) {
         return $this->view->showError('Falta completar la Fecha');
      }

      if (!isset($_POST['status']) || empty($_POST['status'])) {
         return $this->view->showError('Falta completar el Estado');
      }
      if (!isset($_POST['id_client']) || empty($_POST['id_client'])) {
         if($client = $this->modelUser->getClientById($id_client)){
            return $this->view->showError('El cliente no existe');
         }

         return $this->view->showError('Falta completar el id del cliente');
      }

      // actualiza la tarea
      $this->model->updateCommand($id_order, $date, $status, $id_client);

      header('Location: ' . BASE_URL . 'showOrders');
   }



   public function formUpdateOrder($id)
   {
      // obtengo las tareas de la DB
      $clients = $this->modelUser->showclients();

      // mando las tareas a la vista
      return $this->view->formUpdateOrder($clients);
   }
}
