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
    
   public function newClient() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addres = $_POST['addres'];
        $phone = $_POST['phone'];

        if (!empty($_POST['id_client'])) {
            // se modifica
            $id_client = $_POST['id_client'];
            $this->model->updateClient($id_client, $name, $email, $addres, $phone);  
        } else {
            // sino se añade
           $this->model->newClient($name, $email, $addres, $phone);
        }
        header("Location: " . BASE_URL. 'showClients'); //se actualiza a show clients
}

    public function showClientForm($id = null) {
        $client = null;
            if ($id) {
            // si hay id cargado voy al modelo a buscar los datos
            $client = $this->model->getClientById($id); // traigo lo del cliente con el id especifico
        }
            return $this->view->addClient($client); //te devuelve la vista del add client dependiendo de la accion 
}


public function deleteClient($id) {
        $this->model->deleteClientById($id);
        header("Location: " . BASE_URL. 'showClients');
    }
}