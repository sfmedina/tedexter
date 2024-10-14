<?php
require_once './model/userModel.php';
require_once './view/userView.php';


class userController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new userModel();
        $this->view = new userView();
    }

    public function showClients() {
        $clients = $this->model->showClients();
        return $this->view->showClients($clients);
    }

    public function showClientsById($id){
        $orders = $this->model->showClientsById($id);
        return $this->view->showClientsById($orders);
    }
    
   /*public function addNewClient() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addres = $_POST['addres'];
        $phone = $_POST['phone'];

        $id = $this->model->NewClient($name, $email, $addres, $phone);

        header("Location: " . BASE_URL. 'showClients'); 
    }

    public function addClient(){
         return $this->view->addClient();
    }*/

    public function deleteClient($id) {
        $this->model->deleteClientById($id);
        header("Location: " . BASE_URL);
    }

   /* function updateUser($id) {
        $this->model->update($id);
        header("Location: " . BASE_URL); 
    }
*/
}